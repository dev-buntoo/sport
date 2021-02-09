<?php

namespace App\Imports;

use App\Model\Appointment;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAppoint implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $id,$year,$round;
    public function __construct($id,$year,$round)
    {
        $this->id = $id;
        $this->year = $year;
        $this->round = $round;
        //
    }

    public function model(array $row)
    {

        return new Appointment([
            'home_team'        => @$row[0],
            'away_team'        => @$row[1],
            'grade'            => @$row[2],
            'touch_judge_one'  => @$row[3],
            'touch_judge_two'  => @$row[4],
            'coach'            => @$row[5],


            'file_id'      => $this->id,
            'year'         => $this->year,
            'round'        => $this->round


        ]);
    }
}
