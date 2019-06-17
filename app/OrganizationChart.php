<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationChart extends Model
{
    protected $guarded = ['id'];

    public static function validate()
    {
        return request()->validate([
            'name' => 'required|string|max:128',
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
}
