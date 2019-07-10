<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Self_;

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
            "duration" => "nullable",
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
            "ticket_id" => "required",
            "sender_id" => "required|numeric",
            "receiver_id" => "required|numeric",
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
            $ticket_id = $this->ticket_id;
            $ticket = self::find($ticket_id);
            if (is_null($ticket)) {
                dd(1);
                return false;
            } else {
                if ($ticket->sender_id == $this->sender_id) {
                    $current_user = User::where('id', $this->receiver_id)->get();

                } else if ($ticket->sender_id == $this->receiver_id) {
                    $current_user = User::where('id', $this->sender_id)->get();
                } else {
                    return false;
                }
            }
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

    public static function find_tickets($type = "s", $ticket_id = 0, $status = "all")
    {
        $current_user = auth::user();
        if (is_null($current_user))
            return [];
        ///////////////////////////
        if ($type == "s" || $current_user->is_staff == 0) {
            $t = Ticket::where('sender_id', $current_user->id)->where('trash', 0)->groupBy('ticket_id')->get();
            return $t;
        }
        if ($current_user->organizational_chart_id == 1) {
            $t = Ticket::where('trash', 0)->whereRaw('ticket_id=id')->groupBy('ticket_id')->get();
            return $t;
        }
        /////////////////////////////
        if ($type == "i") {
            $allowed_user = UserAuthorise::allowed_user_by_user($current_user->id);
            $allowed_categories = UserAuthorise::allowed_categories_by_user($current_user->id);
            $allow_status_ticket = UserAuthorise::allowed_status_by_user($current_user->id);
            $t = self::whereIn('category_id', $allowed_categories)
                ->whereIn('sender_id', $allowed_user)
                ->whereIn('status', $allow_status_ticket)
                ->Orwhere('receiver_id', $current_user->id);
            if ($ticket_id > 0)
                $t = $t->where('id', '>', $ticket_id);
            if ($status != "all") {
                $t = $t->where('status', $status);
            }
            $t = $t->groupBy('ticket_id')->get();
            return $t;
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
        if ($ticket->sender_id == $current_user->id || $ticket->receiver_id == $current_user->id) {
            return true;
        }
        ////////////////////////////
        /// check by category and hotel
        $allow_users = UserAuthorise::allowed_user_by_ticket($ticket->id);
        $allow_userss = [];
        if (!$allow_users->isEmpty()) {
            foreach ($allow_users as $value) {
                array_push($allow_userss, $value->id);
            }
        }
        if (!in_array($current_user->id, $allow_userss)) {
            return false;
        }
        //////////////////////////////////////////////////////////////////////
        /// chesck by other
        $allow_users = UserAuthorise::allowed_user_by_ticketStatus($ticket->id);
        $allow_userss = [];
        if (!$allow_users->isEmpty()) {
            foreach ($allow_users as $value) {
                array_push($allow_userss, $value->id);
            }
        }
        if (!in_array($current_user->id, $allow_userss)) {
            return false;
        }
        ////////////////////////////////////
        return true;
    }

    public static function find_all_chains($ticket_id)
    {
        $tickets = self::where('trash', 0)->where('ticket_id', $ticket_id)->get();
        return $tickets;
    }

    public function download_attach_file($field_value)
    {
        try {
            if (Storage::exists($this->$field_value))
                return Storage::url($this->$field_value);
        } catch (\Exception $e) {
            return false;
        }
        return false;
    }

    public function generate_ticket_id()
    {
        return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($this->id)))));
    }

    public function getExpireDateAttribute()
    {
        if (!is_null($this->expire_date_day) && !is_null($this->expire_date_hour))
            return strtotime($this->created_at . " + $this->expire_date_day days + $this->expire_date_hour hours");
    }

    public function getDurationAttribute()
    {
        if (!is_null($this->duration_day) && !is_null($this->duration_hour))
            return strtotime($this->created_at . " + $this->duration_day days + $this->duration_hour hours");
    }

    public function getExpireDateCurrentAttribute()
    {
        if (!is_null($this->expire_date_day) && !is_null($this->expire_date_hour))
            return strtotime($this->created_at . " + $this->expire_date_day days + $this->expire_date_hour hours");
    }

    public function getDurationCurrentAttribute()
    {
        if (!is_null($this->duration_day) && !is_null($this->duration_hour))
            return strtotime($this->created_at . " + $this->duration_day days + $this->duration_hour hours");
    }

    public function getSenderAttribute()
    {
        $user = User::find($this->sender_id);
        if (is_null($user))
            return false;
        else return $user;
    }

}
