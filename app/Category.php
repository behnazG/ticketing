<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    //
    protected $guarded = ['id'];

//
    public static function validate($id=0)
    {
        return request()->validate(
            [
                'parent' => 'required|numeric',

            ]
        );
    }


    public function getNameAttribute()
    {
        $name = trans('mb.unknown');
        if (Session::exists('locale_id')) {
            $language_id = Session::get('locale_id');
            $h_l = CategoryLanguage::where('category_id', $this->id)->where('language_id', $language_id)->where('column_name', 'name')->get();
            if (!$h_l->isEmpty()) {
                $name = $h_l[0]->value;
            }
        }
        return $name;

    }
}
