<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Overtime;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        $Overtime = Overtime::all();
        return view('Employee.employee_overtime.employee_overtime',compact('Overtime','employee') );
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
        Overtime::create([
            'date' => $request->date,
            'Employee_id' => $request->Employee_id,
            'No_of_hours' => $request->No_of_hours,
            'Rate' => $request->Rate,
        
        ]);
        session()->flash('Add', ' Added successfully ');
        return redirect('/Overtime');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function show(Overtime $overtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Overtime $overtime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
        $Overtime = Overtime::whereId($id)->first();
       

        $Overtime->update([
        
        
           
            'date' => $request->date,
            
            'No_of_hours' => $request->No_of_hours,
            'Rate' => $request->Rate,
        
      ]);
        session()->flash('Edit', ' Edit successfully');
        return redirect('/Overtime');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overtime $overtime , $id)
    {
        $Overtime = Overtime::where('id', $id)->first();
        //$Attendance = Attendance::findOrFail($request->id);
         $Overtime->delete();
         session()->flash('delete', 'Delete successfully');
         return back();
    }
}
