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

use App\Member;
use App\Model\UpdateRate;
use App\Report;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\callback;

function printFormatted(callable $format, $str)
{
    echo $format($str);
    echo "<br>";
}

function exclaim($str)
{
    return $str . "!";
}


function getData(callable $Model, $id)
{
    $Model($id);
}
Route::get('slip/{format}/{id}', function ($format, $id) {
    if ($format == 2)
        return view('main.slip.ju', ['report' => Report::find($id)]);
    else
        return view('main.slip.se', ['report' => Report::find($id)]);
    Mail::send(['html' => 'main.slip.ju'], ['report' => Report::find(50)], function ($message) {
        $message->to('alirazakhan410@gmail.com', '')->subject('PaySlip');
    });

    $pdf = \PDF::loadView('main.slip.test');

    \Storage::put('public/pdf/' . 'jonour.pdf', $pdf->output());
    // return    UpdateRate::find(44)->appointment()->sum('coach_rate');

    // $ad = \OwenIt\Auditing\Models\Audit::find(20)->first();
    // printFormatted($ad->auditable_type . "::findOrfail", $ad->auditable_id);
    // dd($ad);
    //    $a = \App\Model\log::all();
    //  dd($a);
    // $pdf = PDF::loadView('pdf.invoice', $data);
    // return $pdf->download('invoice.pdf');
    // \App\Email::sendrecord();
    //   return view('main.slip.payslip');
});
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:cache');
    // return what you want
});

Route::get('generate-docs', function () {

    $headers = array(

        "Content-type" => "text/html",

        "Content-Disposition" => "attachment;Filename=myfile.doc"

    );



    $content = '<html>

            <head><meta charset="utf-8"></head>

            <body>

                <p>My Content</p>

                <ul><li>Cat</li><li>Cat</li></ul>

            </body>

            </html>';



    return \Response::make($content, 200, $headers);
});

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

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'ShowController@showDashboard')->name('dashboard.show');
Route::get('profile', 'ShowController@editProfile')->name('profile.show');
Route::post('profile/save', 'SaveController@saveProfile')->name('profile.save');
Route::get('member', 'ShowController@showMember')
    ->name('member.show');
Route::get('member/create', 'ShowController@createMember')
    ->name('member.create');
Route::get('member/edit/{id}', 'ShowController@editMember')
    ->name('member.edit');
Route::get('member/delete/{id}', 'SaveController@deleteMember')->name('member.delete');
Route::get('appointment', 'ShowController@showAppointment')->name('appointment.show');
Route::get('appointment/edit/{id}', 'ShowController@editAppointment')->name('appointment.edit');
Route::get('appointment/Games', 'ShowController@showAppointmentGame')->name('appointment.game');
Route::get('appointment/update-rate', 'ShowController@showUpdaterate')->name('appointment.update-rate');
Route::post('appointment/saveRate', 'SaveController@updateRate')->name('appointment.saveRate');
Route::get('appointment/removeline/{id}', 'SaveController@deleteupdateRate')->name('appointment.removeline');
Route::get('payroll', 'ShowController@showPayroll')->name('payroll.show');
Route::get('payroll/expense', 'ShowController@showExpense')->name('expense.show');
Route::get('payroll/income', 'ShowController@showIncome')->name('income.show');
Route::get('payrun', 'ShowController@showPayrun')->name('payrun.show');

Route::post('process-payrun', 'SaveController@stepPayrun')->name('payrun.process');
Route::get('payrun-completed/{id}', 'ShowController@processPayrunComplete')->name('payrun.complete');

Route::get('payslip/{id}', 'ShowController@showPayslip')->name('payslip.show');
Route::post('payslip/update', 'SaveController@updatePayslip')->name('payroll.update');

Route::get('generate/slip/{id}', 'ShowController@genrateSlip')->name('generate.slip');
Route::get('generate/payrun/{id}', 'ShowController@payrungenrateSlip')->name('generate.payrun.slip');

Route::get('system/admin', 'ShowController@showAdmin')->name('system.admin');
Route::get('system/admin/edit/{id}', 'ShowController@editUser')->name('user.edit');
Route::get('system/admin/create', 'ShowController@createUser')->name('user.create');
Route::get('system/role', 'ShowController@showRole')->name('system.role');
Route::get('system/role/edit/{id}', 'ShowController@editRole')->name('system.role.edit');
Route::get('system/auditlog', 'ShowController@showAuditlog')->name('system.auditlog');
Route::get('system/admin/delete/{id}', 'SaveController@deleteUser')->name('user.delete');

Route::post('member/save', 'SaveController@saveMember')->name('member.save');
Route::post('member/update', 'SaveController@updateMember')->name('member.update');


Route::post('member/income/save', 'SaveController@saveIncome')->name('member.income.save');
Route::get('member/income/delete/{id}', 'SaveController@deleteIncome')->name('member.income.delete');
Route::post('member/expense/save', 'SaveController@saveExpense')->name('member.expense.save');
Route::post('payroll/expense/save', 'SaveController@bulkExpense')->name('payroll.expense.save');
Route::post('payroll/income/save', 'SaveController@bulkIncome')->name('payroll.income.save');
Route::get('member/expense/delete/{id}', 'SaveController@deleteExpense')->name('member.expense.delete');
Route::post('member/import', 'SaveController@ImportMemberData')->name('member.import');
Route::get('member/expense/edit/{id}', 'ShowController@editExpense')->name('member.expense.edit');
Route::get('member/income/edit/{id}', 'ShowController@editIncome')->name('member.income.edit');

Route::get('payroll/expense/edit/{id}', 'ShowController@editExpensePayroll')->name('payroll.expense.edit');
Route::get('payroll/income/edit/{id}', 'ShowController@editIncomePayroll')->name('payroll.income.edit');

Route::post('member/income/update', 'SaveController@updateIncome')->name('member.income.update');
Route::post('member/expense/update', 'SaveController@updateExpense')->name('member.expense.update');

Route::post('payroll/income/update', 'SaveController@updateIncomePayroll')->name('payroll.income.update');
Route::post('payroll/expense/update', 'SaveController@updateExpensePayroll')->name('payroll.expense.update');


Route::post('payroll/generate', 'SaveController@createPayslip')->name('payroll.generate');
Route::get('payroll/sendEmail/{id}', 'ShowController@sendPayroll')->name('payroll.sendEmail');
Route::post('appointment/update', 'SaveController@updateAppointment')->name('appointment.update');
Route::post('appointment/excel-import', 'SaveController@appoint')->name('appointment.import');
Route::get('appointment/confirm/{id}', 'SaveController@appointConfirmation')->name('appointment.confirm');
Route::get('appointment/deletefile/{id}', 'SaveController@deleteFile')->name('appointment.game.delete');
Route::get('appointment/deleteappointment/{id}', 'SaveController@deleteAppList')->name('appointment.list.delete');
Route::post('appointment/excel-export', 'ExportExcelController@exportAppointments')->name('appointment.export');

Route::post('system/role/create', 'SaveController@createRole')->name('role.create');
Route::post('system/role/update', 'SaveController@updateRole')->name('role.update');

Route::post('system/admin/save', 'SaveController@createUser')->name('user.save');
Route::post('system/admin/update', 'SaveController@editUser')->name('user.update');

// Reports Routes
Route::get('reports', 'ShowController@showReports')->name('reports.show');
Route::post('reports', 'SaveController@saveReport')->name('reports.store');
Route::get('reports/create', 'ShowController@createReports')->name('reports.create');

Route::get('status-online', 'HomeController@onlineStatus')->name('online.status');


Route::get('reports/team', 'ShowController@showTeam')->name('report.team.show');
Route::post('reports/team/save', 'SaveController@saveTeam')->name('report.team.save');
Route::get('reports/team/edit', 'SaveController@editTeam')->name('report.team.update');
Route::get('reports/team/delete/{id}', 'SaveController@deleteTeam')->name('report.team.delete');


Route::get('reports/divisionajax', 'ShowController@showDivision')->name('report.division.ajax');
Route::get('reports/teamajax', 'ShowController@showTeam')->name('report.team.ajax');


Route::get('reports/division', 'ShowController@showDivision')->name('report.division.show');
Route::post('reports/division/save', 'SaveController@saveDivision')->name('report.division.save');
Route::get('reports/division/edit', 'SaveController@editDivision')->name('report.division.update');
Route::get('reports/division/delete/{id}', 'SaveController@deleteDivision')->name('report.division.delete');