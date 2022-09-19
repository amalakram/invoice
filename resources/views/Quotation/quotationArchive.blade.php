@extends('layouts.master')
@section('title')
quotation
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
							<h4 class="content-title mb-0 my-auto">Quotation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Archive Quotation </span>
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


    @if (session()->has('delete_quotation'))
        <script>
            window.onload = function() {
                notif({
                    msg: " Quotation Deleted Successfully",
                    type: "success"
                })
            }

        </script>
    @endif


    
    @if (session()->has('restore_Quotition'))
        <script>
            window.onload = function() {
                notif({
                    msg: " Quotation Restored Successfully   ",
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
							

							</div>
							<div class="card-body">
								<div class="table-responsive ">
								
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											<th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0 " >Quotation number</th>
                                    <th class="border-bottom-0">Quotation Date</th>
                                    <th class="border-bottom-0">Client </th>
                                    <th class="border-bottom-0">Total</th>
                                    <th class="border-bottom-0">Action</th>


												
											</tr>
										</thead>
										<tbody>
										@php
                                $i = 0;
                                @endphp
                                @foreach ($quotation as $quotation)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a
                                                href="{{ url('QuotitionDetails') }}/{{ $quotation->id }}">{{ $quotation->quote_number }}</a>
                                        </td>
                                       
                                        <td>{{ $quotation->quote_Date }}</td>
                                        <td>{{ $quotation->client }}</td>
                                        <td>{{ $quotation->total_due }}</td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    
                                                        
                                                   

                                                   
                                                        <a class="dropdown-item" href="#" data-quotation_id="{{ $quotation->id }}"
                                                            data-toggle="modal" data-target="#delete_quotation"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;Delete Quotation
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-quotation_id="{{ $quotation->id }}"
                                                            data-toggle="modal" data-target="#Transfer_quotation"><i
                                                                class="text-success fas fa-print"></i>&nbsp;&nbsp;Transfer to Quotation
                                                            
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
		<!-- حذف الكوتيشن  -->
		<div class="modal fade" id="delete_quotation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Quotation </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('ArchiveQ.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                are sure of the deleting process ?
                    <input type="hidden" name="quotation_id" id="quotation_id" value="">
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
    <div class="modal fade" id="Transfer_quotation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel archiving Quotation  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('ArchiveQ.update', 'test') }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                Are you sure about the process of canceling the archive?
                  <input type="hidden" name="quotation_id" id="quotation_id" value="">
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
        $('#delete_quotation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var quotation_id = button.data('quotation_id')
            var modal = $(this)
            modal.find('.modal-body #quotation_id').val(quotation_id);
        })
    </script>

    <script>
        $('#Transfer_quotation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var quotation_id = button.data('quotation_id')
            var modal = $(this)
            modal.find('.modal-body #quotation_id').val(quotation_id);
        })
    </script>
@endsection


