<?php

namespace App\Http\Controllers;

use App\Exports\AppointmentExport;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exportAppointments(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'export_year' => 'nullable|date_format:Y',
            'export_round' => 'required_if:year,""'
        ]);
        try{
            //  Excel::create(new AppointmentExport, 'appointments.xlsx',)->save();
            return Excel::download(new AppointmentExport($validatedData['export_year'], $validatedData['export_round']), 'appointments.xlsx');
        }
        catch(Exception $e)
        {
            return back()->with('error', 'Something went wrong while exporting');
        }
    }

}
