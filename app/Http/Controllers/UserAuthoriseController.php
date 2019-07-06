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
        $data["old_allow_referral"] = 0;
        $data["old_view_pending_ticket"] = 0;
        $data["old_view_in_progress_ticket"] = 0;
        $data["old_view_closed"] = 0;
        $data["old_set_times"] = 0;

        foreach ($user_authorises as $ua) {
            if ($ua->field_name == "categories") {
                $data["old_categories"][] = $ua->field_value;
            } else if ($ua->field_name == "hotels") {
                $data["old_hotels"] [] = $ua->field_value;
            } else if ($ua->field_name == "allow_referral" && $ua->field_value == 1) {
                $data["old_allow_referral"] = 1;
            } else if ($ua->field_name == "view_pending_ticket" && $ua->field_value == 1) {
                $data["old_view_pending_ticket"] = 1;
            } else if ($ua->field_name == "view_in_progress_ticket" && $ua->field_value == 1) {
                $data["old_view_in_progress_ticket"] = 1;
            } else if ($ua->field_name == "view_closed" && $ua->field_value == 1) {
                $data["old_view_closed"] = 1;
            } else if ($ua->field_name == "set_times" && $ua->field_value == 1) {
                $data["old_set_times"] = 1;
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
        $old_view_pending_ticket = 0;
        $old_view_in_progress_ticket = 0;
        $old_view_closed = 0;
        $old_set_times=0;
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
            } elseif ($u_a->field_name == "view_pending_ticket") {
                $old_view_pending_ticket = 1;
                $u_a_old_id[$u_a->id] = "view_pending_ticket";
            } elseif ($u_a->field_name == "view_in_progress_ticket") {
                $old_view_in_progress_ticket = 1;
                $u_a_old_id[$u_a->id] = "view_in_progress_ticket";
            } elseif ($u_a->field_name == "view_closed") {
                $old_view_closed = 1;
                $u_a_old_id[$u_a->id] = "view_closed";
            }elseif ($u_a->field_name == "set_times") {
                $old_set_times = 1;
                $u_a_old_id[$u_a->id] = "set_times";
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
        if (isset($request->allow_referral)) {
            if ($old_allow_referral != 1)
                $data[] = ["field_name" => "allow_referral", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("allow_referral", $u_a_old_id)] = "allow_referral";
        }
        if (isset($request->view_pending_ticket)) {
            if ($old_view_pending_ticket != 1)
                $data[] = ["field_name" => "view_pending_ticket", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("view_pending_ticket", $u_a_old_id)] = "view_pending_ticket";
        }
        if (isset($request->view_in_progress_ticket)) {
            if ($old_view_in_progress_ticket != 1)
                $data[] = ["field_name" => "view_in_progress_ticket", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("view_in_progress_ticket", $u_a_old_id)] = "view_in_progress_ticket";
        }
        if (isset($request->view_closed)) {
            if ($old_view_closed != 1)
                $data[] = ["field_name" => "view_closed", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("view_closed", $u_a_old_id)] = "view_closed";
        }
        if (isset($request->set_times)) {
            if ($old_set_times != 1)
                $data[] = ["field_name" => "set_times", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("set_times", $u_a_old_id)] = "set_times";
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
