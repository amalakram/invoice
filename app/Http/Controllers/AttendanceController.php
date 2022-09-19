<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        $Attendance = Attendance::all();
        return view('attandance.index' ,compact('Attendance','employee') );
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
        Attendance::create([
            'date' => $request->date,
            'Employee_id' => $request->Employee_id,
            'attendance' => $request->attendance,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);
        session()->flash('Add', ' Added successfully ');
        return redirect('/Attendance');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        
       $Attendance = Attendance::whereId($id)->first(); 
        //$id = Employee::where('Employee_ID', $request->Employee_ID)->first()->id;
       // $Attendance = Attendance::findOrFail($request->id);
       //$employee = Employee::all();
        $Attendance->update([

            'date' => $request->date,
            
            'attendance' => $request->attendance,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,

        ]);
 
        session()->flash('Edit', ' Edit successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
       
        $Attendance = Attendance::where('id', $id)->first();
        //$Attendance = Attendance::findOrFail($request->id);
         $Attendance->delete();
         session()->flash('delete', 'Delete successfully');
         return back();
    }
}
