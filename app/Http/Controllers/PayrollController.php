<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Overtime;
use App\Payroll;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $Overtime = Overtime::all();
        $employee = Employee::all();
        $Payroll = Payroll::all();

        return view('Employee.employee_payroll.employee_payroll',compact('Payroll','employee','Overtime') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        Payroll::create([
            'date' => $request->date,
            'Employee_id' => $request->Employee_id,
           'Overtime_id' => $request->Overtime_id,
            'Net_Pay'=>'1',
            'Deductions' => $request->Deductions,
            'Cash_Advance' => $request->Cash_Advance,
           
            
        ]);
        session()->flash('Add', ' Added successfully ');
        return redirect('/Payroll');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $Payroll = Payroll::whereId($id)->first();
       

        $Payroll->update([
        
        
           
            'date' => $request->date,
           
            'Net_Pay'=> $request->Employee_id,
            
            'Deductions' => $request->Deductions,
            'Cash_Advance' => $request->Cash_Advance,
          
      ]);
        session()->flash('Edit', ' Edit successfully');
        return redirect('/Payroll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll , $id) 
    {
        $Payroll = Payroll::where('id', $id)->first();
        //$Attendance = Attendance::findOrFail($request->id);
         $Payroll->delete();
         session()->flash('delete', 'Delete successfully');
         return back();
    }
   
    public function getovertime($id) //جيب كل  الاوفر تايم  بتعتمد  على الموظف  هي دي 
    {
        $Overtime = DB::table("overtimes")->where("Employee_id", $id)->pluck("Rate", "id");
        return json_encode($Overtime);
    }

}
