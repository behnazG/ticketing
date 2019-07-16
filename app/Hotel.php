<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Hotel extends Model
{
    protected $guarded = ['id'];

    public static function validate()
    {
        return request()->validate([
            'phone' => 'nullable|string|max:128',
            'province_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'sms_receiver_num' => 'nullable|numeric',
            'email' => 'nullable|email',
            'expire_date' => 'nullable',
        ]);

    }

    public function getProvinceNameAttribute()
    {
        $d = Province::where('id', $this->province_id)->get();
        if ($d->isEmpty()) {
            return trans('mb.unknown');
        } else {
            return $d[0]->name;
        }

    }

    public function getCityNameAttribute()
    {
        $d = City::where('id', $this->city_id)->get();
        if ($d->isEmpty()) {
            return trans('mb.unknown');
        } else {
            return $d[0]->name;
        }
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }


    public function getNameAttribute()
    {
        $name = trans('mb.unknown');
        if (Session::exists('locale_id')) {
            $language_id = Session::get('locale_id');
            $h_l = HotelLanguage::where('hotel_id', $this->id)->where('language_id', $language_id)->where('column_name', 'name')->get();
            if (!$h_l->isEmpty()) {
                $name = $h_l[0]->value;
            }
        }
        return $name;

    }
    public function getAddressAttribute()
    {
        $address = trans('mb.unknown');
        if (Session::exists('locale_id')) {
            $language_id = Session::get('locale_id');
            $h_l = HotelLanguage::where('hotel_id', $this->id)->where('language_id', $language_id)->where('column_name', 'address')->get();
            if (!$h_l->isEmpty()) {
                $address = $h_l[0]->value;
            }
        }
        return $address;
    }
}
