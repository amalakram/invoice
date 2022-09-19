@extends('layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('title')
Invoice printing preview
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Invoice printing preview</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">Invoice </h1>
                            <div class="billed-from">
                    
                            <img src="{{URL::asset('assets/img/brand/logo.png')}}" alt="" width="300" height="80" >
                  <br> <br>
                                <h6>Business Rules Consultants.</h6>
                                <p>BR Properties & Maintenance Division<br>
                                Tel: 022222100<br>
                                    Email:info@br-group.co</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">Billed To</label>
                                <div class="billed-to">
                                    <h6>Customer:{{ $invoices->client }}</h6>
                                    <p>{{ $invoices->company_name }}
                                        Tel No:  {{ $invoices->customer_mobile }}<br> {{ $invoices->client_address }}<br>
                                        Email:  {{ $invoices->customer_email }}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">Invoice Information</label>
                                <p class="invoice-info-row"><span>Invoice Number </span>
                                    <span>{{ $invoices->invoice_number }}</span></p>
                                <p class="invoice-info-row"><span>Invoice Date</span>
                                    <span>{{ $invoices->invoice_Date }}</span></p>
                                <p class="invoice-info-row"><span>Due date</span>
                                    <span>{{ $invoices->Due_date }}</span></p>
                               
                            </div>
                            
                        </div>
                        <br><br>
                        <h3>Invoices Details</h3>
<br>
<br>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                            <tr>
                                <th></th>
                                <th>Product_name</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Unit_price</th>
                                <th>Product Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices->details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $item->Product_name }}</th>
                                <td>{{ $item->unitText() }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <th colspan="1">Sub Total</th>
                                <td>{{ $invoices->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <th colspan="1">Net Ammount</th>
                                <td>{{ $invoices->net_ammount }}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <th colspan="1">Discount</th>
                                <td>{{ $invoices->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <th colspan="1">Vat 15%</th>
                                <td>{{ $invoices->vat_value }}</td>
                            </tr>
                           
                            <tr>
                                <td colspan="4"></td>
                                <th colspan="1">Dotal Due</th>
                                <td>{{ $invoices->total_due }}</td>
                            </tr>

                            </tfoot>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>Print</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;// فقط رح يطلع الجزئيه اللي الاي دي الها برنت
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
