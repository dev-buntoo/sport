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
    public function model(array $row)
    {
        return new Appointment([
            'home_team'    => @$row[0],
            'away_team'    => @$row[1],
            'grade'        => @$row[2],
            
        ]);
    }
}
