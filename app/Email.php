<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class Email extends Model
{
    public static function sendslip($user, $data){
        Mail::send(['html' => 'main.slip.payslip'], $data, function ($message) use ($user) {
            $message->to($user, '')->subject('PaySlip');
        });
    }
    public static function sendrecord($data,$emails,$pdf,$subject = null){
        // $emails = ['sport@bzbeetech.com', 'afeef@bzbeetech.com','sport@bzbeetech.com'];
// $type = ($type == 1)?'main.slip.se':'main.slip.ju';
Mail::send('main.slip.t', $data, function($message) use ($emails,$pdf,$subject)
{
    $message->to($emails)->subject($subject)
    ->attach(public_path('storage/pdf/'.$pdf), [
        'as' => 'report.pdf',
        'mime' => 'application/pdf',
   ]);
});

    }
}
