<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicPDFController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceConroller;
//use App\Http\Controllers\PDFController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/

    Route::get('/', [EmployeeController::class, 'showEmployees']);
    Route::get('/employee/pdf', [EmployeeController::class, 'createPDF'])->name('employee/pdf');

     Route::get('invoice', [InvoiceConroller::class, 'showInvoice']);
     Route::get('/invoice/pdf', [InvoiceConroller::class, 'PDF'])->name('invoice.invoice');


    Route::get('dynamic_pdf', [DynamicPDFController::class, 'index']);
    Route::get('/dynamic_pdf/pdf', [DynamicPDFController::class, 'pdf']);
