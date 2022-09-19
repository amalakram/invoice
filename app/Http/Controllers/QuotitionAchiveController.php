<?php

namespace App\Http\Controllers;

use App\cr;
use App\Quotation;

use Illuminate\Http\Request;

class QuotitionAchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotation = Quotation::onlyTrashed()->get();// هون مفهوم ديليت اد
        return view('Quotation.quotationArchive',compact('quotation'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->quotation_id;
         $flight = Quotation::withTrashed()->where('id', $id)->restore();// دديليت اد بشيك عليها بالداتا بيز وبعمللها ريستور 
         session()->flash('restore_Quotition');// اعداه
         return redirect('/Quotation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $quotation = Quotation::withTrashed()->where('id',$request->quotation_id)->first();// بعدين اي شي اسمه ارشفه الاي دي بحدده  
        $quotation->forceDelete(); // حدف
        session()->flash('delete_quotation');
        return redirect('/ArchiveQ');
    }
}
