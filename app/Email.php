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
    public static function sendrecord(){
        $emails = ['sport@bzbeetech.com', 'afeef@bzbeetech.com','sport@bzbeetech.com'];

Mail::send('main.slip.at', [], function($message) use ($emails)
{
    $message->to($emails)->subject('This is test e-mail')
    ->attach(public_path('main/upload_files/1615805949.xlsx'), [
        'as' => '1615805949.xlsx',
        'mime' => 'application/pdf',
   ]);
});

    }
}
