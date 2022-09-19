<?php

namespace App\Http\Controllers;

use App\PettyCash;
use Illuminate\Http\Request;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $PettyCash = PettyCash::all();

        return view('PettyCash.PettyCash',compact('PettyCash') );
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

        $validated = $request->validate([
            'description' ,'date' ,'Amount'=> 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            /*'Product_name'=> 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            'invoice_number'  => 'required|unique:invoices|max:255',
            'Due_date','invoice_Date'=> 'required|date_format:y-m-d',*/


        ]
    );
        PettyCash::create([
            'date' => $request->date,
            'description' => $request->description,
            'Amount' => $request->Amount,
           
            
        ]);
        session()->flash('Add', ' Added successfully ');
        return redirect('/PettyCash');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function show(PettyCash $pettyCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function edit(PettyCash $pettyCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //$PettyCash = PettyCash::findOrFail($request->ptych_id);
        $PettyCash = PettyCash::whereId($id)->first();

        $PettyCash->update([
        
        
           
                'date' => $request->date,
                'description' => $request->description,
                'Amount' => $request->Amount,
        
      ]);
        session()->flash('Edit', ' Edit successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        /*$PettyCash = PettyCash::where('id', $id)->first();
       
         $PettyCash->delete();
         session()->flash('delete', 'Delete successfully');
         return back();
*/


         ////////////////////////
         
        //$id = $request->invoice_id;
        $PettyCash = PettyCash::where('id', $id)->first();
      

         $id_page =$request->id_page;


        if (!$id_page==2)
        {// لما يضغط على خدف  هون معناه

            
        $PettyCash->forceDelete();
        session()->flash('delete', 'Delete successfully');
        return redirect('/PettyCash');

        }

        else {

            $PettyCash->delete();
            session()->flash('archive_invoice', 'archive_PettyCash successfully');
            session()->flash('archive_PettyCash');// هون ارشفه ادا ضغط على ارشفه
            return redirect('/ArchiveP');
        }
    }
}
