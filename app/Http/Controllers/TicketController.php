<?php

namespace App\Http\Controllers;

use App\TicketLog;
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
        }
        if (!Ticket::check_authorise_ticket($ticket_id)) {
            abort(401, "tickets");
        }
        ///////////////////////////////////////////////////////////////////////////
        $authorise_user_reffral = [];
        $allowed_refferal = UserAuthorise::allowed_refferal_by_user($user->id);
        $set_times = UserAuthorise::allowed_setTimes_by_user($user->id);
        $ticket_time_log = TicketLog::where('ticket_id', -1)->get();
        if ($user->is_staff == 1) {
            if ($allowed_refferal) {
                $authorise_user_reffral = UserAuthorise::allowed_user_by_ticket($ticket_id);
            }
        }
        $ticket_time_log = TicketLog::where('ticket_id', $ticket_id)->get();
        ///////////////////////////////////////////
        if ($user->is_staff == 1 && $ticket[0]->status == 0 && $ticket[0]->sender_id != $user->id) {
            if ($ticket[0]->status == 0) {
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
        if (Session::has('return_back')) {
            $data["return_back"] = Session::get('return_back');
        }
        ///////////////////////////////////////////////
        return view('ticket.show', $data);
    }

    public function inbox()
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
                if ($ticket_status == 4) {
                    $data = [];
                    $data ["sender_id"] = $ticket->sender_id;
                    $data ["receiver_id"] = 0;
                    $data ["category_id"] = $ticket->category_id;
                    $data ["organizational_chart_id"] = $ticket->organizational_chart_id;
                    $data ["valid"] = $ticket->valid;
                    $data ["status"] = 0;
                    $data ["subject"] = $ticket->subject;
                    $data ["text"] = $ticket->text;
                    $data ["file_1"] = $ticket->file_1;
                    $data ["file_2"] = $ticket->file_2;
                    $data ["file_3"] = $ticket->file_3;
                    try {
                        $ticket_copy = Ticket::create($data);
                        $data = ["ticket_id" => $ticket_copy->id];
                        $ticket_copy->update($data);
                    } catch (\Exception $e) {
                    }
                    return redirect('tickets/sent');

                }

            }


        } catch (\Exception $e) {

        }
        return redirect('tickets/' . $ticket->generate_ticket_id());
    }

    public function start_work_time($ticket_id)
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

    public function end_work_time($ticket_id)
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
            } else {
                foreach ($ticket_log as $tl) {
                    $tl->update($data);

                }
            }
        } catch (\Exception $e) {

        }
    }

    public function replay(Request $request, Ticket $ticket)
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

    public function reffral(Request $request, Ticket $ticket)
    {
        Session::flash('return_back', "reffral");
        $data = $request->validate([
            "user_id" => "required|numeric",
            "receiver_id" => "required|numeric",
            "ticket_id" => "required|numeric",
            "comment" => "required|string",
            "expire_date_hour" => "required|numeric",
            "expire_date_day" => "required|numeric",
            "duration_hour" => "required|numeric",
            "duration_day" => "required|numeric",
        ]);
        $data["type"] = 1;
        ////////////////
        $data1 = [];
        $data1["duration_hour_current"] = $request->duration_hour;
        $data1["duration_day_current"] = $request->duration_day;
        $data1["expire_date_hour_current"] = $request->expire_date_hour;
        $data1["expire_date_day_current"] = $request->expire_date_day;
        ///////////////////////////////////////////////////////////////////////
        try {
            $ticket = Ticket::find($request->ticket_id);
            $ticket->update($data1);
            /////////////////////////////////////////////////////////////
            TicketLog::closeAllTimeWork($ticket->id);
            TicketLog::create($data);
            if (!is_null($ticket)) {
                $ticket->update(["receiver_id" => $request->receiver_id]);
            }
            ///////////////////////////////////////////////////////////////
            return redirect('tickets/inbox');
            ////////////////////////////////////////////////////////////////////////
        } catch (\Exception $e) {

        }
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            "ticket_id" => "nullable|numeric"
        ]);
        $ticket = Ticket::where('trash', 0);
        if (isset($request->ticket_id)) {
            $ticket = $ticket->where('ticket_id', $request->ticket_id);
        }

        $ticket = $ticket->get();
        if ($ticket->isEmpty()) {
            return redirect('/tickets/inbox');

        } else {
            return redirect('/tickets/' . $ticket[0]->generate_ticket_id());

        }
    }

    public function set_times(Request $request, Ticket $ticket)
    {
        Session::flash('return_back', "set_times");
        $current_user = auth::user();
        $data = $request->validate(
            [
                "expire_date_hour" => "required|numeric",
                "expire_date_day" => "required|numeric",
                "duration_hour" => "required|numeric",
                "duration_day" => "required|numeric",
            ]
        );
        try {
            $ticket_log = TicketLog::where('ticket_id', $ticket->id)->where('type', 1)->get();
            if (!$ticket_log->isEmpty()) {
                Redirect::back()->withErrors([0=>trans('mb.ErrorSetTimes')]);
            }
            ////////////////////////////////////////////////
            $ticket->update($data);
            $data["user_id"] = auth::user()->id;
            $data["ticket_status"] = $ticket->status;
            $data["type"] = 10;
            $data["ticket_id"] = $ticket->id;
            TicketLog::create($data);
            /////////////////////////
        } catch (\Exception $e) {
            dd(23);
        }
        return redirect('tickets/' . $ticket->generate_ticket_id());
    }

    private function decode_ticket_id($code)
    {
        return base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($code)))));

    }


}
