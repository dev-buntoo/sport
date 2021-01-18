<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});


Route::get('/home', function () {
    // return view('welcome');
    return redirect()->route('dashboard.show');
});

Route::get('/logout', function () {
    // return view('welcome');
    Auth::logout();
    return redirect()->route('login');    
    // return redirect()->route('dashboard.show');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','ShowController@showDashboard')->name('dashboard.show');
Route::get('member','ShowController@showMember')
->name('member.show');
Route::get('member/create','ShowController@createMember')
->name('member.create');
Route::get('member/edit/{id}','ShowController@editMember')
->name('member.edit');
Route::get('appointment','ShowController@showAppointment')->name('appointment.show');
Route::get('appointment/edit','ShowController@editAppointment')->name('appointment.edit');
Route::get('appointment/update-rate','ShowController@showUpdaterate')->name('appointment.update-rate');
Route::get('payroll','ShowController@showPayroll')->name('payroll.show');
Route::get('payrun','ShowController@showPayrun')->name('payrun.show');
Route::get('payslip/{id}','ShowController@showPayslip')->name('payslip.show');

Route::get('system/admin','ShowController@showAdmin')->name('system.admin');
Route::get('system/role','ShowController@showRole')->name('system.role');
Route::get('system/auditlog','ShowController@showAuditlog')->name('system.auditlog');

Route::post('member/save','SaveController@saveMember')->name('member.save');
Route::post('member/update','SaveController@updateMember')->name('member.update');


Route::post('member/income/save','SaveController@saveIncome')->name('member.income.save');
Route::post('member/expense/save','SaveController@saveExpense')->name('member.expense.save');