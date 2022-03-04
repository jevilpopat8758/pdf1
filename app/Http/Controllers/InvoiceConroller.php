<?php

namespace App\Http\Controllers;
use App\Models\Employee; 
use PDF;

use Illuminate\Http\Request;

class InvoiceConroller extends Controller
{
   public function showInvoice(){
       $employee = Employee::all();
      return view('invoice.index', compact('employee'));
    }


     public function PDF() {
      // retreive all records from db
      $data = Employee::all();
      // share data to view
      view()->share('employee',$data);
      $pdf = PDF::loadView('invoice.invoice', compact('data'))->setPaper('a4');
      // download PDF file with download method
      ini_set("max_execution_time","-1");
     return$pdf->download('pdf_file.pdf');
      return view('invoice.invoice');
    }
}
