<?php

namespace App\Http\Controllers;

use App\Model\log;
use App\Model\Payrun;
use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\Payslip;
use App\Model\Role;
use App\Model\Appointment;
use App\Model\UpdateRate;
use App\Model\ImportData;
use App\Imports\ImportAppoint;
use App\Imports\ImportMember;
use App\Model\division;
use App\Model\team;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Report;

class SaveController extends Controller
{
    public function saveProfile(Request $request)
    {


        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],


        ]);
        $user = Auth::user();
        if($user->email != $request->email){
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        if($request->password != null){
            $this->validate($request, [
                 'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

    $password = Hash::make($request['password']);
}
else{          $password = $user->password;
}
        if($request->hasFile('photo')){
             $this->validate($request, [
                 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('main/img/profile'), $imageName);
        }
        else{
        $imageName = $user->photo;
        }

        $user->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => $password,
            'photo' =>   $imageName
        ]);
        log::create([
            'user_id'=>auth()->user()->id,
            'action'=>'updated',
            'function'=>'profile ',
            'passive_id'=>''

        ]);
        return redirect()->back()->with('success','Profile Updated');


    }

    //      Profile
    // =================


    // =================
    //      MEMBER

    public function ImportMemberData(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        try{Excel::import(new ImportMember(), request()->file('import_file'));}
        catch (\Exception $e) {
            return back()->with('error', 'UnExpected error found');
        }
        return back()->with('success', 'Members imported successfully.');
    }

    public function saveMember(Request $request)
    {
        if(!Auth::user()->roles->create_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
         $this->validate($request,[
             'email'=>'unique:users',
            //  'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         if ($request->hasFile('photo')) {
            //

         $imageName = time().'.'.$request->photo->extension();

         $request->photo->move(public_path('main/img/profile'), $imageName);

         $request->merge(['password' => Hash::make($request->password),'photo' =>   $imageName ]);
        }else{
             $request->merge(['password' => Hash::make($request->password)]);
        }
         Member::create($request->all());
         return redirect()->route('member.show');

    }
    public function updateMember(Request $request)
    {

        if(!Auth::user()->roles->edit_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $user = Member::find($request->id);

        if($request->email != $user->email){
            $this->validate($request,[
             'email'=>'unique:users',
            ]);
        }

        if ($request->hasFile('photo')) {
            //

         $imageName = time().'.'.$request->photo->extension();

         $request->photo->move(public_path('main/img/profile'), $imageName);

            if($request->password != null){
         $request->merge(['password' => Hash::make($request->password),'photo' =>   $imageName ]);
            }else{
             $request->merge(['password' => $user->password]);

            }

        }else{
            if($request->password != null){
             $request->merge(['password' => Hash::make($request->password)]);

            }
            else{
             $request->merge(['password' => $user->password]);

            }
        }

        $user->update($request->all());
        return redirect()->route('member.show');
    }
    public function deleteMember($id)
    {
        if(!Auth::user()->roles->delete_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $member = Member::find($id);
        $member->delete();
        return redirect()->back()->with('success','Member Deleted');
    }
    public function saveIncome(Request $request){
        Income::create($request->all());
        return redirect()->back()->with('tab','trans');
    }
    public function updateIncome(Request $request)
    {
        $income = Income::find($request->id);
        $income->update($request->all());
        return redirect()->route('member.edit',$income->member_id)->with('tab','trans');
    }
    public function updateExpense(Request $request)
    {
        $expense = Expense::find($request->id);
        $expense->update($request->all());
        return redirect()->route('member.edit',$expense->member_id)->with('tab','trans');

    }
        public function updateIncomePayroll(Request $request)
    {
        $income = Income::find($request->id);
        $income->update($request->all());
        return redirect()->route('income.show');
    }
    public function updateExpensePayroll(Request $request)
    {
        $expense = Expense::find($request->id);
        $expense->update($request->all());
        return redirect()->route('expense.show');

    }
    public function deleteIncome($id)
    {
      $income =  Income::find($id);
      $income->delete();
      return redirect()->back()->with('tab','trans');
    }
    public function saveExpense(Request $request){
        Expense::create($request->all());
        return redirect()->back()->with('tab','trans');
    }
    public function deleteExpense($id)
    {
      $expense =  Expense::find($id);
      $expense->delete();
      return redirect()->back()->with('tab','trans');
    }
    //       END
    // ================
    //   TRANSACTION
    public function updatePayslip(Request $request)
    {
        $payslip = Payout::find($request->id);
        $payslip->update($request->all());
        return redirect()->back();
    }
    public function stepPayrun(Request $request)  {
        $req = array();


        foreach(User::where('is_member',1)->where('status','Active')->where('payment_frequency',$request->schedule)->get() as $user){
            $payout = new Payout();
            $payout->deduction = $user->expense->sum('amount');
            $payout->gross_amount = $user->income->sum('amount');
            $payout->net_amount = $payout->gross_amount - $payout->deduction;
            $payout->date = $request->date;
            $payout->member_id = $user->id;
//            $payout->save();
            $income = $expense = 0;

            foreach($user->income as $inc){

                // echo date('Y',strtotime(str_replace('/', '-', $inc->date))).'<br>';
                if(date('Y-m-d',strtotime(str_replace('/', '-', $inc->date))) <=  date('Y-m-d',strtotime(str_replace('/', '-', $request->endDate))) && date('Y-m-d',strtotime(str_replace('/', '-', $inc->date))) >=  date('Y-m-d',strtotime(str_replace('/', '-', $request->startDate)))){
                    $payslip = new Payslip();
                    $payslip->payout_id = $payout->id;
//                    $payslip->payrun_id = $payrun->id;
                    $payslip->credit = $inc->amount;
                    $payslip->name = $inc->description;
                    $income = $income + $inc->amount;
//                    $payslip->save();
                }
            }
            foreach($user->expense as $exp){

                // echo date('Y',strtotime(str_replace('/', '-', $exp->date))).'<br>';
//                return date('Y-m-d',strtotime(str_replace('/', '-', $exp->date)));
                if(date('Y-m-d',strtotime(str_replace('/', '-', $exp->date))) <=  date('Y-m-d',strtotime(str_replace('/', '-', $request->endDate))) && date('Y-m-d',strtotime(str_replace('/', '-', $exp->date))) >=  date('Y-m-d',strtotime(str_replace('/', '-', $request->startDate)))){
//                if(date('Y',strtotime(str_replace('/', '-', $exp->date))) == $request->date ){

                    $payslip = new Payslip();
                    $payslip->payout_id = $payout->id;
//                    $payslip->payrun_id = $payrun->id;
                    $payslip->debit = $exp->amount;
                    $payslip->name = $exp->description;
                    $expense = $expense +  $exp->amount;
//                    $payslip->save();
                }
            }
            $payout->deduction = $expense;
            $payout->gross_amount = $income;
            $payout->net_amount = $payout->gross_amount - $payout->deduction;
            if($payout->net_amount > -1) {
                $req[] = $payout;
            }

        }

        $request->merge(['countmember'=> User::where('is_member',1)->where('status','Active')->where('payment_frequency',$request->schedule)->get()]);
        return view('main.payroll.payrunStep1',compact('req','request'));


    }
    public function createPayslip(Request $request){
        log::create([
            'user_id'=>auth()->user()->id,
            'action'=>'processed',
            'function'=>'Pay Run',
            'passive_id'=>''

        ]);
//        dd($request);
            $payrun =  Payrun::create($request->all());
            $payrun->countmember =  count(User::where('is_member',1)->where('status','Active')->where('payment_frequency',$request->schedule)->get());
            $payrun->paidDate= $request->paidDate;
            $payrun->save();
            //        dd($request);

        foreach(User::where('is_member',1)->where('status','Active')->where('payment_frequency',$request->schedule)->get() as $user){
            $payout = new Payout();
            $payout->deduction = $user->expense->sum('amount');
            $payout->gross_amount = $user->income->sum('amount');
            $payout->net_amount = $payout->gross_amount - $payout->deduction;
            $payout->date = $request->date;
            $payout->member_id = $user->id;
            $payout->payrun_id = $payrun->id;
            $payout->save();
            $income = $expense = 0;
if( $payout->net_amount > -1) {
    foreach ($user->income as $inc) {

        // echo date('Y',strtotime(str_replace('/', '-', $inc->date))).'<br>';
        if (date('Y-m-d', strtotime(str_replace('/', '-', $inc->date))) <= date('Y-m-d', strtotime(str_replace('/', '-', $request->endDate))) && date('Y-m-d', strtotime(str_replace('/', '-', $inc->date))) >= date('Y-m-d', strtotime(str_replace('/', '-', $request->startDate)))) {
            $payslip = new Payslip();
            $payslip->payout_id = $payout->id;
            $payslip->payrun_id = $payrun->id;
            $payslip->credit = $inc->amount;
            $payslip->name = $inc->description;
            $income = $income + $inc->amount;
            $payslip->save();
        }
    }
    foreach ($user->expense as $exp) {

        // echo date('Y',strtotime(str_replace('/', '-', $exp->date))).'<br>';
//                return date('Y-m-d',strtotime(str_replace('/', '-', $exp->date)));
        if (date('Y-m-d', strtotime(str_replace('/', '-', $exp->date))) <= date('Y-m-d', strtotime(str_replace('/', '-', $request->endDate))) && date('Y-m-d', strtotime(str_replace('/', '-', $exp->date))) >= date('Y-m-d', strtotime(str_replace('/', '-', $request->startDate)))) {
//                if(date('Y',strtotime(str_replace('/', '-', $exp->date))) == $request->date ){

            $payslip = new Payslip();
            $payslip->payout_id = $payout->id;
            $payslip->payrun_id = $payrun->id;
            $payslip->debit = $exp->amount;
            $payslip->name = $exp->description;
            $expense = $expense + $exp->amount;
            $payslip->save();
        }
    }
}
            $payout->deduction = $expense;
            $payout->gross_amount = $income;
            $payout->net_amount = $payout->gross_amount - $payout->deduction;
         if($payout->net_amount > -1) {
             $payout->save();
         }

        }
        return redirect()->route('payroll.show');
    }
//          END
//   ================
//      APPOINTMENT
    public function appoint(Request $request)
    {
// dd($request->file('import_file')->move(public_path('main/upload_files/'),'123'));
        $request->validate([
            'import_file' => 'required',
            'year' => 'required',
            'round' => 'required'
        ]);
        $files = time().'.'.$request->file('import_file')->extension();
        $importdata = ImportData::create([
            'filename'   => $request->file('import_file')->getClientOriginalName(),
            'uploadedBy' => Auth::user()->id,
            'linkname'   => $files,
            'year'   => $request->year,
            'round'   => $request->round,
        ]);
        $request->file('import_file')->move(public_path('main/upload_files/'),$files);
        log::create([
            'user_id'=>auth()->user()->id,
            'action'=>'imported',
            'function'=>'Appointment file',
            'passive_id'=>''

        ]);
        if(Auth::user()->role_id == 3) {
            Excel::import(new ImportAppoint($importdata->id, $request->year, $request->round), public_path('main/upload_files/').$files);
            $importdata->is_added =1;
            $importdata->save();
            return back()->with('success', 'Appointment imported successfully.');
        }



        return back()->with('success', 'Appointment will be imported after approval.');
    }
    public function appointConfirmation($id){
        if(Auth::user()->role_id != 3){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
        }
        $request = ImportData::findOrfail($id);
        Excel::import(new ImportAppoint($id, $request->year, $request->round), public_path('main/upload_files/').$request->linkname);
        $request->is_added = 1;
        $request->save();
        return back()->with('success', 'Appointment imported successfully.');

    }
    public function deleteAppList($id){
        $request = Appointment::findOrfail($id);
        $request->delete();
        return redirect()->back()->with('success','Appointment deleted from list');
    }
    public function deleteFile($id)
    {
       $list = ImportData::find($id);
       $list->list()->delete();
       $list->delete();
       return back()->with('success', 'Delete successfully.');

    }
    public function updateAppointment(Request $request)
    {
        $app = Appointment::find($request->id);
        $app->update($request->all());
         $grade = $app->rates;
         $grade->refree_rate = $request->referee_rate;
         $grade->touch_judge_rate = $request->touch_judge_rate;
         $grade->coach_rate = $request->coach_rate;
         $grade->save();
        return redirect()->route('appointment.show');
    }
    public function updateRate(Request $request)
    {
        // dd($request);
       $counter = count($request->grade);
       for($i=0;$i<$counter;$i++){
         $update =  UpdateRate::updateOrCreate([
                'id' =>$request->id[$i],
            //    'grade' => $request->grade[$i]
               ]);
          $update->update([

            'grade' => $request->grade[$i] , 'refree_rate' => $request->refree_rate[$i],'touch_judge_rate' => $request->touch_judge_rate[$i],'coach_rate' => $request->coach_rate[$i],
          ]);
        //   $update->save();
       }
        log::create([
            'user_id'=>auth()->user()->id,
            'action'=>'updated ',
            'function'=>'Appointment Rates',
            'passive_id'=>''

        ]);

       return redirect()->back()->with('success','Rates updated successfully');

    }
    public function deleteupdateRate($id){
        $app = UpdateRate::find($id);
        $app->delete();
        return redirect()->back()->with('success','Line removed successfully');
    }


    //      END
    // =============
    //      ADMIN
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id'  => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('main/img/profile'), $imageName);

         User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'is_member' => '0',
            'role_id'=>$request['role_id'],
            'password' => Hash::make($request['password']),
            'photo' =>   $imageName
        ]);

        return redirect()->route('system.admin');

    }
    public function editUser(Request $request)
    {

        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],


        ]);
        $user = User::find($request->id);
        if($user->email != $request->email){
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        if($request->password != null){
            $this->validate($request, [
                 'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    $password = $user->password;
}
else{
    $password = Hash::make($request['password']);
}
        if($request->hasFile('photo')){
             $this->validate($request, [
                 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('main/img/profile'), $imageName);
        }
        else{
        $imageName = $user->photo;
        }

        $user->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'role_id' => $request['role_id'],
            'password' => $password,
            'photo' =>   $imageName
        ]);
        log::create([
            'user_id'=>auth()->user()->id,
            'action'=>'updated',
            'function'=>'User '.$user->fname,
            'passive_id'=>''

        ]);
        return redirect()->route('system.admin');
    }
    public function deleteUser($id)
    {
        if(!Auth::user()->roles->view_admin){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function createRole(Request $request)
    {
        Role::create($request->all());
        return redirect()->back();
    }
    public function updateRole(Request $request)
    {
        // dd($request);
        $role = Role::find($request->id);
        $keys = array('view_member','create_member','edit_member',
        'delete_member','view_payroll','edit_payroll',
        'view_appointments','edit_appointments','manage_documents',
        'view_roles','edit_roles');
        $lang = array_fill_keys($keys, '0');
        $role->update($lang);
        // dd($request);
        $role->update($request->all());
        log::create([
            'user_id'=>auth()->user()->id,
            'action'=>'updated',
            'function'=>'Role '.$role->name,
            'passive_id'=>''

        ]);
        return redirect()->route('system.role');
    }
    public function saveReport(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'format' => 'required|in:1,2',
            'member' => 'required|exists:users,id',
            'date' => 'required|date|date_format:Y-m-d',
            'home_team' => 'required',
            'away_team' => 'required',
            'home_penalties' => 'required|numeric',
            'away_penalties' => 'required|numeric',
            'home_score' => 'required|numeric',
            'away_score' => 'required|numeric',
            'grade_division' => 'required|in:N,S,A,E',
            'overall_grade' => 'required|in:N,S,A,E',
            // 'signals_note' => 'required',
            'wistla_tone_grade' => 'required|in:N,S,A,E',
            'c_c_signal_grade' => 'required|in:N,S,A,E',
            'presentation_grade' => 'required|in:N,S,A,E',
            'pre_match_duties_grade' => 'required|in:N,S,A,E',
            // 'game_law_note' => 'required',
            'application_grade' => 'required|in:N,S,A,E',
            'scrum_grade' => 'required|in:N,S,A,E',
            'process_grade' => 'required|in:N,S,A,E',
            'advantage_grade' => 'required|in:N,S,A,E',
            // 'understandig_note' => 'required',
            'penalty_grade' => 'required|in:N,S,A,E',
            'ruck_comm_grade' => 'required|in:N,S,A,E',
            'effective_caution_grade' => 'required|in:N,S,A,E',
            'movement_patterns_grade' => 'required|in:N,S,A,E',
            // 'marker_ruck_note' => 'required',
            'ten_m_grade' => 'required|in:N,S,A,E',
            'ten_m_complaince_grade' => 'required|in:N,S,A,E',
            'marker_complaince_grade' => 'required|in:N,S,A,E',
            'ruck_speed_grade' => 'required|in:N,S,A,E',
            // 'communication_note' => 'required',
            'ruck_vocab_grade' => 'required|in:N,S,A,E',
            'tackle_grade' => 'required|in:N,S,A,E',
            'player_rapport_grade' => 'required|in:N,S,A,E',
            'comm_timming_grade' => 'required|in:N,S,A,E',
            // 'positioning_note' => 'required',
            'ten_m_position_grade' => 'required|in:N,S,A,E',
            'in_goal_grade' => 'required|in:N,S,A,E',
            'start_restart_grade' => 'required|in:N,S,A,E',
            'kicks_breaks_grade' => 'required|in:N,S,A,E',
            'coach_comments' => 'required',
            'overall_assesment' => 'required',
            'final_comments' => 'required',
            // 'file' => 'required'
        ]);
        try{
            if($request->hasFile('file')){
                $fileName = time().'.'.$request->file->extension();

                $request->file->move(public_path('report_additional'), $fileName);
            }
            else{
                $fileName = '';
            }

            // return $fileName;
            $report = new Report;
            $report->member_id = $request->member;
            $report->format = $request->format;
            $report->coach =  Auth::user()->fname.' '.Auth::user()->lname;
            $report->date = $request->date;
            $report->home_team = $request->home_team;
            $report->away_team = $request->away_team;
            $report->home_penalties = $request->home_penalties;
            $report->away_penalties = $request->away_penalties;
            $report->home_score = $request->home_score;
            $report->away_score = $request->away_score;
            $report->grade_division = $request->grade_division;
            $report->overall_grade = $request->overall_grade;
            $report->signals_note = $request->signals_note;
            $report->wistla_tone_grade = $request->wistla_tone_grade;
            $report->c_c_signal_grade = $request->c_c_signal_grade;
            $report->presentation_grade = $request->presentation_grade;
            $report->pre_match_duties_grade = $request->pre_match_duties_grade;
            $report->game_law_note = $request->game_law_note;
            $report->application_grade = $request->application_grade;
            $report->scrum_grade = $request->scrum_grade;
            $report->process_grade = $request->process_grade;
            $report->advantage_grade = $request->advantage_grade;
            $report->understandig_note = $request->understandig_note;
            $report->ruck_communication_grade = $request->ruck_comm_grade;
            $report->penalty_grade = $request->penalty_grade;
            $report->effective_caution_grade = $request->effective_caution_grade;
            $report->movement_patterns_grade = $request->movement_patterns_grade;
            $report->marker_ruck_note = $request->marker_ruck_note;
            $report->ten_m_grade = $request->ten_m_grade;
            $report->ten_m_complaince_grade = $request->ten_m_complaince_grade;
            $report->marker_complaince_grade = $request->marker_complaince_grade;
            $report->ruck_speed_grade = $request->ruck_speed_grade;
            $report->communication_note = $request->communication_note;
            $report->ruck_vocab_grade = $request->ruck_vocab_grade;
            $report->tackle_grade = $request->tackle_grade;
            $report->player_rapport_grade = $request->player_rapport_grade;
            $report->communication_timming_grade = $request->comm_timming_grade;
            $report->positioning_note = $request->positioning_note;
            $report->ten_m_position_grade = $request->ten_m_position_grade;
            $report->in_goal_grade = $request->in_goal_grade;
            $report->start_restart_grade = $request->start_restart_grade;
            $report->kicks_breaks_grade = $request->kicks_breaks_grade;
            $report->coach_comments = $request->coach_comments;
            $report->overall_assesment = $request->overall_assesment;
            $report->final_comments = $request->final_comments;
            $report->file_name = $fileName;
            if($report->save()){
                log::create([
                    'user_id'=>auth()->user()->id,
                    'action'=>'created',
                    'function'=>'Report',
                    'passive_id'=>''

                ]);
                $type = ($request->format == 1)?'main.slip.se':'main.slip.ju';
                $pdfname = time().'.pdf';
                $user = $report;
                $pdf = \PDF::loadView($type,compact('report'));
                \Storage::put('public/pdf/'.$pdfname, $pdf->output());
                $report->pdffile = $pdfname;
                $report->save();
                $data = array(
                    'report' => $report,
                    'date' => 'asd'
                );
                \App\Email::sendrecord($data,['systemdev@mcorpx.com.au' , 'ethan@mcorpx.com.au','refereeing@parramattarefs.com.au'], $pdfname,$report->home_team." V ".$report->away_team." / ".$request->division." Match Day Report ".date("d-m-Y", strtotime($report->date)));
                // return $report;
                return redirect()->route('reports.show')->with('success','Report Generated Successfuly');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function onlineStatus()
    {
        $html = view('main.dashboard.status');
        return $html;
    }
    public function saveTeam(Request $request)
    {
        team::create($request->all());
        return redirect()->back()->with('success','New Team added');
    }
    public function editTeam(Request $request)
    {
        $team = team::find($request->id);
        $team->update($request->all());
        return redirect()->back()->with('success','Team updated');
    }
    public function teamajax($id)
    {
        return team::find($id);
    }
    public function deleteTeam($id)
    {
        team::find($id)->delete();
        return redirect()->back()->with('success','Team Deleted');
    }

    public function saveDivision(Request $request)
    {
        division::create($request->all());
        return redirect()->back()->with('success','New Division added');
    }
    public function editDivision(Request $request)
    {
        $team = division::find($request->id);
        $team->update($request->all());
        return redirect()->back()->with('success','Division updated');
    }
    public function divisionajax($id)
    {
        return division::find($id);
    }
    public function deleteDivision($id)
    {
         division::find($id)->delete();
        return redirect()->back()->with('success','Division Deleted');
    }

}