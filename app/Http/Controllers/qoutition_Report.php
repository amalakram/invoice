<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;

class qoutition_Report extends Controller
{
    public function index(){

      
      return view('reports.qoutition_report');
        
    }


    public function Search_qoutition(Request $request){


// في حالة البحث بدون التاريخ
      
    
       
       $start_at = date($request->start_at);
       $end_at = date($request->end_at);

      $Quotation = Quotation::whereBetween('quote_Date',[$start_at,$end_at])->get();
      
       return view('reports.qoutition_report')->withDetails($Quotation);

      
    
     
  
    
    }
}