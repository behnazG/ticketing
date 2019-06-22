<?php

namespace App\Http\Controllers;

use App\Category;
use App\Hotel;
use App\User;
use App\UserAuthorise;
use Illuminate\Http\Request;

class UserAuthoriseController extends Controller
{
    public function authorise(User $user)
    {
        $data = [];
        $data["user"] = $user;
        $data["hotels"] = Hotel::where('valid', 1)->get();
        $data["categories"] = Category::where('valid', 1)->where('parent', '<>', 0)->get();
        $user_authorises = UserAuthorise::where('user_id', $user->id)->get();
        $data["old_categories"] = [];
        $data["old_hotels"] = [];
        $data["old_allow_referral"] = 1;
        foreach ($user_authorises as $ua) {
            if ($ua->field_name == "categories") {
                $data["old_categories"][] = $ua->field_value;
            } else if ($ua->field_name == "hotels") {
                $data["old_hotels"] [] = $ua->field_value;
            } else if ($ua->field_value == "allow_referral") {
                $data["old_allow_referral"] = 1;
            }
        }
        return view('user.authorise', $data);
    }

    public function store(User $user, Request $request)
    {
        $categories = Category::where('valid', 1)->get();
        $hotels = Hotel::where('valid', 1)->get();
        /////////////////////////////////////////////////////////////////
        $user_authorises = UserAuthorise::where('user_id', $user->id)->get();
        $data_old_category = [];
        $data_old_hotel = [];
        $old_allow_referral = 0;
        $u_a_old_id = [];////////old u_a and save db
        $u_a_id = [];/////current u_a and save in db
        foreach ($user_authorises as $u_a) {
            if ($u_a->field_name == "categories") {
                $data_old_category[$u_a->id] = $u_a->field_value;
                $u_a_old_id[$u_a->id] = $u_a->field_value;
            } elseif ($u_a->field_name == "hotels") {
                $data_old_hotel[$u_a->id] = $u_a->field_value;
                $u_a_old_id[$u_a->id] = $u_a->field_value;
            } elseif ($u_a->field_name == "allow_referral") {
                $old_allow_referral = 1;
                $u_a_old_id[$u_a->id] = "allow_referral";
            }
        }
        /// ////////////////////////////////////////////////////////////
        $data = [];
        foreach ($categories as $c) {
            $c_name = "category_" . $c->id;
            if ($request->$c_name) {
                if (!in_array($c->id, $data_old_category))
                    $data[] = ["field_name" => "categories", "field_value" => $c->id, "user_id" => $user->id];
                else
                    $u_a_id[array_search($c->id, $data_old_category)] = $c->id;
            }
        }
        foreach ($hotels as $h) {
            $h_name = "hotel_" . $h->id;
            if (isset($request->$h_name)) {
                if (!in_array($h->id, $data_old_hotel))
                    $data[] = ["field_name" => "hotels", "field_value" => $h->id, "user_id" => $user->id];
                else
                    $u_a_id[array_search($h->id, $data_old_hotel)] = $h->id;
            }
        }
        if (isset($request->setting_1)) {
            if ($old_allow_referral != 1)
                $data[] = ["field_name" => "allow_referral", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("allow_referral", $u_a_old_id)] = "allow_referral";
        }
        ////////////////////////////
        try {
            $a = array_diff($u_a_old_id, $u_a_id); //// $id that must be clear
            $a = UserAuthorise::destroy(array_keys($a));;
            UserAuthorise::insert($data);
            return redirect('users/staffs');
        } catch (\Exception $e) {
        }


    }
}
