<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\Appointment;
use App\Model\ImportData;
use App\Model\Role;
use Schema;
use Auth;

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
        $members = User::where('is_member',1)->get();
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
       $users = User::where('is_member','!=',1)->get();
       return view('main.systemAdmin.user',compact('users'));
    }
    public function createUser()
    {
        $role = Role::where('id','!=',1)->get();
        return view('main.systemAdmin.createUser',compact('role'));
    }
    public function editUser($id)
    {
      $user = User::find($id);
      $role = Role::where('id','!=',1)->get();
      return view('main.systemAdmin.editUser',compact('user','role'));
    }

    public function showRole()
    {
        $roles = Role::where('id','!=',1)->get();
        return view('main.systemAdmin.roles',compact('roles'));
    }
    public function editRole($id)
    {
        $role = Role::find($id);
        return view('main.systemAdmin.editRoles',compact('role'));
    }
    public function showAuditlog()
    {
        return view('main.systemAdmin.auditlog');

    }
    //       END
    // ==================
    //
}
