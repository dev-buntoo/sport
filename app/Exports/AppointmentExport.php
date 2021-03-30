<?php

namespace App\Exports;

use App\Model\Appointment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AppointmentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $year;
    protected $round;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($year, $round)
    {
        $this->year = $year;
        $this->round = $round;
    }

    public function headings(): array
    {
        return [
            'Round',
            'Home Team',
            'Away Team',
            'Grade',
            'Referee',
            'Touch Judge #1',
            'Touch Judge #2',
            'Coach',
            'Referee Rate',
            'Touch Judge Rate',
            'Coach Rate',
        ];
    }
    public function collection()
    {
        if ($this->round == '' && $this->year == '') {
            $appointments = DB::table('appointments')
                ->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')
                ->select('appointments.round', 'appointments.home_team', 'appointments.away_team', 'appointments.grade', 'appointments.referee', 'appointments.touch_judge_one', 'appointments.touch_judge_two', 'appointments.coach', 'update_rates.refree_rate')
                ->selectRaw('(update_rates.touch_judge_rate)*2 as touch_judge_rate')
                ->selectRaw('update_rates.coach_rate')
                ->get();
            $totalRefreeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->sum('update_rates.refree_rate');
            $totalJudgeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->sum('update_rates.touch_judge_rate');
            $totalCoachRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->sum('update_rates.coach_rate');
            $appointments->push([
                'round' => '',
                'home_team' => '',
                'away_team' => '',
                'grade' => '',
                'referee' => '',
                'touch_judge_one' => '',
                'touch_judge_two' => '',
                'coach' => 'Total',
                'refree_rate' => $totalRefreeRate,
                'touch_judge_rate' => $totalJudgeRate * 2,
                'coach_rate' => $totalCoachRate,
            ]);
        } elseif ($this->round == '' && $this->year != '') {
            $appointments = DB::table('appointments')
                ->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')
                ->select('appointments.round', 'appointments.home_team', 'appointments.away_team', 'appointments.grade', 'appointments.referee', 'appointments.touch_judge_one', 'appointments.touch_judge_two', 'appointments.coach', 'update_rates.refree_rate')
                ->selectRaw('(update_rates.touch_judge_rate)*2 as touch_judge_rate')
                ->selectRaw('update_rates.coach_rate')
                ->where('year', $this->year)
                ->get();
            $totalRefreeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('year', $this->year)->sum('update_rates.refree_rate');
            $totalJudgeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('year', $this->year)->sum('update_rates.touch_judge_rate');
            $totalCoachRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('year', $this->year)->sum('update_rates.coach_rate');
            $appointments->push([
                'round' => '',
                'home_team' => '',
                'away_team' => '',
                'grade' => '',
                'referee' => '',
                'touch_judge_one' => '',
                'touch_judge_two' => '',
                'coach' => 'Total',
                'refree_rate' => $totalRefreeRate,
                'touch_judge_rate' => $totalJudgeRate * 2,
                'coach_rate' => $totalCoachRate,
            ]);
        } elseif ($this->round != '' && $this->year == '') {
            $appointments = DB::table('appointments')
                ->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')
                ->select('appointments.round', 'appointments.home_team', 'appointments.away_team', 'appointments.grade', 'appointments.referee', 'appointments.touch_judge_one', 'appointments.touch_judge_two', 'appointments.coach', 'update_rates.refree_rate')
                ->selectRaw('(update_rates.touch_judge_rate)*2 as touch_judge_rate')
                ->selectRaw('update_rates.coach_rate')
                ->where('round', $this->round)
                ->get();
            $totalRefreeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('round', $this->round)->sum('update_rates.refree_rate');
            $totalJudgeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('round', $this->round)->sum('update_rates.touch_judge_rate');
            $totalCoachRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('round', $this->round)->sum('update_rates.coach_rate');
            $appointments->push([
                'round' => '',
                'home_team' => '',
                'away_team' => '',
                'grade' => '',
                'referee' => '',
                'touch_judge_one' => '',
                'touch_judge_two' => '',
                'coach' => 'Total',
                'refree_rate' => $totalRefreeRate,
                'touch_judge_rate' => $totalJudgeRate * 2,
                'coach_rate' => $totalCoachRate,
            ]);
            // dd($appointments);
        } else {
            $appointments = DB::table('appointments')
                ->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')
                ->select('appointments.round', 'appointments.home_team', 'appointments.away_team', 'appointments.grade', 'appointments.referee', 'appointments.touch_judge_one', 'appointments.touch_judge_two', 'appointments.coach', 'update_rates.refree_rate')
                ->selectRaw('(update_rates.touch_judge_rate)*2 as touch_judge_rate')
                ->selectRaw('update_rates.coach_rate')
                ->where('round', $this->round)
                ->where('year', $this->year)
                ->get();
            $totalRefreeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('round', $this->round)->where('year', $this->year)->sum('update_rates.refree_rate');
            $totalJudgeRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('round', $this->round)->where('year', $this->year)->sum('update_rates.touch_judge_rate');
            $totalCoachRate = DB::table('appointments')->join('update_rates', 'appointments.grade', '=', 'update_rates.grade')->where('round', $this->round)->where('year', $this->year)->sum('update_rates.coach_rate');
            $appointments->push([
                'round' => '',
                'home_team' => '',
                'away_team' => '',
                'grade' => '',
                'referee' => '',
                'touch_judge_one' => '',
                'touch_judge_two' => '',
                'coach' => 'Total',
                'refree_rate' => $totalRefreeRate,
                'touch_judge_rate' => $totalJudgeRate * 2,
                'coach_rate' => $totalCoachRate,
            ]);
        }

        return $appointments;
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },
        ];
    }
}
