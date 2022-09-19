<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendance;
class employee_Report extends Controller
{
    public function index(){

      $employee = Employee::all();
      return view('reports.employee_Report',compact('employee'));
        
    }


    public function Search_employee(Request $request){


// في حالة البحث بدون التاريخ
      
     if ($request->Employee_id && $request->attendance && $request->start_at =='' && $request->end_at=='') {

       
      $Attendance = Attendance::select('*')->where('Employee_id','=',$request->Employee_id)->where('attendance','=',$request->attendance)->get();
      $employee = Employee::all();
       return view('reports.employee_Report',compact('employee'))->withDetails($Attendance);

    
     }


  // في حالة البحث بتاريخ
     
     else {
       
       $start_at = date($request->start_at);
       $end_at = date($request->end_at);

      $Attendance = Attendance::whereBetween('date',[$start_at,$end_at])->where('Employee_id','=',$request->Employee_id)->where('attendance','=',$request->attendance)->get();
       $employee = Employee::all();
       return view('reports.employee_Report',compact('employee'))->withDetails($Attendance);

      
     }
     
  
    
    }
}