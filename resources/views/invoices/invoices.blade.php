@extends('layouts.master')
@section('title')
    Invoice list
     
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoices list</span>
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
@endsection
@section('content')


    @if (session()->has('delete_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Invoice deleted successfully",
                    type: "success"
                })
            }

        </script>
    @endif


    @if (session()->has('Status_Update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Payment status updated successfully. ",
                    type: "success"
                })
            }

        </script>
    @endif

    @if (session()->has('restore_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Invoice restored successfully",
                    type: "success"
                })
            }

        </script>
    @endif


				<!-- row -->
				<div class="row">

			
					
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
							<a href="invoices/create" class="btn btn-primary ml-auto"><i class="fa fa-plus" style="color:white"><i
                                ></i>&nbsp;Add invoices</a>

                                <a href="Quotation/create" class="btn btn-primary ml-auto" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp;Add Quotation</a>

                                <a class="btn btn-primary ml-auto" href="{{ url('export_invoices') }}"
                                   style="color:white"><i class="fas fa-file-download"></i>&nbsp;Excel </a>
                    
							</div>
							<div class="card-body">
								<div class="table-responsive ">
								
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											<th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0 " >Invoice number</th>
                                    <th class="border-bottom-0">Invoice Date</th>
                                    <th class="border-bottom-0">Due Date</th>
                                   <!-- <th class="border-bottom-0">Product</th>-->
                                   <!-- <th class="border-bottom-0">Category</th>-->
                                    <!--<th class="border-bottom-0">Discount</th>-->
                                    <!--<th class="border-bottom-0">Rate VAT</th>-->
                                    <!--<th class="border-bottom-0">Value VAT</th>-->
                                    <th class="border-bottom-0">Total</th>
                                    <th class="border-bottom-0">Value_Status</th>
                                    <!--<th class="border-bottom-0">Note</th>-->
                                    <th class="border-bottom-0">Action</th>


												
											</tr>
										</thead>
										<tbody>
										@php
                                $i = 0;
                                @endphp
                                @foreach ($invoices as $invoice)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a
                                                href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->invoice_number }}</a>
                                        </td>
                                        <!--<td>{{ $invoice->invoice_number }} </td>-->
                                        <td>{{ $invoice->invoice_Date }}</td>
                                        <td>{{ $invoice->Due_date }}</td>
                                       <!-- <td>{{ $invoice->product }}</td>-->
                                        <!--<td><a href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->section->section_name }}</a> </td>-->
                                       <!-- <td>{{ $invoice->Discount }}</td>-->
                                       <!-- <td>{{ $invoice->Rate_VAT }}</td>-->
                                        <!--<td>{{ $invoice->Value_VAT }}</td>-->
                                        <td>{{ $invoice->total_due }}</td>
                                        <td>
                                            @if ($invoice->Value_Status == 1)
                                                <span class="text-success">{{ $invoice->Status }}</span>
                                            @elseif($invoice->Value_Status == 2)
                                                <span class="text-danger">{{ $invoice->Status }}</span>
                                            @else
                                                <span class="text-warning">{{ $invoice->Status }}</span>
                                            @endif

                                        </td>

                                       <!-- <td>{{ $invoice->note }}</td>-->
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    
                                                        <a class="dropdown-item"
                                                            href=" {{ url('edit_invoice') }}/{{ $invoice->id }}"> <i
                                                            class="las la-pen"></i>&nbsp;&nbsp;Edit Invoice
                                                            </a>
                                                   

                                                   
                                                        <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                            data-toggle="modal" data-target="#delete_invoice"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;Delete Invoice
                                                            </a>
                                                   

                                                   
                                                        <a class="dropdown-item"
                                                            href="{{ URL::route('Status_show', [$invoice->id]) }}">
                                                            <i class=" text-success fas fa-money-bill"></i>&nbsp;&nbsp; Status Invoice </a>
                                                    

                                                   
                                                        <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                            data-toggle="modal" data-target="#Transfer_invoice"><i
                                                                class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;Transfer Archive 
                                                            </a>
                                                    

                                                   
                                                        <a class="dropdown-item" href="Print_invoice/{{ $invoice->id }}"><i
                                                                class="text-success fas fa-print"></i>&nbsp;&nbsp;PrintInvoice
                                                            
                                                        </a>
                                                    
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

										
										
                                </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
					</div>
					<!--div-->
					</div>
		<!-- main-content closed -->


				
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
		<!-- حذف الفاتورة -->
		<div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Invoice </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            <form action="{{ route('invoices.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                 are sure of the deleting   process?
                 <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Sure</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Invoice </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            <form action="{{ route('invoices.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                 are sure of the deleting   process?
                 <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Sure</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- ارشيف الفاتورة -->
    <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive the invoice</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('invoices.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                
                <div class="modal-body">
                     are you sure of the archiving process?
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                    <input type="hidden" name="id_page" id="id_page" value="2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Sure</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script>
        $('#delete_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
        
    </script>

    <script>
        $('#Transfer_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection


