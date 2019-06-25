<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Category;
use App\OrganizationChart;
use App\Ticket;
use Illuminate\Http\Request;

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
        $ticket_id = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($ticket_id)))));
        $user = auth::user();
        $ticket = Ticket::where('id', $ticket_id)->get();
        //////////////////////////////////
        if (!Ticket::check_authorise_ticket($ticket_id)) {
            return redirect('tickets');
        }
        ///////////////////////////////////////////////
        $data = [];
        $chains = Ticket::find_all_chains($ticket_id);
        $data["chains"] = $chains;
        $data["current_user"] = $user;
        $data["current_ticket"]=$ticket[0];
        $data["status_list"]=Ticket::STATUS_LIST();
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
        $tickets = Ticket::find_tickets("s");
        /////////////////////
        $data["tickets"] = $tickets;
        $data["user"] = $user;
        $data["type"] = "sender";
        $data["ticket_status"] = Ticket::STATUS_LIST();
        //////////////////////
        return view('ticket.index', $data);
    }

}
