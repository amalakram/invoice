<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employee = Employee::all();
        
        return view('Employee.employee.employee' ,compact('Employee'));
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

    {//////
        
       
           /* $data['Employee_ID' ]= $request->Employee_ID;
            $data[ 'Employee_Name'] = $request->Employee_Name;
            $data['file_path']= $request->file_path;
            $data['Employee_Mobile'] = $request->Employee_Mobile;
            $data['Employee_Position'] =$request->Employee_Position;
            $data['Member_Since'] = $request->Member_Since;
            $data['Salary'] =$request->Salary;
*/

        $data=$request->all();
       $filename =$request->file('file_path')->getClientOriginalName();
       $path= $request->file('file_path')->storeAs('images' ,$filename ,'public');
       $data['file_path']= '/storage/'.$path;
        Employee::create($data);
        //////////
    
        $validatedData = $request->validate([
            'Employee_ID' => 'required|unique:employees|max:255',
        ],[

            

        ]);
        session()->flash('Add', ' Added successfully ');
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
        //$id = Employee::where('emp_id', $request->emp_id)->first()->id;

       //$Employee = Employee::findOrFail($request->emp_id);
       $Employee = Employee::whereId($id)->first();

       $Employee->update([
       
       
        
        'Employee_Mobile' => $request->Employee_Mobile,
        'Employee_Position' => $request->Employee_Position,
        'Member_Since' => $request->Member_Since,
        'Salary' => $request->Salary,
       
     ]);
       session()->flash('Edit', ' Edit successfully');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $Employee = Employee::where('id', $id)->first();
        //$Employee = Employee::findOrFail($request->emp_id);
         $Employee->delete();
         session()->flash('delete', 'Delete successfully');
         return back();
    }
}
