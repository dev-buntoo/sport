<?php

namespace App\Imports;

use App\Member;
use App\Model\Appointment;
use App\Model\Income;
use App\Model\UpdateRate;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAppoint implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public $id, $year, $round;
    public function __construct($id, $year, $round)
    {
        $this->id = $id;
        $this->year = $year;
        $this->round = $round;
        //
    }
    public function rules(): array
    {
        return [

            '3' => 'required|string',
            // so on
        ];
    }
    public function showMember($fname)
    {
        return   Member::where('fname', $fname)->first();
    }
    public function model(array $row)
    {
        if (@$row[3] != NULL) {
            // dd(explode(" ", $row[4])[0]);
            if (($this->showMember(explode(" ", $row[4])[0]) != null)) {
                $grade = UpdateRate::where('grade', $row[3])->first();
                Income::create([
                    'member_id' => $grade->id,
                    'amount' => $grade->refree_rate,
                    'description' =>  $this->round . " " . $this->year
                ]);
            }
            return new Appointment([
                'ground'           => @$row[0],
                'home_team'        => @$row[1],
                'away_team'        => @$row[2],
                'grade'            => @$row[3],
                'referee'          => @$row[4],
                'touch_judge_one'  => @$row[5],
                'touch_judge_two'  => @$row[6],
                'coach'            => @$row[7],


                'file_id'      => $this->id,
                'year'         => $this->year,
                'round'        => $this->round


            ]);
        }
    }
}