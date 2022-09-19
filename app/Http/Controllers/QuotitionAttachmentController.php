<?php

namespace App\Http\Controllers;

use App\quotition_attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Events\MyEventClass;

class QuotitionAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'Attachment format must be   pdf, jpeg , png , jpg',
            ]);
            
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
    
            $attachments =  new quotition_attachment();
            $attachments->file_name = $file_name;
            $attachments->quotition_number = $request->quotition_number;
            $attachments->quote_id = $request->quote_id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->save();
               
            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('AttachmentsQuotition/'. $request->quotition_number), $imageName);
            
            session()->flash('Add', '  Successfully added ');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quotition_attachment  $quotition_attachment
     * @return \Illuminate\Http\Response
     */
    public function show(quotition_attachment $quotition_attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quotition_attachment  $quotition_attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(quotition_attachment $quotition_attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quotition_attachment  $quotition_attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quotition_attachment $quotition_attachment)
    {
        $id = $request->quote_id;
        $flight = quotation::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_quotation');
        return redirect('/Quotation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quotition_attachment  $quotition_attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(quotition_attachment $quotition_attachment)
    {
        $quotation = quotation::withTrashed()->where('id',$request->quote_id)->first();
         $quotation->forceDelete();
         session()->flash('delete_quotation');
         return redirect('/Quotation');
    }
}
