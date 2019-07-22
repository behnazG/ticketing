<?php

namespace App\Http\Controllers;

use App\TicketLog;
use App\User;
use App\UserAuthorise;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\OrganizationChart;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    public function __construct()
    {
        $lang = (Session::exists('lang') ? Session::get('lang') : 'fa');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function compose()
    {
        $data = [];
        $data["ticket"] = new Ticket();
        $data["organizational_charts"] = OrganizationChart::where('valid', 1)->get();
        $data["categories"] = Category::where('valid', 1)->get();
        return view('ticket.compose', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ticket::validate();
        try {
            $ticket = Ticket::create($data);
            $data = ["ticket_id" => $ticket->id];
            $ticket->update($data);
            upload_ticket_files($ticket, "file_1");
            upload_ticket_files($ticket, "file_2");
            upload_ticket_files($ticket, "file_3");
        } catch (\Exception $e) {
//            dd(232);
        }
        return redirect('tickets/sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket_id = $this->decode_ticket_id($ticket_id);
        $user = auth::user();
        $ticket = Ticket::where('id', $ticket_id)->get();
        $authorise = false;
        /////////////////////////////////////////////////////////////////////////
        //  check and this ticket not main use the parent ticket in chain
        if (!$ticket->isEmpty()) {
            if ($ticket[0]->id != $ticket[0]->ticket_id) {
                $ticket = Ticket::where('id', $ticket->ticket_id)->get();
            }
        }
        if ($ticket->isEmpty()) {
            abort(404, "tickets");
        }
        //////////////////////////////////
        if ($user->is_staff == 0 && $ticket[0]->sender_id != $user->id) {
            abort(401, "tickets");
            $authorise = false;
        }
        if (!Ticket::check_authorise_ticket($ticket_id)) {
            $authorise = false;
            // abort(401, "tickets");
        } else {
            $authorise = true;
        }
        ///////////////////////////////////////////////////////////////////////////
        $authorise_user_reffral = [];
        $allowed_refferal = UserAuthorise::allowed_refferal_by_user($user->id);
        $set_times = UserAuthorise::allowed_setTimes_by_user($user->id);
        $ticket_time_log = TicketLog::where('ticket_id', -1)->get();
        if ($user->is_staff == 1) {
            if ($allowed_refferal && $authorise == true) {
                $authorise_user_reffral = UserAuthorise::allowed_user_by_ticket($ticket_id);

            }
        }
        $ticket_time_log = TicketLog::where('ticket_id', $ticket_id)->get();
        ///////////////////////////////////////////
        if ($user->is_staff == 1 && ($ticket[0]->status == 0 || $ticket[0]->status == 4) && $ticket[0]->sender_id != $user->id) {
            if ($ticket[0]->status == 0 || $ticket[0]->status == 4) {
                $data = [];
                if ($ticket[0]->receiver_id == 0) {
                    $data["receiver_id"] = $user->id;
                }
                $data["status"] = 1;
                $ticket[0]->update($data);
            }
        }
        ///////////////////////////////////////////////
        $data = [];
        $chains = Ticket::find_all_chains($ticket_id);
        $data["chains"] = $chains;
        $data["current_user"] = $user;
        $data["current_ticket"] = $ticket[0];
        $data["status_list"] = Ticket::STATUS_LIST();
        $data["authorise_user_reffral"] = $authorise_user_reffral;
        $data["ticket_time_log"] = $ticket_time_log;
        $data["allowed_refferal"] = $allowed_refferal;
        $data["set_times"] = $set_times;
        $data["authorise"] = $authorise;
        if (Session::has('return_back')) {
            $data["return_back"] = Session::get('return_back');
        }
        ///////////////////////////////////////////////
        return view('ticket.show', $data);
    }

    public function inbox($status = -1)
    {
        $user = auth::user();
        $data = [];
        if ($status >= 0 && $status < 6) {
            $tickets = Ticket::find_tickets("i", 0, $status);
        } else {
            $tickets = Ticket::find_tickets("i");
        }
        /////////////////////
        $data["tickets"] = $tickets;
        $data["user"] = $user;
        $data["type"] = "sender";
        $data["ticket_status"] = Ticket::STATUS_LIST();
        //////////////////////
        return view('ticket.index', $data);
    }

    public function sent()
    {
        $user = auth::user();
        $data = [];
        $tickets = Ticket::find_tickets("i");
        /////////////////////
        $data["tickets"] = $tickets;
        $data["user"] = $user;
        $data["type"] = "sender";
        $data["ticket_status"] = Ticket::STATUS_LIST();
        //////////////////////
        return view('ticket.index', $data);
    }

    public function change_status(Request $request, Ticket $ticket)
    {
        Session::flash('return_back', "change_status");
        $current_user = auth::user();
        $data = $request->validate(
            [
                "status" => "required|numeric|min:0|max:5",
                "minut" => ($request->status == 2) ? "required|" : "nullable|" . "numeric",
                "hour" => ($request->status == 2) ? "required|" : "nullable|" . "numeric",
            ]
        );
        try {
            $data = [];
            $old_status = $ticket->status;
            $ticket_status = $request->status;
            if ($old_status != $ticket_status) {
                $data["status"] = $ticket_status;
                if ($ticket_status == 4) {
                    $data ["receiver_id"] = 0;
                }
                $ticket->update($data);
                ////////////////////////////////////////////
                if ($ticket_status == 2) {
                    $time_user = $request->hour . ":" . $request->minut;
                    $ticket_log = TicketLog::where('ticket_id', $ticket->id)->where('type', 2)->orderBy('id', 'DESC')->get();
                    $data = [];
                    $data["time_user"] = $time_user;
                    $data["end_time_system"] = date("Y-m-d H:i:s");
                    $data["ticket_status"] = $ticket_status;
                    $data["start_time_system"] = $ticket_log->isEmpty() ? date("Y-m-d H:i:s") : $ticket_log[0]->start_time_system;
                    $data["ticket_id"] = $ticket->id;
                    $data["user_id"] = $current_user->id;
                    $data["type"] = 4;
                    TicketLog::create($data);
                } else if ($ticket_status >= 3) {
                    $data = [];
                    $data["ticket_id"] = $ticket->id;
                    $data["ticket_status"] = $ticket_status;
                    $data["user_id"] = $current_user->id;
                    $data["start_time_system"] = date("Y-m-d H:i:s");
                    $data["type"] = TicketLog::getTypeByTicketStatus($ticket_status);
                    TicketLog::create($data);
                }
                //////////////////////////////////////////////////
                return redirect('tickets/sent');
            }

        } catch (\Exception $e) {

        }

        return redirect('tickets/' . $ticket->generate_ticket_id());
    }

    public
    function start_work_time($ticket_id)
    {
        $ticket_id = $this->decode_ticket_id($ticket_id);
        $ticket = Ticket::find($ticket_id);
        $current_user_id = auth::user()->id;
        $data = [
            "type" => 2,
            "ticket_id" => $ticket_id,
            "user_id" => $current_user_id,
            "start_time_system" => date('Y-m-d H:i:s'),
            "ticket_status" => $ticket->status,
        ];
        $t_l = TicketLog::where('ticket_id', $ticket_id)->where('user_id', $current_user_id)->where('type', 2)->where('end_time_system', null)->get();
        if ($t_l->isEmpty()) {
            TicketLog::create($data);
        } else {
        }
    }

    public
    function end_work_time($ticket_id)
    {
        $current_user_id = auth::user()->id;
        ///////////
        $ticket_id = $this->decode_ticket_id($ticket_id);
        $ticket_log = TicketLog::where('ticket_id', $ticket_id)->where('user_id', $current_user_id)->where('end_time_system', null)->where('type', 2)->get();
        $data = [
            "end_time_system" => date('Y-m-d H:i:s')
        ];
        try {

            if ($ticket_log->isEmpty()) {
                Session::flash('message', trans("mb.canNotEndWorkTime", ["ticket_id" => $ticket_id]));
                Session::flash('alert-class', "alert-danger");
            } else {
                foreach ($ticket_log as $tl) {
                    $tl->update($data);
                }
            }
        } catch (\Exception $e) {

        }
    }

    public
    function replay(Request $request, Ticket $ticket)
    {
        $data = Ticket::validate_replay();
        $data["ticket_id"] = $this->decode_ticket_id($request->ticket_id);
        ///////////////////////////////////////
        $ticket = Ticket::create($data);
        upload_ticket_files($ticket, "file_1");
        upload_ticket_files($ticket, "file_2");
        upload_ticket_files($ticket, "file_3");

        return redirect('tickets/' . $request->ticket_id);


    }

    public
    function reffral(Request $request, Ticket $ticket)
    {
        Session::flash('return_back', "reffral");
        $data = $request->validate([
            "user_id" => "required|numeric",
            "receiver_id" => "required|numeric",
            "ticket_id" => "required|numeric",
            "comment" => "required|string",
            "expire_date_fa" => "required|string",
            "expire_date" => "required|string",
            "duration_hour" => "required|numeric",
            "duration_day" => "required|numeric",
        ]);
        $data["type"] = 1;
        ////////////////
        $expire_date = $request->expire_date . ' 00:00:00';
        /////////////////////////////////////////
        $data1 = [];
        $data1["expire_date_current"] = $expire_date;
        $data1["duration_day_current"] = $request->duration_day;
        $data1["duration_hour_current"] = $request->duration_hour;
        ///////////////////////////////////////////////////////////////////////
        try {
            $ticket = Ticket::find($request->ticket_id);
            if (is_null($ticket)) {
                Session::flash('message', trans("mb.canNotReffralTicket", ["ticket_id" => $request->ticket_id]));
                Session::flash('alert-class', "alert-danger");
            } else {
                if ($ticket->receiver_id == $request->receiver_id) {
                    Session::flash('message', trans("mb.receiverIsSame", ["name" => ($ticket->receiver == false) ? trans("unknown") : $ticket->receiver->name]));
                    Session::flash('alert-class', "alert-danger");
                    return Redirect::back();
                } else {
                    $ticket->update($data1);
                    /////////////////////////////////////////////////////////////
                    $data["expire_date"] = $expire_date;
                    $data["duration_day"] = $request->duration_day;
                    $data["duration_hour"] = $request->duration_hour;
                    $data["ticket_status"] = $ticket->status;
                    unset($data["expire_date_fa"]);
                    ///  /////////////////////////////////////
                    TicketLog::closeAllTimeWork($ticket->id);
                    TicketLog::create($data);
                    if (!is_null($ticket)) {
                        $ticket->update(["receiver_id" => $request->receiver_id]);
                    } //////////////////////////////////////////////////////////////
                    Session::flash('message', trans("mb.successRefrallTicket", ["ticket_id" => $request->ticket_id]));
                    Session::flash('alert-class', "alert-success");
                    ///////////////////////////////////////////////////////////////
                    return redirect('tickets/inbox');
                }

            }

            ////////////////////////////////////////////////////////////////////////
        } catch (\Exception $e) {
            Session::flash('message', trans("mb.canNotReffralTicket", ["ticket_id" => $request->ticket_id]));
            Session::flash('alert-class', "alert-danger");
        }
    }

    public
    function search(Request $request)
    {
        $data = $request->validate([
            "ticket_id" => "nullable|numeric",
            "topic_search" => "nullable|numeric",
            "subject_ticket" => "nullable|numeric",
        ]);

        $ticket = Ticket::where('trash', 0);
        if (isset($request->ticket_id)) {
            $ticket = $ticket->where('ticket_id', $request->ticket_id);
        }
        if (isset($request->topic_search)) {
            $ticket = Ticket::where('trash', 0);
            $subject_ticket = isset($request->subject_ticket) ? $request->subject_ticket : "";
            switch ($request->topic_search) {
                case 1:
                    $ticket = $ticket->where('id', $subject_ticket);
                    break;
                case 2:
                    $ticket = $ticket->where('subject', $subject_ticket);
                    break;
                case 3:
                    $user = User::where('name', $subject_ticket)->get();

                    $ticket = $ticket->where('id', $subject_ticket);
                    break;
            }
        }

        $ticket = $ticket->get();
        if ($ticket->isEmpty()) {
            return redirect('/tickets/inbox');

        } else {
            return redirect('/tickets/' . $ticket[0]->generate_ticket_id());

        }
    }

    public
    function set_times(Request $request, Ticket $ticket)
    {
        Session::flash('return_back', "set_times");
        $current_user = auth::user();
        $data = $request->validate(
            [
                "expire_date_fa" => "required|string",
                "expire_date" => "required|string",
                "duration_hour" => "required|numeric",
                "duration_day" => "required|numeric",
            ]
        );
        unset($data["expire_date_fa"]);
        ////////////////////////////////////////////////////////
        try {
            $expire_date = $request->expire_date . ' 00:00:00';
            $data["expire_date"] = $expire_date;
            $data["expire_date_current"] = $expire_date;
            $data["duration_day_current"] = $request->duration_day;
            $data["duration_hour_current"] = $request->duration_hour;
            ///////////////////////////////////////////////////
            if ($ticket->expire_date == str_replace('/', '-', $expire_date) && $ticket->duration_hour == $request->duration_hour && $ticket->duration_day == $request->duration_day) {
                Session::flash('message', trans("mb.setTimesIsSame"));
                Session::flash('alert-class', "alert-danger");
                return Redirect::back();
            }
            ////////////////////////////////////////////////
            $ticket_log = TicketLog::where('ticket_id', $ticket->id)->where('type', 1)->get();
            if (!$ticket_log->isEmpty()) {
                Session::flash('message', trans("mb.ErrorSetTimes"));
                Session::flash('alert-class', "alert-danger");
                return Redirect::back()->withErrors([0 => trans('mb.ErrorSetTimes')]);
            }
            ////////////////////////////////////////////////
            $ticket->update($data);
            unset($data["expire_date_current"]);
            unset($data["duration_day_current"]);
            unset($data["duration_hour_current"]);
            //////////////////////////////////
            $data["user_id"] = auth::user()->id;
            $data["ticket_status"] = $ticket->status;
            $data["type"] = 10;
            $data["ticket_id"] = $ticket->id;
            TicketLog::create($data);
            /////////////////////////
        } catch (\Exception $e) {
            abort(404, "tickets");
        }
        /////////////////////////////////////////////
        return redirect('tickets/' . $ticket->generate_ticket_id());
    }

    private
    function decode_ticket_id($code)
    {
        return base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($code)))));

    }

    public function advanced_search(Request $request)
    {
        $data = $request->validate([
            "topic_search" => "nullable|numeric",
            "subject_ticket" => "nullable|string",
        ]);
        if (isset($request->topic_search)) {
            $ticket = Ticket::where('trash', 0)->whereRaw("id=ticket_id");
            $subject_ticket = isset($request->subject_ticket) ? $request->subject_ticket : "";
            switch ($request->topic_search) {
                case 1:
                    $ticket = $ticket->where('id', $subject_ticket);
                    break;
                case 2:
                    $ticket = $ticket->where('subject', $subject_ticket);
                    break;
                case 3:
                    $user = User::where('name', $subject_ticket)->get();
                    $user_id_s = [];
                    foreach ($user as $u) {
                        array_push($user_id_s, $u->id);
                    }
                    $ticket = $ticket->whereIn('sender_id', $user_id_s)->orWhereIn('receiver_id', $user_id_s);
                    break;
            }
        }
        $tickets = $ticket->groupBy('ticket_id')->get();
        /////////////////////
        $data = [];
        $data["tickets"] = $tickets;
        $data["user"] = auth::user();
        $data["type"] = "sender";
        $data["ticket_status"] = Ticket::STATUS_LIST();

        //dd($tickets);
        //////////////////////
        return view('ticket.index', $data);

    }

    public function print_tickets($ticket_id)
    {
        $data = [];
        //////////////
        $ticket_id = $this->decode_ticket_id($ticket_id);
        $ticket = Ticket::findorfail($ticket_id);
        if ($ticket->id != $ticket->ticket_id) {
            $ticket = Ticket::findorfail($ticket->ticket_id);
        }
        $data["ticket"] = $ticket;
        //////////////////////////////////////
        $chains = Ticket::where('ticket_id', $ticket->id)->get();
        $data["chains"] = $chains;
        //////////////////////////////////
        return view('ticket.print', $data);

    }


}
