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
            'address'=>'nullable|string|max:128'
        ]);
    }
}
