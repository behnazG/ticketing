<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = ['id'];

//
    public static function validate($id=0)
    {
        return request()->validate(
            [
                'name' => "required|unique:categories,name,$id|string|max:128",
                'parent' => 'required|numeric',

            ]
        );
    }
}
