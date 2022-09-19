<?php

namespace App\Http\Controllers;

use App\Costomer;
use Illuminate\Http\Request;

class CostomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $Costomer = Costomer::all();
        
        return view('Customer.customer',compact('Costomer'));
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
        Costomer::create([
            'client' => $request->client,
            'customer_email' => $request->customer_email,
            'customer_mobile' => $request->customer_mobile,
            'client_address' => $request->client_address,
            'company_name' => $request->company_name,
            'description' => $request->description,
          
           
        ]);
        session()->flash('Add', ' Added successfully ');
        return redirect('/customer');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function show(Costomer $costomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function edit(Costomer $costomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        //$Costomer = Costomer::findOrFail($request->id);
        $Costomer = Costomer::whereId($id)->first();

       $Costomer->update([
       
       
        
        'customer_email' => $request->customer_email,
        'customer_mobile' => $request->customer_mobile,
        'client_address' => $request->client_address,
        'company_name' => $request->company_name,
        'description' => $request->description,
       
     ]);
       session()->flash('Edit', ' Edit successfully');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costomer $Costomer ,$id)
    {
        $Costomer = Costomer::where('id', $id)->first();
        //$Attendance = Attendance::findOrFail($request->id);
         $Costomer->delete();
         session()->flash('delete', 'Delete successfully');
         return back();
    }
}
