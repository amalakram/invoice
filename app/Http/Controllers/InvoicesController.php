<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\invoices;
use App\sections;
use App\User;
use App\products;
use App\invoices_details;
use App\invoices_attachments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\AddInvoice;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\MyEventClass;
class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoices::all();
        return view('invoices.invoices', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = sections::all();
        return view('invoices.add_invoice', compact('sections'));
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
            'invoice_number'=> 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            /*'Product_name'=> 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            'invoice_number'  => 'required|unique:invoices|max:255',
            'Due_date','invoice_Date'=> 'required|date_format:y-m-d',*/


        ]
    );
        
       

        $invoices= invoices::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' =>1,
            //'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'Unpaid',
            'Value_Status' => 2,
            'title' => $request->title,
            'company_name'  => $request->company_name,
            'client' => $request->client,
            'customer_mobile' => $request->customer_mobile,
            'client_address'  => $request->client_address,
            'customer_email' => $request->customer_email,
            'sub_total' => $request->sub_total,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'vat_value' =>$request->vat_value,
            'net_ammount' => $request->net_ammount,
            'total_due' => $request->total_due,
            'note' => $request->note,
        ]);
        $details_list = [];
        for ($i = 0; $i < count($request->Product_name); $i++) {
            //$details_list[$i]['id'] = $request->id[$i];
            $details_list[$i]['Product_name'] = $request->Product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['section_id'] =1;
            $details_list[$i]['qty'] = $request->qty[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }

        $details = $invoices->details()->createMany($details_list);

        


        $invoice_id = invoices::latest()->first()->id;
        invoices_details::create([
            'id_Invoice' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'Status' => 'Unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);

        if ($request->hasFile('pic')) {

            $invoice_id = Invoices::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new invoices_attachments();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }


           //$user = User::first();
           //Notification::send($user, new AddInvoice($invoice_id));

        //$user = User::get();
        //$invoices = invoices::latest()->first();
       // Notification::send($user, new \App\Notifications\Add_invoice_new($invoices));

     


       if ($details) {
        return redirect('/invoices')->with([
            session()->flash('Add', 'Invoice added successfully'),
            'message' => 'created_successfully',
            'alert-type' => 'success'
        ]);
    } else {
        return redirect('/invoices')->with([
            session()->flash('Add', 'Invoice added successfully'),
            'message' =>'Frontend/frontend.created_failed',
            'alert-type' => 'danger'
        ]);
    }

        
        //event(new MyEventClass('hello world'));

        
        //session()->flash('Add', 'Invoice added successfully');
       // return redirect('/invoices');
        
    }

    public function show($id)
    {
        $invoices = invoices::where('id', $id)->first();
        return view('invoices.status_update', compact('invoices'));
    }

   
    public function edit($id)
    {
        //$invoices = invoices::where('id', $id)->first();
        $invoices = invoices::findorFail($id);
        $sections = sections::all();
        return view('invoices.edit_invoice', compact('sections', 'invoices'));
    }

    
    public function update(Request $request)
    {

        $invoices = invoices::findOrFail($request->invoice_id);
        $invoices->update([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            //'section_id' => $request->Section,
            'section_id' => 1,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'title' => $request->title,
            'company_name'  => $request->company_name,
            'client' => $request->client,
            'customer_mobile' => $request->customer_mobile,
            'client_address'  => $request->client_address,
            'customer_email' => $request->customer_email,
            'sub_total' => $request->sub_total,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'vat_value' =>$request->vat_value,
            'net_ammount' => $request->net_ammount,
            'total_due' => $request->total_due,
            'note' => $request->note,
        ]);
        $invoices->details()->delete();
        // session()->flash('edit', 'Edited successfully');
        // return back();
        $details_list = [];
        for ($i = 0; $i < count($request->Product_name); $i++) {
            $details_list[$i]['Product_name'] = $request->Product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['section_id']=1;
            $details_list[$i]['qty'] = $request->qty[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
            
        }
 
 
         $details = $invoices->details()->createMany($details_list);
 
         if ($details) {
             return redirect('/invoices')->with([
                 'message' => 'updated_successfully',
                 'alert-type' => 'success'
             ]);
         } else {
             return redirect('/invoices')->back()->with([
                 'message' =>'updated_failed',
                 'alert-type' => 'danger'
             ]);
         }
         
        session()->flash('edit', 'The invoice has been successfully modified');
        return redirect('/invoices');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        $id = $request->invoice_id;
        $invoices = invoices::where('id', $id)->first();
        $Details = invoices_attachments::where('invoice_id', $id)->first();

         $id_page =$request->id_page;


        if (!$id_page==2)
        {// لما يضغط على خدف  هون معناه

            if (!empty($Details->invoice_number)) {// احدف من الداتا بيز 

            Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);// احدف من الاتشامنت فابل 
                 }

        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/invoices');

        }

        else {

            $invoices->delete();
            session()->flash('archive_invoice');// هون ارشفه ادا ضغط على ارشفه
            return redirect('/Archive');
        }

    }
    public function getproducts($id) //جيب كل البرودكت لعتملدل على سيكشن هي دي 
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }

    ///
    public function Status_Update($id, Request $request)// حالات الدفع 
    {
        $invoices = invoices::findOrFail($id);

        if ($request->Status === 'paid') {///اختيار انها مدفوعه

            $invoices->update([
                'Value_Status' => 1,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);

            invoices_Details::create([//حفظ في المدفوعه
                'id_Invoice' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 1,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        }

        else {
            $invoices->update([
                'Value_Status' => 3,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);
            invoices_Details::create([
                'id_Invoice' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 3,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        }
        session()->flash('Status_Update');
        return redirect('/invoices');

    }


     public function Invoice_Paid()
    {
        $invoices = Invoices::where('Value_Status', 1)->get();// اخد 
        return view('invoices.invoices_paid',compact('invoices'));//امتداد ملف الفيو الموجود فيه 
    }

    public function Invoice_unPaid()
    {
        $invoices = Invoices::where('Value_Status',2)->get();
        return view('invoices.invoices_unpaid',compact('invoices'));
    }

    public function Invoice_Partial()
    {
        $invoices = Invoices::where('Value_Status',3)->get();
        return view('invoices.invoices_Partial',compact('invoices'));
    }

    public function Print_invoice($id)
    {
        $invoices = invoices::where('id', $id)->first();
        return view('invoices.Print_invoice',compact('invoices'));
    }

    public function export()
    {

        return Excel::download(new InvoicesExport, 'invoices.xlsx');

    }


    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }


    public function unreadNotifications_count()

    {
        return auth()->user()->unreadNotifications->count();
    }

    public function unreadNotifications()

    {
        foreach (auth()->user()->unreadNotifications as $notification){

return $notification->data['title'];

        }

    }

}
