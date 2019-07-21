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
        /////////////////////////////////////////
        $other_setting = [
            "allow_referral",
            "view_pending_ticket",
            "view_in_progress_ticket",
            "view_closed",
            "view_training",
            "set_times",
            "get_sms",
            "admin_users",
            "add_authorise",
            "admin_hotels",
            "admin_categories",
            "admin_organizationCharts",
            "allow_end_ticket_work"
        ];
        foreach ($other_setting as $key) {
            $index = "old_" . $key;
            $data[$index] = 0;
        }
        //////////////////////////////////////////
        foreach ($user_authorises as $ua) {
            if ($ua->field_name == "categories") {
                $data["old_categories"][] = $ua->field_value;
            } else if ($ua->field_name == "hotels") {
                $data["old_hotels"] [] = $ua->field_value;
            }

            foreach ($other_setting as $key) {
                if ($ua->field_name == $key && $ua->field_value == 1) {
                    $data["old_" . $key] = 1;
                }
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
        $u_a_old_id = [];////////old u_a and save db
        $u_a_id = [];/////current u_a and save in db
        ///////////////////////////////////////////
        $old_allow_referral = 0;
        $old_view_pending_ticket = 0;
        $old_view_in_progress_ticket = 0;
        $old_view_closed = 0;
        $old_view_training=0;
        $old_set_times = 0;
        $old_get_sms = 0;
        $old_admin_users = 0;
        $old_add_authorise = 0;
        $old_admin_hotels = 0;
        $old_admin_categories = 0;
        $old_admin_organizationCharts = 0;
        $old_allow_end_ticket_work=0;
        /////////////////////////////////////////////////////
        foreach ($user_authorises as $u_a) {
            if ($u_a->field_name == "categories") {
                $data_old_category[$u_a->id] = $u_a->field_value;
                $u_a_old_id[$u_a->id] = $u_a->field_value;
            } elseif ($u_a->field_name == "hotels") {
                $data_old_hotel[$u_a->id] = $u_a->field_value;
                $u_a_old_id[$u_a->id] = $u_a->field_value;
            } /////////////////////////////////////////////////////////

            elseif ($u_a->field_name == "allow_referral") {
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
            } elseif ($u_a->field_name == "view_training") {
                $old_view_training = 1;
                $u_a_old_id[$u_a->id] = "view_training";
            } elseif ($u_a->field_name == "set_times") {
                $old_set_times = 1;
                $u_a_old_id[$u_a->id] = "set_times";
            } elseif ($u_a->field_name == "get_sms") {
                $old_get_sms = 1;
                $u_a_old_id[$u_a->id] = "get_sms";
            } elseif ($u_a->field_name == "admin_users") {
                $old_admin_users = 1;
                $u_a_old_id[$u_a->id] = "admin_users";
            } elseif ($u_a->field_name == "add_authorise") {
                $old_add_authorise = 1;
                $u_a_old_id[$u_a->id] = "add_authorise";
            } elseif ($u_a->field_name == "admin_hotels") {
                $old_admin_hotels = 1;
                $u_a_old_id[$u_a->id] = "admin_hotels";
            } elseif ($u_a->field_name == "admin_categories") {
                $old_admin_categories = 1;
                $u_a_old_id[$u_a->id] = "admin_categories";
            } elseif ($u_a->field_name == "admin_organizationCharts") {
                $old_admin_organizationCharts = 1;
                $u_a_old_id[$u_a->id] = "admin_organizationCharts";
            }elseif ($u_a->field_name == "allow_end_ticket_work") {
                $old_allow_end_ticket_work = 1;
                $u_a_old_id[$u_a->id] = "allow_end_ticket_work";
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
        if (isset($request->view_training)) {
            if ($old_view_training != 1)
                $data[] = ["field_name" => "view_training", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("view_training", $u_a_old_id)] = "view_training";
        }
        if (isset($request->set_times)) {
            if ($old_set_times != 1)
                $data[] = ["field_name" => "set_times", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("set_times", $u_a_old_id)] = "set_times";
        }
        if (isset($request->get_sms)) {
            if ($old_get_sms != 1)
                $data[] = ["field_name" => "get_sms", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("get_sms", $u_a_old_id)] = "get_sms";
        }
        if (isset($request->admin_users)) {
            if ($old_admin_users != 1)
                $data[] = ["field_name" => "admin_users", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("admin_users", $u_a_old_id)] = "admin_users";
        }
        if (isset($request->add_authorise)) {
            if ($old_add_authorise != 1)
                $data[] = ["field_name" => "add_authorise", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("add_authorise", $u_a_old_id)] = "add_authorise";
        }
        if (isset($request->admin_hotels)) {
            if ($old_admin_hotels != 1)
                $data[] = ["field_name" => "admin_hotels", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("admin_hotels", $u_a_old_id)] = "admin_hotels";
        }
        if (isset($request->admin_categories)) {
            if ($old_admin_categories != 1)
                $data[] = ["field_name" => "admin_categories", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("admin_categories", $u_a_old_id)] = "admin_categories";
        }
        if (isset($request->admin_organizationCharts)) {
            if ($old_admin_organizationCharts != 1)
                $data[] = ["field_name" => "admin_organizationCharts", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("admin_organizationCharts", $u_a_old_id)] = "admin_organizationCharts";
        }
        if (isset($request->allow_end_ticket_work)) {
            if ($old_allow_end_ticket_work != 1)
                $data[] = ["field_name" => "allow_end_ticket_work", "field_value" => 1, "user_id" => $user->id];
            else
                $u_a_id[array_search("allow_end_ticket_work", $u_a_old_id)] = "allow_end_ticket_work";
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
