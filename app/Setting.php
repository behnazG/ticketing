<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public static function is_referrals_admin()
    {
      $s=self::find(1);
      if(is_null($s))
          return 1;
      else
      return $s->referrals_admin;
    }

}
