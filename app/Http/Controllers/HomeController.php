<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        start_setting();
        $count_ticket=Ticket::find_tickets()->count();
        $data=[];
        $data["count_ticket"]=$count_ticket;
        return view('welcome',$data);
    }

    public function refresh_top_menu_ticket()
    {
        $current_ticket_id = 0;
        $ticket = Ticket::where('status', 0)->orderBy('id', 'DESC')->get();
        ////////////////////////////////
        $result = [];
        if (!$ticket->isEmpty()) {
            $tickets = Ticket::find_tickets('i', $ticket[0]->id, 0);
            $count_ticket = $tickets->count() - 1;
            if ($count_ticket > 0)
                Session::put('current_ticket_id', $tickets[$count_ticket]->id);
            if (!$tickets->isEmpty()) {
                foreach ($tickets as $ticket) {
                    $d = [];
                    $d["id"] = $ticket->generate_ticket_id();
                    $d["name"] = $ticket->sender->name;
                    $d["date"] = date_sh($ticket->created_at);
                    $d["subject"] = $ticket->subject;
                    $d["status_color"] = Ticket::STATUS_LIST($ticket->status)[1];
                    $result[] = $d;
                }
            }
        }
        ///////////////////////////////////////////////////////////////////
        return json_encode($result);
    }

    public function refresh_top_menu_notify()
    {
        $is_staff = auth::user()->is_staff;
        if ($is_staff) {

          $current_time=date('Y-m-d H:i:s');
        } else {

        }
        return $is_staff;
    }
}
