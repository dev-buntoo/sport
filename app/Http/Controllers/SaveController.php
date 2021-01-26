<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\Payslip;
use App\Model\Role;
use App\Model\Appointment;
use App\Model\ImportData;
use App\Imports\ImportAppoint;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Support\Facades\Hash;

class SaveController extends Controller
{
    // =================
    //      MEMBER
    public function saveMember(Request $request)
    {
        if(!Auth::user()->roles->create_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
         $this->validate($request,[
             'email'=>'unique:users',
         ]);
         $request->merge(['password' => Hash::make($request->password)]);
         User::create($request->all());
         return redirect()->route('member.show');

    }
    public function updateMember(Request $request)
    {

        if(!Auth::user()->roles->edit_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $user = User::find($request->id);

        if($request->email != $user->email){
            $this->validate($request,[
             'email'=>'unique:users',
            ]);
        }

       $request->merge(['password' => Hash::make($request->password)]);

        $user->update($request->all());
        return redirect()->route('member.show');
    }
    public function deleteMember($id)
    {
        if(!Auth::user()->roles->delete_member){
            return redirect()->route('dashboard.show')->with('error','You don\'t have permission to access this page.');
         }
        $member = User::find($id);
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
        return redirect()->back()->with('tab','trans');
    }
    public function updateExpense(Request $request)
    {
        $expense = Expense::find($request->id);
        $expense->update($request->all());
        return redirect()->back()->with('tab','trans');
        
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

    public function createPayslip(Request $request)
    {
        foreach(User::all() as $user){
            $payout = new Payout();
            $payout->deduction = $user->expense->sum('amount');
            $payout->gross_amount = $user->income->sum('amount');
            $payout->net_amount = $payout->gross_amount - $payout->deduction;
            $payout->date = $request->date;
            $payout->member_id = $user->id;
            $payout->save();

            foreach($user->income as $inc){
                $payslip = new Payslip();
                $payslip->payout_id = $payout->id;
                $payslip->credit = $inc->amount;
                $payslip->name = $inc->description;
                $payslip->save();
            }
            foreach($user->expense as $exp){
                $payslip = new Payslip();
                $payslip->payout_id = $payout->id;
                $payslip->debit = $exp->amount;
                $payslip->name = $exp->description;
                $payslip->save();
            }

        }
        return redirect()->back();
    }
//          END
//   ================
//      APPOINTMENT
    public function appoint(Request $request)
    {

        $request->validate([
            'import_file' => 'required'
        ]);
        $importdata = ImportData::create([
            'filename'   => $request->file('import_file')->getClientOriginalName(),
            'uploadedBy' => Auth::user()->id,
        ]);
        Excel::import(new ImportAppoint($importdata->id), request()->file('import_file'));
        return back()->with('success', 'Appointment imported successfully.');
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
        return redirect()->route('appointment.show');
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
        ]);
         User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'is_member' => '0',
            'role_id'=>$request['role_id'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('system.admin');

    }
    public function editUser(Request $request)
    {

        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::find($request->id);
        if($user->email != $request->email){
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        $user->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'role_id' => $request['role_id'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('system.admin');
    }
    public function deleteUser($id)
    {
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
        return redirect()->route('system.role');
    }

}
