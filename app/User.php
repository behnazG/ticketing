<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','hotel_id','mobile','organizational_chart_id','gender','valid','image_path'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /*
     *
     *
     */
    public static function validate($id=0)
    {
        $request= request();
        $is_staff=(isset($request->is_staff))?1:0;
        return $request->validate([
            "name"=>"required|string",
            "email"=>"required|email|unique:users,email,$id",
            "mobile"=>"nullable|numeric|unique:users,mobile,$id",
            "gender"=>"nullable|numeric|min:0|max:2",
            "organizational_chart_id"=>($is_staff==1)?"required":"nullable"."|numeric|min:1",
            "hotel_id"=>($is_staff==0)?"required":"nullable"."|numeric|min:0",
            "image_path"=>"nullable|image|mimes:jpeg,png,jpg|max:50",
            "password"=>($id==0)?"required":"nullable"."|confirmed",
            "password_confirmation"=>($id==0 ||(!is_null(request()->password)&&trim(request()->password)!=""))?"required":"nullable"
        ]);

    }
}
