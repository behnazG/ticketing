<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public static function validate($id = 0)
    {
        $request = request();
        return $request->validate([
            "sender_id" => "required|numeric",
            "receiver_id" => "nullable|numeric",
            "admin_id" => "nullable|numeric",
            "chat_id" => "required|numeric",
            "category_id" => "required|numeric",
            "organizational_chart_id" => "required|numeric",
            "valid" => "required|numeric",
            "status" => "required|numeric",
            "subject" => "required|string|512",
            "text" => "required|text",
            "admin_text" => "nullable|text",
            "time_table" => "nullable",
            "attach_file_1" => 'nullable|mimes:' . 'jpeg,png,jpg,' .
                'application/vnd.ms-office,' .
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,' .
                'application/vnd.ms-excel',

        ]);
    }
}
