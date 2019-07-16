<?php

namespace App\Http\Controllers;

use App\LastUpdate;
use App\Ticket;
use App\User;
use App\language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $current_ticket_id = 0;
        $ticket = Ticket::where('status', 0)->orderBy('id', 'DESC')->get();
        $tickets = Ticket::find_tickets('i', $ticket[0]->id, 0);
        $count_ticket = $tickets->count() - 1;
        start_setting();
        $count_ticket = Ticket::find_tickets()->count();
        $data = [];
        $data["count_ticket"] = $count_ticket;
        /////////////////////////////////////////////////////////////////
        $tickt_status = \App\Ticket::find_tickets('i', 0, 'all', true);
        $status_ticket = [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        foreach ($tickt_status as $t_s) {
            $status_ticket[$t_s->status] = $t_s->counts;
        }
        $tickt_status = Ticket::STATUS_LIST();
        $data["ticket_status"] = $tickt_status;
        $data["ticket_status_user"] = $status_ticket;
        ///////////////////////////////////////////////////////////////
        $last_updates = LastUpdate::limit(10)->get();
        $data["last_updates"] = $last_updates;
        ////////////////////////////////////////////////
        return view('welcome', $data);
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
            $current_time = date('Y-m-d H:i:s');
        } else {

        }
        return $is_staff;
    }

    public function set_locale($lang)
    {
        $language = Language::find($lang);
        if (!is_null($language)) {
            $users = User::where('id', auth::user()->id)->get();
            if (!$users->isEmpty()) {
                foreach ($users as $u) {
                    $i = auth::user()->update(["lang" => $lang]);
                }
                Session::put('locale', $language->short_name);
                Session::put('locale_id', $language->id);
            } else {
            }
        }
        return Redirect::back();
    }
}
