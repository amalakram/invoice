<?php

namespace App\Http\Controllers;

use App\cr;
use App\PettyCash;

use Illuminate\Http\Request;

class PettyCashAchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PettyCash = PettyCash::onlyTrashed()->get();// هون مفهوم ديليت اد
        return view('PettyCash.PettyCashArchive',compact('PettyCash'));
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
    public function update(Request $request ,$id)
    {
        $id = $request->id;
        $flight = PettyCash::withTrashed()->where('id', $id)->restore();// دديليت اد بشيك عليها بالداتا بيز وبعمللها ريستور 
        session()->flash('Edit', 'Restore  PettyCash successfully');
        return redirect('/PettyCash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $PettyCash = PettyCash::withTrashed()->where('id',$request->id)->first();// بعدين اي شي اسمه ارشفه الاي دي بحدده  
         $PettyCash->forceDelete(); // حدف
         session()->flash('delete', 'Delete successfully');
        return redirect('/ArchiveP');
    }
}
