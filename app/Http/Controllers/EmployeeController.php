<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 
use PDF;

class EmployeeController extends Controller
{
    public function showEmployees(){
      $employee = Employee::all();
      return view('index', compact('employee'));
    }

    public function createPDF() {
      // retreive all records from db
      $data = Employee::all();
      // share data to view
      view()->share('employee',$data);
      $pdf = PDF::loadView('index', compact('data'));
      // download PDF file with download method
      ini_set("max_execution_time","-1");
      return $pdf->download('pdf_file.pdf');
    }
}
