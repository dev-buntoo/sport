<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Email extends Model
{
    public static function sendslip($user, $data){
        Mail::send(['html' => 'main.slip.payslip'], $data, function ($message) use ($user) {
            $message->to($user, '')->subject('PaySlip');
        });
    }
}
