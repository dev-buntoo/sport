<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\UpdateRate;
use App\Model\Appointment;
use App\Model\ImportData;
use App\Model\Role;
use Schema;
use Auth;
use Carbon\Carbon;

class ShowController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    // ===================
    //      DASHBOARD
    public function showDashboard()
    {
        $audits = \OwenIt\Auditing\Models\Audit::all();
        // foreach($audits as $audit){
        //     print_r($audit->auditable);
        // //  echo '<pre>';print_r($audit);
        //  echo "<br><br><br>";
        // }
        // return Appointment::find(144)->audits;
        // return 'ok';
        return view('main.dashboard.view',compact('audits'));
    }

    public function editProfile()
    {
      $user = Auth::user();
      return view('main.dashboard.profile',compact('user'));
    }
    //        END
    // ===================
    //      MEMBERS
    public function showMember()
    {
        if(!Auth::user()->roles->view_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $members = User::where('is_member',1)->get();
        return view('main.member.view',compact('members'));

    }
    public function createMember()
    {
        if(!Auth::user()->roles->create_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $mem =Schema::getColumnListing('users');

        $member = (object)array_fill_keys(array_keys(array_flip($mem)), '');

        return view('main.member.create',compact('member'));
    }
    public function editMember($id)
    {
        if(!Auth::user()->roles->edit_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }

        $member = User::find($id);
        $members = User::all();
        $memberlist = User::all();
        $income = Income::all();
        $expense = Expense::all();
        $payrolls = Payout::all();

        return view('main.member.edit',compact('member','members','income','expense','payrolls'));
    }

    public function editIncome($id)
    {
        $memin = Income::find($id);
        $members = User::where('is_member',1)->get();

        return view('main.member.editIncome',compact('memin','members'));
    }


    public function editExpense($id)
    {
        $memexp = Expense::find($id);
        $members = User::where('is_member',1)->get();
        return view('main.member.editExpense',compact('memexp','members'));
    }

    //       END
    // ===================
    //     APPOINTMENT

    public function showAppointment()
    {

        if(!Auth::user()->roles->view_appointments){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $appoints = Appointment::all();
        return view('main.appointment.view',compact('appoints'));
    }
    public function editAppointment($id)
    {

        if(!Auth::user()->roles->edit_appointments){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $app = Appointment::find($id);
        if(!$app->rates){
            $app->rates =  UpdateRate::updateOrCreate([
                'grade' =>$app->grade,
            //    'grade' => $request->grade[$i]
               ]);
        }
        return view('main.appointment.edit',compact('app'));
    }
    public function showAppointmentGame()
    {

        if(!Auth::user()->roles->manage_documents){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $files= ImportData::all();
        return view('main.appointment.uploaddoc',compact('files'));
    }
    public function showUpdaterate()
    {
        $rates = UpdateRate::all();
        return view('main.appointment.updateRate',compact('rates'));
    }

    //      END
    // ==================
    //     PAYROLL
    public function showPayroll()
    {

        if(!Auth::user()->roles->view_payroll){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }

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

        if(!Auth::user()->roles->edit_payroll){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $payslip = Payout::find($id);
    //    dd($payslip->record);
         if($payslip->member_id == Auth::user()->id){
            $payslip->is_view = Carbon::now()->toDateTimeString();
            $payslip->save();
         }
        return view('main.payroll.payslip',compact('payslip'));
    }

    public function genrateSlip($id){
            $payslip = Payout::find($id);
        //    dd($payslip->record);
            $slip = $payslip->record;
            return view('main.slip.index',compact('payslip','slip'));
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

        if(!Auth::user()->roles->view_roles){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $roles = Role::where('id','!=',1)->get();
        return view('main.systemAdmin.roles',compact('roles'));
    }
    public function editRole($id)
    {


        if(!Auth::user()->roles->edit_roles){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
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
