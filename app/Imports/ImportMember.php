<?php

namespace App\Imports;

use App\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMember implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public $id;
    // public function __construct($id)
    // {
    //     $this->id = $id;
    //     //
    // }

    public function model(array $row)
    {

        return new Member([

 'email'=> @$row[0],
 'password'=> @$row[1],
 'fname'=> @$row[2],
 'mname'=> @$row[3],
 'lname'=> @$row[4],
 'date_of_birth'=> @$row[5],
 'phone_1'=> @$row[6],
 'phone_2'=> @$row[7],
 'email_2'=> @$row[8],
 'gender'=> @$row[9],
 'address'=> @$row[10],
 'acc_name'=> @$row[11],
 'acc_number'=> @$row[12],
 'bank_name'=> @$row[13],
 'bsb_number'=> @$row[14],
 'tfn_number'=> @$row[15],
 'payment_frequency'=> @$row[16],
 'member_number'=> @$row[17],
 'status'=> @$row[18],
 'role'=> @$row[19],
 'life_member'=> @$row[20],
 'date_of_joining'=> @$row[21],
 'referre_level'=> @$row[22],
 'coach_level'=> @$row[23],
 'wwcc_number'=> @$row[24],
 'wwcc_expiry'=> @$row[25],
 'photo'=> @$row[26],
 'is_member'=> 1,
 'role_id'=>@$row[27],



        ]);
    }
}
