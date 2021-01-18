<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
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
        $memberlist = User::all();
        $income = Income::all();
        $expense = Expense::all();
        return view('main.member.edit',compact('member','income','expense'));
    }
    //       END 
    // ===================
    //     APPOINTMENT
    public function showAppointment()
    {
        # code...
    }
    public function editAppointment()
    {
        # code...
    }
    public function showUpdaterate(Type $var = null)
    {
        # code...
    }
    //      END
    // ==================
    //     PAYROLL
    public function showPayroll()
    {
        return view('main.payroll.payroll');
    }
    public function showPayrun()
    {
        return view('main.payroll.payrun');
    }
    public function showPayslip()
    {
        return view('main.payroll.payslip');
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
