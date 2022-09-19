@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
                @section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>Quotation  # {{ $quotation->quote_number }}</h2>
                    <a href="{{ route('Quotation.index') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i> Back To Quotition</a>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                                <th>Quotation Number</th>
                                <td>{{ $quotation->quote_number }}</td>
                                <th>Quotation Date</th>
                                <td>{{ $quotation->quote_Date }}</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $quotation->client }}</td>
                                <th>Customer Address</th>
                                <td>{{ $quotation->client_address }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $quotation->title}}</td>
                                <th>Company Name</th>
                                <td>{{ $quotation->company_name }}</td>
                            </tr>
                            <tr>
                                <th>Note</th>
                                <td>{{ $quotation->note}}</td>
                                
                            </tr>
                            
                        </table>
<br><br>
                        <h3>Quotation Details</h3>
<br>
<br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                
                                <th>Product_name</th>
                                <th>Category Name</th>
                                <th>unit</th>
                                <th>qty</th>
                                <th>unit_price</th>
                                <th>product_subtotal</th>
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

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('quotation.Print_quotation', $quotation->id) }}" class="btn btn-primary  ml-auto"><i class="fa fa-print"></i>   print</a>
                            <!--<a href="" class="btn btn-secondary ml-auto"><i class="fa fa-file-pdf"></i>   export_pdf</a>
                            <a href="" class="btn btn-success  ml-auto"><i class="fa fa-envelope"></i>  send_to_email</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
@endsection