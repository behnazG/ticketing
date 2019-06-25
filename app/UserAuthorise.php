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
        $users=[];
        $u=User::whereIn('hotel_id',$hotels)->get();
        if(!$u->isEmpty())
        {
            foreach ($u as $uu)
            {
                array_push($users,$uu->id);
            }
        }
        return $users;

    }


}
