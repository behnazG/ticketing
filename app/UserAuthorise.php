<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserAuthorise extends Model
{
    public static function allowed_hotels_by_user($user_id)
    {
        $h = self::where('field_name', 'hotels')->where('user_id', $user_id)->get();
        $hotels = [];
        if (!$h->isEmpty()) {
            foreach ($h as $hh) {
                array_push($hotels, $hh->field_value);
            }
        }
        return $hotels;
    }

    public static function allowed_categories_by_user($user_id)
    {
        $c = self::where('field_name', 'categories')->where('user_id', $user_id)->get();
        $categories = [];
        if (!$c->isEmpty()) {
            foreach ($c as $cc) {
                array_push($categories, $cc->field_value);
            }
        }
        return $categories;
    }

    public static function allowed_user_by_user($user_id)
    {
        $h = self::where('field_name', 'hotels')->where('user_id', $user_id)->get();
        $hotels = [];
        if (!$h->isEmpty()) {
            foreach ($h as $hh) {
                array_push($hotels, $hh->field_value);
            }
        }
        $users = [];
        $u = User::whereIn('hotel_id', $hotels)->orWhere('is_staff', 1)->get();

        if (!$u->isEmpty()) {
            foreach ($u as $uu) {
                array_push($users, $uu->id);
            }
        }
        return $users;
    }

    public static function allowed_status_by_user($user_id)
    {
        $a_s_t = [];///athourise status ticket
        $u_a = self::where('field_name', 'view_pending_ticket')->where('field_value', 1)->where('user_id', $user_id)->get();
        if (!$u_a->isEmpty()) {
            array_push($a_s_t, 0);
            array_push($a_s_t, 4);
        }
        $u_a = self::where('field_name', 'view_in_progress_ticket')->where('field_value', 1)->where('user_id', $user_id)->get();
        if (!$u_a->isEmpty()) {
            array_push($a_s_t, 1);
        }
        $u_a = self::where('field_name', 'view_closed')->where('field_value', 1)->where('user_id', $user_id)->get();
        if (!$u_a->isEmpty()) {
            array_push($a_s_t, 3);
        }
        //////////////////////
        ///
        if (empty($a_s_t)) {
            array_push($a_s_t, -1);
        }
        return $a_s_t;

    }

    public static function allowed_user_by_ticket($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        if (is_null($ticket)) {
            return [];
        } else {
            $category_id = $ticket->category_id;
            $sender_id = $ticket->sender_id;
            $user_sender = User::find($sender_id);
            if (is_null($user_sender))
                return [];
            $hotel_id = $user_sender->hotel_id;
//            $user_authorise = UserAuthorise::where([
//                ['field_name', '=', 'categories'],
//                ['field_value', '=', $category_id],
//            ])->where([
//                ['field_name', '=', 'hotels'],
//                ['field_value', '=', $hotel_id],
//            ]);
            $user_authorise = UserAuthorise::whereRaw("
            `field_name` = 'categories' and `field_value` = $category_id  and 
            (`user_id` IN( select user_id from user_authorises where `field_name` = 'hotels' and `field_value` = $hotel_id) 
            || `user_id` IN (select id from users where is_staff=1))");
            $user_authorise = $user_authorise->get();
            $u_a = [];
            foreach ($user_authorise as $u) {
                array_push($u_a, $u->user_id);
            }
            ///////////////////////////////////////////////
            $user = User::whereIn('id', $u_a)->orWhere('organizational_chart_id', '1')->get();
            /////////////////////////////////////////////
            return $user;

        }

    }

    public static function allowed_user_by_ticketStatus($ticket_id)
    {
        $user_authorise = UserAuthorise::where('id', '>', 1);
        $ticket = Ticket::find($ticket_id);
        if (is_null($ticket)) {
            return [];
        } else {
            $ticket_status = $ticket->status;
            if ($ticket_status == 0) {
                $user_authorise = $user_authorise->where([
                    ['field_name', '=', 'view_pending_ticket'],
                    ['field_value', '=', 1],
                ]);
            }
            if ($ticket_status == 1) {
                $user_authorise = $user_authorise->where([
                    ['field_name', '=', 'view_in_progress_ticket'],
                    ['field_value', '=', 1],
                ]);
            }
            if ($ticket_status == 3) {
                $user_authorise = $user_authorise->where([
                    ['field_name', '=', 'view_closed'],
                    ['field_value', '=', 1],
                ]);
            }
            $user_authorise = $user_authorise->get();
            $u_a = [];
            foreach ($user_authorise as $u) {
                array_push($u_a, $u->user_id);
            }
            ///////////////////////////////////////////////
            $user = User::whereIn('id', $u_a)->orWhere('organizational_chart_id', '1')->get();
            /////////////////////////////////////////////
            return $user;
        }
    }


    public static function allowed_refferal_by_user($user_id)
    {
        $a = self::where('field_name', 'allow_referral')->where('field_value', 1)->where('user_id', $user_id)->get();
        if ($a->isEmpty())
            return false;
        else
            return true;
    }

    public static function allowed_setTimes_by_user($user_id)
    {
        $a = self::where('field_name', 'set_times')->where('field_value', 1)->where('user_id', $user_id)->get();
        if ($a->isEmpty())
            return false;
        else
            return true;
    }


    public static function getAuthorise()
    {
        try {
            $r = [];
            $current_user = auth::user()->id;
            $u_a_s = self::where('user_id', $current_user)->get();
            foreach ($u_a_s as $u_a) {
                $index = $u_a->field_name;
                array_push($r, $index);
            }
            return $r;
        } catch (\Exception $e) {
            return [];
        }

    }

}
