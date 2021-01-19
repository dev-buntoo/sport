<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Payout;
use App\Model\Payslip;
use Illuminate\Support\Facades\Hash;

class SaveController extends Controller
{
    // =================
    //      MEMBER
    public function saveMember(Request $request)
    {
         $this->validate($request,[
             'email'=>'unique:users',
         ]);
         $request->merge(['password' => Hash::make($request->password)]);
         User::create($request->all());
         return redirect()->route('member.show');

    }
    public function updateMember(Request $request)
    {


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

    }
    public function saveIncome(Request $request){
        Income::create($request->all());
        return redirect()->back()->with('tab','trans');
    }
    public function saveExpense(Request $request){
        Expense::create($request->all());
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


}
