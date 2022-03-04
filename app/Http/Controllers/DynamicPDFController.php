<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
        $customer_data=$this->get_customer_data();
        return view('dynamic_pdf')->with('customer_data',$customer_data);

    }
    function get_customer_data()
    {
        $customer_data=DB::table('tbl_customer')
                    ->limit(10)
                    ->get();
        return $customer_data;
    }
    function pdf()
    {

        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());  
        $pdf->stream(); 
    }
    function convert_customer_data_to_html()
    {
        $customer_data=$this->get_customer_data();
        $output='
            <h3 align="center">customer_data</h3>
            <table width="100%" style="boarder-collapse: collapse; border:0px;">
            <tr>
                <th style="border: 1px solid; padding:12px; width="20%">Name</th>
                </th>
                <th style="border: 1px solid; padding:12px; width="20%">City</th>
                </th>
                <th style="border: 1px solid; padding:12px; width="20%">Postal Code</th>
                </th>
                  <th style="border: 1px solid; padding:12px; width="20%">COuntry</th>
                </th>
            </tr>

        ';
                foreach($customer_data as $customer)
                    {
                        $output .= '
                        <tr>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->name.'</td>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->city.'</td>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->postalcode.'</td>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->country.'</td>
                        </tr>

                        ';
                    } 
                    $output .= '</table>';
                    return $output;
    }
}
