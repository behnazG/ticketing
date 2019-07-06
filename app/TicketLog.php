<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketLog extends Model
{
    protected $guarded = ['id'];

    public static function TYPE_LIST()
    {
        return [
            1 => trans("mb.referral"),
            2 => trans('mb.setTimes'),
            4 => trans('mb.done'),
            5 => trans('mb.closed'),
            6 => trans('mb.resend'),
            7 => trans('mb.training'),
        ];
    }

    public function getUserFullNameAttribute()
    {
        $u = User::find($this->user_id);
        if (is_null($u)) {
            return trans("mb.uknown");
        } else {
            return $u->name;
        }
    }

    public function getTypeNameAttribute()
    {
        $type_list = self::TYPE_LIST();
        try {
            if (in_array($this->type, array_keys($type_list)))
                return $type_list[$this->type];
        } catch (\Exception $e) {
            return trans("mb.unknown");
        }
    }

    public function getReceiverFullNameAttribute()
    {
        $u = User::find($this->receiver_id);
        if (is_null($u)) {
            return trans("mb.uknown");
        } else {
            return $u->name;
        }
    }

    public static function closeAllTimeWork($ticket_id)
    {
        $ticket_log = TicketLog::where('ticket_id', $ticket_id)->where('end_time_system', null)->where('type', 2)->get();
        $ticket = Ticket::find($ticket_id);
        $ticket_status = is_null($ticket) ? 0 : $ticket->status;
        $data["ticket_status"] = $ticket_status;
        if (!$ticket_log->isEmpty()) {
            foreach ($ticket_log as $t) {
                $end_date = date('Y-m-d H:i:s');
                $t->update(['end_time_system' => $end_date, 'ticket_status' => $ticket_status]);
            }
        }

    }

    public static function getTypeByTicketStatus($ticket_status)
    {
        if ($ticket_status == 3)
            return 5;
        elseif ($ticket_status == 4)
            return 6;
        elseif ($ticket_status == 5)
            return 7;
        else
            return 0;
    }
}
