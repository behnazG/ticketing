<?php

use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: god_sun_aurora_god
 * Date: 6/17/2019
 * Time: 1:02 PM
 */

function upload_image($model, $field_name, $folder_path)
{
    $request = request();
    $p_old = $model->$field_name;
    if ($request->$field_name) {
        $p = $request->file($field_name)->store('public/' . $folder_path);
        $p = substr($p, 7, strlen($p) - 7);
        Storage::delete('public/' . $p_old);
        $data = [];
        $data[$field_name] = $p;
        $model->update($data);
    }
}

function upload_ticket_files($model, $field_name)
{
    $request = request();
    if ($request->$field_name) {
//        $extention=pathinfo($request->$field_name->getClientOriginalName())["extension"];
//        $p=$request->file($field_name)->storeAs('tickets',$model->id.".".$extention);
        $p = $request->file($field_name)->store('public/' . 'tickets');
        $data[$field_name] = $p;
        $model->update($data);
    }
}

function download_attach_files()
{

}

///////////////////////////////////////////////////////////
function date_sh($date)
{
    if(auth::user()->lang==2)
        return $date;
    $v = new Verta($date);
    return $v->formatDifference();
}

function date_shamsi($date)
{
    if(auth::user()->lang==2)
        return $date;
    $v = new Verta($date);
    return $v->format("Y-m-d H:i:s");
}

function get_icon_url($icon_name = "user")
{
    if ($icon_name == "user")
        return asset("app-assets/images/icons/user.jpg");
}

function start_setting()
{

}