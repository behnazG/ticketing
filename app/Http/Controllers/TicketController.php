<?php

namespace App\Http\Controllers;

use App\TicketLog;
use App\UserAuthorise;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\OrganizationChart;
use App\Ticket;
use Illuminate\Http\Request;
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
        $authorise_user_reffral = UserAuthorise::allowed_user_by_ticket($ticket_id);
        //////////////////////////////////
        if (!Ticket::check_authorise_ticket($ticket_id)) {
            return redirect('tickets');
        }
        //////////////////////////////////////////////
        if ($user->is_staff == 1 && $ticket[0]->status == 0) {
            $ticket[0]->update(["status" => 1]);
        }
        ///////////////////////////////////////////////
        $data = [];
        $ticket_time_log = TicketLog::where('ticket_id', $ticket_id)->orderBy('id', 'DESC')->get();
        $chains = Ticket::find_all_chains($ticket_id);
        $data["chains"] = $chains;
        $data["current_user"] = $user;
        $data["current_ticket"] = $ticket[0];
        $data["status_list"] = Ticket::STATUS_LIST();
        $data["authorise_user_reffral"] = $authorise_user_reffral;
        $data["ticket_time_log"] = $ticket_time_log;
        if (Session::has('return_back')) {
            $data["return_back"] = "change_status";
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
            $data["status"] = $request->status;
            $ticket->update($data);
            ////////////////////////////////////////////
            $time_user = $request->hour . ":" . $request->minut;
            $ticket_log = TicketLog::where('ticket_id', $ticket->id)->where('type', 2)->orderBy('id', 'DESC')->get();
            $data = [];
            $data["time_user"] = $time_user;
            $data["end_time_system"] = date("Y-m-d H:i:s");
            $data["ticket_status"] = $ticket->status;
            $data["start_time_system"] = $ticket_log->isEmpty() ? date("Y-m-d H:i:s") : $ticket_log[0]->start_time_system;
            $data["ticket_id"] = $ticket->id;
            $data["user_id"] = $current_user->id;
            $data["type"] = 4;
            TicketLog::create($data);

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
        $ticket_log = TicketLog::where('ticket_id', $ticket_id)->where('user_id', $current_user_id)->where('end_time_system',null)->where('type', 2)->get();
        $data = [
            "end_time_system" => date('Y-m-d H:i:s')
        ];
        try
        {

            if($ticket_log->isEmpty())
            {
            }else
            {
                foreach ($ticket_log as $tl)
                {
                    $tl->update($data);

                }
            }
        }catch (\Exception $e)
        {

        }
    }


    public function replay(Request $request, Ticket $ticket)
    {
        $data = Ticket::validate_replay();
        ///////////////////////////////////////
        $ticket = Ticket::create($data);
        upload_ticket_files($ticket, "file_1");
        upload_ticket_files($ticket, "file_2");
        upload_ticket_files($ticket, "file_3");
    }

    public function reffral(Request $request, Ticket $ticket)
    {
        //  dd($request);
        $data = $request->validate([
            "user_id" => "required|numeric",
            "receiver_id" => "required|numeric",
            "ticket_id" => "required|numeric",
            "comment" => "required|string",
        ]);
        $data["type"] = 1;
        ////////////////
        ///////////////////////////////////////////////////////////////////////
        try {
            $ticket = Ticket::find($request->ticket_id);
            /////////////////////////////////////////////////////////////
            TicketLog::closeAllTimeWork($ticket->id);
            TicketLog::create($data);
            if (!is_null($ticket)) {
                $ticket->update(["receiver_id" => $request->receiver_id]);
            }
            return redirect('tickets/inbox');
            ////////////////////////////////////////////////////////////////////////
        } catch (\Exception $e) {

        }
        //////////////////////////////////////////////////////////////////////

    }


    private function decode_ticket_id($code)
    {
        return base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($code)))));

    }


}
