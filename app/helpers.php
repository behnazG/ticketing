<?php
/**
 * Created by PhpStorm.
 * User: god_sun_aurora_god
 * Date: 6/17/2019
 * Time: 1:02 PM
 */

function upload_image($model,$field_name,$folder_path)
{
    $request = request();
    $p_old = $model->$field_name;
    if ($request->$field_name) {
        $p = $request->file($field_name)->store('public/'.$folder_path);
        $p=substr($p,7,strlen($p)-7);
        Storage::delete('public/'.$p_old);
        $data = [];
        $data[$field_name] = $p;
        $model->update($data);
    }
}