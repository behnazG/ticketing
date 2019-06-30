<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Ticket extends Model
{
    protected $guarded = ['id'];

    public static function validate($id = 0)
    {
        $request = request();
        return Validator::make($request->all(), [
            "sender_id" => "required|numeric",
            "receiver_id" => ($id == 0) ? "nullable|" : "required|" . "numeric",
            "ticket_id" => ($id == 0) ? "nullable|" : "required|" . "numeric",
            "category_id" => "required|numeric",
            "organizational_chart_id" => "required|numeric",
            "valid" => "required|numeric",
            "status" => "required|numeric",
            "subject" => "required|string",
            "text" => "required|string",
            "time_table" => "nullable",
            "file_1" => "nullable|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xltm,xlsx"
                . ",doc,csv,docx,ppt,txt,text,bmp,gif,jpeg,jpg,jpe,png,rtf|max:200",
            "file_2" => "nullable|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xltm,xlsx"
                . ",doc,csv,docx,ppt,txt,text,bmp,gif,jpeg,jpg,jpe,png,rtf|max:200",
            "file_3" => "nullable|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xltm,xlsx"
                . ",doc,csv,docx,ppt,txt,text,bmp,gif,jpeg,jpg,jpe,png,rtf|max:200",
        ])->validate();
    }
    public static function validate_replay()
    {
        return request()->validate([
            "ticket_id" =>  "required|" . "numeric",
            "sender_id" => "required|numeric",
            "text" => "required|string",
            "file_1" => "nullable|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xltm,xlsx"
                . ",doc,csv,docx,ppt,txt,text,bmp,gif,jpeg,jpg,jpe,png,rtf|max:200",
            "file_2" => "nullable|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xltm,xlsx"
                . ",doc,csv,docx,ppt,txt,text,bmp,gif,jpeg,jpg,jpe,png,rtf|max:200",
            "file_3" => "nullable|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xltm,xlsx"
                . ",doc,csv,docx,ppt,txt,text,bmp,gif,jpeg,jpg,jpe,png,rtf|max:200",
        ]);

    }


    public static function STATUS_LIST($index = -1)
    {
        $a = [
            0 => [trans("mb.pending"), "danger", "far fa-envelope"],
            1 => [trans("mb.inProgress"), "warning", "far fa-envelope-open"],
            2 => [trans("mb.done"), "info", "far fa-envelope"],
            3 => [trans("mb.closed"), "success", "far fa-envelope"],
            4 => [trans("mb.resend"), "primary", "ft-refresh-ccw"],
            5 => [trans("mb.training"), "teal", "fas fa-book-open"],
        ];
        if ($index >= 0 && $index < 6) {
            return $a[$index];
        } else if ($index == -1) {
            return $a;
        } else {
            return trans("mb.unknown");
        }
    }

    public function getFrontUserAttribute()
    {
        $current_user_id = auth::user()->id;
        $current_user = "";
        if ($this->sender_id == $current_user_id) {
            $current_user = User::where('id', $this->receiver_id)->get();
        } else if ($this->receiver_id == $current_user_id) {
            $current_user = User::where('id', $this->sender_id)->get();
        } else {
            return false;
        }
        if ($current_user->isEmpty()) {
            return false;
        }
        return $current_user[0];
    }

    public function getStatusNameAttribute()
    {
        $status = self::STATUS_LIST();
        return $status[$this->status][0];

    }

    public static function find_tickets($type = "s")
    {
        $current_user = auth::user();
        if (is_null($current_user))
            return [];
        ///////////////////////////
        if ($type == "s") {
            $t = Ticket::where('sender_id', $current_user->id)->where('trash', 0)->groupBy('ticket_id')->get();
            return $t;
        } /////////////////////////////
        else if ($type == "i") {
            if ($current_user->is_staff == 1) {
                if ($current_user->organizational_chart_id == 1) {
                    $t = Ticket::where('trash', 0)->whereRaw('ticket_id=id')->groupBy('ticket_id')->get();
                    return $t;
                } else {
                    $referrals_admin = Setting::is_referrals_admin();
                    if ($current_user->organizational_chart_id == 2 || $referrals_admin == 0) {
                        $allowed_user = UserAuthorise::allowed_user_by_user($current_user->id);
                        $allowed_categories = UserAuthorise::allowed_categories_by_user($current_user->id);
                        $t = self::whereIn('category_id', $allowed_categories)->whereIn('sender_id', $allowed_user)->groupBy('ticket_id')->get();
                        return $t;
                    } elseif ($referrals_admin == 1) {
                        $t = Ticket::where('receiver_id', $current_user->id)->where('trash', 0)->groupBy('ticket_id')->get();
                        return $t;
                    }
                }
            } else if ($current_user->is_staff == 0) {
                $t = Ticket::where('sender_id', $current_user->id)->where('trash', 0)->groupBy('ticket_id')->get();
                return $t;
            }
        }
    }

    /**
     * @uses checked current user authorise to the ticket
     * @param $ticket_id
     * @return bool
     *
     */
    public static function check_authorise_ticket($ticket_id)
    {
        $current_user = auth::user();
        $ticket = Ticket::find($ticket_id);
        if (is_null($ticket) || is_null($current_user)) {
            //log
            return false;

        }
        //////////////////////////////
        if ($ticket->sender_id == $current_user->id) {
            return true;

        }
        //////////////////////////
        $allow = 1;
        $ticket_id = $ticket->id;
        $user_id = $current_user->id;
        $hotel_id = 0;
        //////////////////////////////////
        $ticket_user = User::find($ticket->sender_id);
        if (is_null($ticket_user)) {
            return false;
        } else {
            $ticket_hotel = Hotel::find($ticket_user->hotel_id);
            if (is_null($ticket_hotel))
                return false;
            else
                $hotel_id = $ticket_hotel->id;
        }
        ///////////////////////////////////
        $s = Setting::find(1);
        $referrals_admin = 0;
        if (is_null($s)) {
            $referrals_admin = 0;
        } else {
            $referrals_admin = ($s->referrals_admin == 1) ? 1 : 0;
        }
        /////////////////////////////////////////////////
        if ($referrals_admin == 1) {
            if ($ticket->receiver_id == $current_user->id)
                $allow = 1;
        }
        //////////////////////CHECK HOTEL/////////////////////////
        if ($allow == 1) {
            if (in_array($hotel_id, UserAuthorise::allowed_hotels_by_user($current_user->id))) {
                $allow = 1;
            } else {
                $allow = 0;
            }

        }
        /////////////////////CHECK CATEGORY////////////////////////////////
        if ($allow == 1) {
            if (in_array($ticket->category_id, UserAuthorise::allowed_categories_by_user($current_user->id))) {
                $allow = 1;
            } else {
                $allow = 0;
            }

        }
        ////////////////////////////////////
        if ($allow == 1)
            return true;
        else
            return false;
    }

    public static function find_all_chains($ticket_id)
    {
        $tickets = self::where('trash', 0)->where('ticket_id', $ticket_id)->get();
        return $tickets;
    }

    public function download_attach_file($field_value)
    {
        try {
            return Storage::url($this->$field_value);
        } catch (\Exception $e) {
            return false;
        }
    }
    public function generate_ticket_id()
    {
        return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($this->id)))));
    }


}
