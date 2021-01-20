<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\Appointment;
use App\Model\ImportData;
use Schema;

class ShowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // ===================
    //      DASHBOARD
    public function showDashboard()
    {
        // return 'hello';
        return view('main.dashboard.view');
    }
    //        END
    // ===================
    //      MEMBERS
    public function showMember()
    {
        $members = User::all();
        return view('main.member.view',compact('members'));

    }
    public function createMember()
    {
        $mem =Schema::getColumnListing('users');

        $member = (object)array_fill_keys(array_keys(array_flip($mem)), '');

        return view('main.member.create',compact('member'));
    }
    public function editMember($id)
    {
        $member = User::find($id);
        $members = User::all();
        $memberlist = User::all();
        $income = Income::all();
        $expense = Expense::all();
        $payrolls = Payout::all();

        return view('main.member.edit',compact('member','members','income','expense','payrolls'));
    }
    //       END
    // ===================
    //     APPOINTMENT
    public function showAppointment()
    {
        $appoints = Appointment::all();
        return view('main.appointment.view',compact('appoints'));
    }
    public function editAppointment($id)
    {
        $app = Appointment::find($id);
        return view('main.appointment.edit',compact('app'));
    }
    public function showAppointmentGame()
    {
        $files= ImportData::all();
        return view('main.appointment.uploaddoc',compact('files'));
    }
    public function showUpdaterate()
    {
        return view('main.appointment.updateRate');
    }

    //      END
    // ==================
    //     PAYROLL
    public function showPayroll()
    {
        $payrolls = Payout::all();
        return view('main.payroll.payroll',compact('payrolls'));
    }
    public function showPayrun()
    {
        $payrolls = Payout::all();
        return view('main.payroll.payrun',compact('payrolls'));
    }
    public function showPayslip($id)
    {
        $payslip = Payout::find($id);
    //    dd($payslip->record);
        return view('main.payroll.payslip',compact('payslip'));
    }
    //      END
    // ==================
    //      ADMIN
    public function showAdmin()
    {
        # code...
    }
    public function showRole()
    {
        # code...
    }
    public function showAuditlog()
    {
        # code...
    }
    //       END
    // ==================
    //
}
