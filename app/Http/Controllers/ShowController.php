<?php

namespace App\Http\Controllers;

use App\Model\Payrun;
use Illuminate\Http\Request;
use App\User;
use App\Email;
use App\Member;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\UpdateRate;
use App\Model\Appointment;
use App\Model\ImportData;
use App\Model\Role;
use App\Report;
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
        $audits = \OwenIt\Auditing\Models\Audit::orderBy('created_at', 'desc')->get();
        // foreach($audits as $audit){
        //     print_r($audit->auditable);
        // //  echo '<pre>';print_r($audit);
        //  echo "<br><br><br>";
        // }
        // return Appointment::find(144)->audits;
        // return 'ok';
        // dd($audits);
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
        $income = $member->income;
        $expense = $member->expense;
        $payrolls = $member->payrols;
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

    public function showAppointment(Request $request)
    {
        if(!Auth::user()->roles->view_appointments){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        if(isset($request->year) || isset($request->round)){
            $appoints = Appointment::where('year',$request->year)->where('round',$request->round)->get();
            return view('main.appointment.view',compact('appoints'));
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
    public function sendPayroll($id = 'all')
    {
        if($id == 'all'){
        foreach(Payout::all() as $payslip ){

            $data = array(
                'payslip' => $payslip,
                'slip' => $payslip->record,
            );

            Email::sendslip($payslip->member->email, $data);

        }
        }
        else{

            $payslip = Payout::find($id);
            $data = array(
                'payslip' => $payslip,
                'slip' => $payslip->record,
            );
            // return $payslip->member->email;
            Email::sendslip($payslip->member->email, $data);

        }

        // $payslip = Payout::find($id);
        // //    dd($payslip->record);
        //     $slip = $payslip->record;
        //     return view('main.slip.index',compact('payslip','slip'));
        return redirect()->back()->with('success','Email send to members e-mail');

    }
    public function showPayroll()
    {

        if(!Auth::user()->roles->view_payroll){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $app = Appointment::all();
        $total = $app->sum('coach_rate') + $app->sum('touch_judge_rate') + $app->sum('referee_rate');

        $payrolls = Payout::all();
        $payruns = Payrun::all();
        return view('main.payroll.payroll',compact('payrolls','total','payruns'));
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
            //  $payslip->is_view = date('d-m-Y', time());
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

    public function processPayrun(){
        return view('main.payroll.payrunStep1');
    }
    public function processPayrunComplete($id){
        $request = Payrun::find($id);
        return view('main.payroll.payrunStep2',compact('request'));
    }

    //      END
    // ==================
    //      ADMIN
    public function showAdmin()
    {
        if(!Auth::user()->roles->view_admin){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
       $users = User::where('is_member','!=',1)->get();
       return view('main.systemAdmin.user',compact('users'));
    }
    public function createUser()
    {
        if(!Auth::user()->roles->view_admin){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $role = Role::where('id','!=',1)->get();
        return view('main.systemAdmin.createUser',compact('role'));
    }
    public function editUser($id)
    {
        if(!Auth::user()->roles->view_admin){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
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
        $audits = \OwenIt\Auditing\Models\Audit::orderBy('created_at', 'desc')->get();
        // foreach($audits as $audit){
        //     print_r($audit->auditable);
        // //  echo '<pre>';print_r($audit);
        //  echo "<br><br><br>";
        // }
        // return Appointment::find(144)->audits;
        // return 'ok';
        // dd($audits);
        return view('main.systemAdmin.auditlog',compact('audits'));
        // return view('main.systemAdmin.auditlog');

    }
    public function showReports()
    {
        $members = Member::where('is_member', '1')->get();
        $reports = Report::get();
        return view('main.systemAdmin.reports',['members'=>$members, 'reports'=>$reports]);
    }
    //       END
    // ==================
    //
}
