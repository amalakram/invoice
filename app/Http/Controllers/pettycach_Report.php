<?php

namespace App\Http\Controllers;
use App\PettyCash;
use Illuminate\Http\Request;
use App\Quotation;

class pettycach_Report extends Controller
{
    public function index(){

      
      return view('reports.pettycach_Report');
        
    }


    public function Search_pettycach(Request $request){


// في حالة البحث بدون التاريخ
      
    
       
       $start_at = date($request->start_at);
       $end_at = date($request->end_at);

      $PettyCash = PettyCash::whereBetween('date',[$start_at,$end_at])->get();
      
       return view('reports.pettycach_Report')->withDetails($PettyCash);

      
    
     
  
    
    }
}