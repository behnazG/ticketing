<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

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
        $u = User::whereIn('hotel_id', $hotels)->get();
        if (!$u->isEmpty()) {
            foreach ($u as $uu) {
                array_push($users, $uu->id);
            }
        }
        return $users;

    }

    public static function allowed_user_by_ticket($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        if (is_null($ticket)) {
            return [];
        } else {
            $category_id=$ticket->category_id;
            $sender_id=$ticket->sender_id;
            $user_sender=User::find($sender_id);
            if(is_null($user_sender))
                return [];
            $hotel_id=$user_sender->hotel_id;
            $user_authorise=UserAuthorise::where([
                ['field_name','=','categories'],
                ['field_value','=',$category_id],
            ])->orWhere([
                ['field_name','=','hotels'],
                ['field_value','=',$hotel_id],
            ])->get();
            $u_a=[];
            foreach ($user_authorise as $u)
            {
                array_push($u_a,$u->user_id);
            }
            ///////////////////////////////////////////////
            $user=User::whereIn('id',$u_a)->orWhere('organizational_chart_id','1')->get();
            /////////////////////////////////////////////
            return $user;

        }

    }

}
