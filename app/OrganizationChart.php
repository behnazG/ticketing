<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class OrganizationChart extends Model
{
    protected $guarded = ['id'];

    public static function validate()
    {
        return request()->validate([
            'parent' => 'required|numeric'
        ]);
    }

    public function getParentNameAttribute()
    {
        if ($this->parent == 0) {
            return trans('mb.self');
        } else {
            $p_n = $this->find($this->parent);
            if (!is_null($p_n))
                return $p_n->name;
            else
                return trans('mb.unknown');
        }
    }


    public function getNameAttribute()
    {
        $name = trans('mb.unknown');
        if (Session::exists('locale_id')) {
            $language_id = Session::get('locale_id');
            $h_l = OrganizationChartLanguage::where('organization_chart_id', $this->id)->where('language_id', $language_id)->where('column_name', 'name')->get();
            if (!$h_l->isEmpty()) {
                $name = $h_l[0]->value;
            }
        }
        return $name;
    }

}
