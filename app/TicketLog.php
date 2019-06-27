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
}
