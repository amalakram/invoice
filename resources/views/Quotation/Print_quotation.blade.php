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
Quotation printing preview
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Quotation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Quotation printing preview</span>
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
                            <h1 class="invoice-title">Quotation </h1>
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
                                
                               

                                    <h6>Customer:{{ $quotation->client }}</h6>
                                    <p>{{ $quotation->company_name }}<br>
                                        Tel No:  {{ $quotation->customer_mobile }}<br> {{ $quotation->client_address }}<br>
                                        Email:  {{ $quotation->customer_email }}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">Quotation Information</label>
                                <p class="invoice-info-row"><span>Quotation Number </span>
                                    <span>{{ $quotation->quote_number }}</span></p>
                                <p class="invoice-info-row"><span>Quotation Date</span>
                                    <span>{{ $quotation->quote_Date }}</span></p>
                                <p class="invoice-info-row"><span>Title</span>
                                    <span>{{ $quotation->title}}</span></p>
                                
                            </div>
                            
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <div>
                            <p class="invoice-info-row"><span>Note</span>
                            <p class="invoice-info-row"><span>{{ $quotation->note}}</span>
                                    <span></span></p> 
                            </div>

                        <br><br> <br> <br><br>
                        <h3>Quotation Details</h3>
<br>
<br>
<table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Product_name</th>
                                <th>Category Name</th>
                                
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Unit_price</th>
                                <th>Product Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotation->details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $item->Product_name }}</th>
                                <td>{{ $item->Section->section_name }}</td>
                                <td>{{ $item->unitText() }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <th colspan="1">sub_total</th>
                                <td>{{ $quotation->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <th colspan="1">net_ammount</th>
                                <td>{{ $quotation->net_ammount }}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <th colspan="1">discount</th>
                                <td>{{ $quotation->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <th colspan="1">vat</th>
                                <td>{{ $quotation->vat_value }}</td>
                            </tr>
                           
                            <tr>
                                <td colspan="5"></td>
                                <th colspan="1">total_due</th>
                                <td>{{ $quotation->total_due }}</td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                    
                    <div>
                    
                    <hr class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>Print</button>
                    
                    </div>
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
