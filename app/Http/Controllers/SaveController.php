<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Income;
use App\Model\Expense;
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
}
