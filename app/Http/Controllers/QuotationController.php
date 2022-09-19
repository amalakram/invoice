<?php

namespace App\Http\Controllers;

use App\Quotation;
use App\products;
use App\sections;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\AddInvoice;
use App\Exports\QuotationExport1;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\MyEventClass;
use App\quotition_attachment;


class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotation = Quotation::orderBy('id', 'desc')->paginate(10);
        return view('Quotation.quotation', compact('quotation'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $sections = sections::all();
        return view('Quotation.add_quotation', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 


        
        $data['quote_number'] = $request->quote_number;
        $data['quote_Date'] = $request->quote_Date;
        $data['title'] = $request->title;
        $data['company_name'] = $request->company_name;
        $data['client'] = $request->client;
        $data['customer_mobile'] = $request->customer_mobile;
        $data['client_address'] = $request->client_address;
        // $data['section_id'] = $request->Section;
        $data['customer_email'] = $request->customer_email;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['net_ammount'] = $request->net_ammount;
        $data['total_due'] = $request->total_due;
        $data['note'] = $request->note;
        
        $quotation = quotation::create($data);

        $details_list = [];
        for ($i = 0; $i < count($request->Product_name); $i++) {
            //$details_list[$i]['id'] = $request->id[$i];
            $details_list[$i]['Product_name'] = $request->Product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['section_id'] = $request->Section[$i];
            $details_list[$i]['qty'] = $request->qty[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }
        $details = $quotation->details()->createMany($details_list);


        if ($request->hasFile('pic')) {

            $quote_id = quotation::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();//  hsl hgw,ci 
            $quotition_number = $request->quote_number;

            $attachments = new quotition_attachment();
            $attachments->file_name = $file_name;
            $attachments->quotition_number = $quotition_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->quote_id = $quote_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('AttachmentsQuotition/' . $quotition_number), $imageName);
        }
        
        if ($details) {
            
            return redirect('/Quotation')->with([
                session()->flash('Add', 'quotation added successfully'),
                'message' => 'created_successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect('/Quotation')->with([
                session()->flash('Add', 'quotation added successfully'),
                'message' =>'Frontend/frontend.created_failed',
                'alert-type' => 'danger'
            ]);
        }
      

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('Quotation.show_quotation', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$quotations = Quotation::where('id', $id)->first();
        $quotations = Quotation::findorFail($id);
        $sections = sections::all();
        return view('Quotation.edit_quotation', compact('sections', 'quotations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {

        $quotation = Quotation::whereId($id)->first();
       // $quotation = Quotation::findOrFail($request->invoice_id);
       $data['quote_number'] = $request->quote_number;
       $data['quote_Date'] = $request->quote_Date;
       $data['title'] = $request->title;
       $data['company_name'] = $request->company_name;
       $data['client'] = $request->client;
       $data['customer_mobile'] = $request->customer_mobile;
       $data['client_address'] = $request->client_address;
       //$data['section_id'] = $request->Section;
       $data['customer_email'] = $request->customer_email;
       $data['sub_total'] = $request->sub_total;
       $data['discount_type'] = $request->discount_type;
       $data['discount_value'] = $request->discount_value;
       $data['vat_value'] = $request->vat_value;
       $data['net_ammount'] = $request->net_ammount;
       $data['total_due'] = $request->total_due;
       $data['note'] = $request->note;
       
       
       $quotation->update($data);

        $quotation->details()->delete();
       // session()->flash('edit', 'Edited successfully');
       // return back();
       $details_list = [];
       for ($i = 0; $i < count($request->Product_name); $i++) {
           $details_list[$i]['Product_name'] = $request->Product_name[$i];
           $details_list[$i]['unit'] = $request->unit[$i];
           $details_list[$i]['section_id'] = $request->Section[$i];
           $details_list[$i]['qty'] = $request->qty[$i];
           $details_list[$i]['unit_price'] = $request->unit_price[$i];
           $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
           
       }


        $details = $quotation->details()->createMany($details_list);

        if ($details) {
            return redirect("Quotation")->with([
                session()->flash('edit', 'Edited successfully'),
                'message' => 'updated_successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect("Quotation")->with([
                session()->flash('delete', 'updated_failed'),
                'message' =>'updated_failed',
                'alert-type' => 'danger'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $id = $request->quotation_id;
        $quotation = Quotation::where('id', $id)->first();
        //$Details = Quotation_attachments::where('Quotation_id', $id)->first();

         $id_page =$request->id_page;


        if (!$id_page==2) {// لما يضغط على خدف  هون معناه

        if (!empty($Details->quote_number)) {// احدف من الداتا بيز 

            //Storage::disk('public_uploads')->deleteDirectory($Details->quote_number);// احدف من الاتشامنت فابل 
        }

        $quotation->forceDelete();
        session()->flash('delete_quotation');
        return redirect('/Quotation');

        }

        else {

            $quotation->delete();
            session()->flash('restore_Quotition');// هون ارشفه ادا ضغط على ارشفه
            return redirect('/ArchiveQ');
        }
    }
    public function getproducts($id) //جيب كل البرودكت لعتملدل على سيكشن هي دي 
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }

    public function print($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('Quotation.Print_quotation', compact('quotation'));
    }
  
    public function export()
    {

        return Excel::download(new QuotationExport1, 'quotation.xlsx');

    }
}
