<?php

namespace App\Http\Controllers;
use App\Quotation;
use App\quotition_details;
use Illuminate\Http\Request;
use App\quotition_attachment;
use Illuminate\Support\Facades\Storage;
use File;
class QuotitionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\quotition_details  $quotition_details
     * @return \Illuminate\Http\Response
     */
    public function show(quotition_details $quotition_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quotition_details  $quotition_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotation = quotation::where('id',$id)->first();
       // $details  = quotition_details::where('quote_id',$id)->get();
        $attachments  = quotition_attachment::where('quote_id',$id)->get();
        return view('Quotation.details_quotation',compact('quotation','attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quotition_details  $quotition_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quotition_details $quotition_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quotition_details  $quotition_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $quotition = quotition_attachment::findOrFail($request->id_file);
        $quotition->delete();
        Storage::disk('public_uploadsQuote')->delete($request->quotition_number.'/'.$request->file_name);
        session()->flash('delete', 'Attachment has been deleted successfully');
        return back();
        
    }
    public function get_file($quote_number,$file_name)// تحميل المرفق

    {
        $contents= Storage::disk('public_uploadsQuote')->getDriver()->getAdapter()->applyPathPrefix($quote_number.'/'.$file_name);
        return response()->download( $contents);
    }



    public function open_file($quote_number,$file_name)//فتح الملف 

    {
        $files = Storage::disk('public_uploadsQuote')->getDriver()->getAdapter()->applyPathPrefix($quote_number.'/'.$file_name);
        return response()->file($files);
    }
}
