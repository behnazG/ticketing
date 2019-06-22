<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded=['id'];
    public static function validate()
    {
        return request()->validate([
            'name'=>'required|string|max:128',
            'phone'=>'nullable|string|max:128',
            'address'=>'nullable|string|max:128',
            'province_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'sms_receiver_num'=>'nullable|numeric',
            'email'=>'nullable|email',
            'expire_date'=>'nullable',
        ]);
    }

    public function getProvinceNameAttribute()
    {
        $d=Province::where('id',$this->province_id)->get();
        if($d->isEmpty())
        {
            return trans('mb.unknown');
        }else
        {
            return $d[0]->name;
        }

    }

    public function getCityNameAttribute()
    {
        $d=City::where('id',$this->city_id)->get();
        if($d->isEmpty())
        {
            return trans('mb.unknown');
        }else
        {
            return $d[0]->name;
        }
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function province()
    {
        return $this->belongsTo(City::class);
    }
}
