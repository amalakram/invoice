@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Owl Carousel css-->
<link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Customers</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Customers list</span>
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
@if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('Edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
				<!-- row -->
				<div class="row">

				
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Bordered Table</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
								<button id="button" class="btn btn-primary mg-b-20"  data-effect="effect-scale"  data-toggle="modal" href="#exampleModal">Add </button>

									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											    <th class="border-bottom-0">#</th>
												<th class="border-bottom-0">Customer Name</th>
												<th class="border-bottom-0">Customer Mobile</th>
												<th class="border-bottom-0"> Customer Address</th>
												<th class="border-bottom-0">Customer Email </th>
                                                <th class="border-bottom-0">Company Name</th>
												<th class="border-bottom-0">Description</th>
                                                <th class="border-bottom-0"> Active</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                                @foreach ($Costomer as $Costomer)
                                    <?php $i++; ?>
											<tr>
												<td>{{ $i }}</td>
												<td>{{ $Costomer->client }}</td>
												<td>{{ $Costomer->customer_mobile }}</td>
												<td>{{ $Costomer->client_address }}</td>
                                                <td>{{ $Costomer->customer_email }}</td>
												<td>{{ $Costomer->company_name }}</td>
												<td>{{ $Costomer->description }}</td>
											
												<td>
                                            
                                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_Costomer{{$Costomer->id}}">Update</button>
                                                <button class="btn btn-outline-danger btn-sm " data-toggle="modal"
                                                    data-target="#modaldemo9{{$Costomer->id}}">Delate</button>
                                                </td>
                                                @include('Customer.update')
											</tr>
								@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

				<!-- /row -->
			
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add  Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customer.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                           
							<div class="form-group">
                                <label for="exampleInputEmail1">Customer Name </label>
                                <input type="text" class="form-control" id="client" name="client" required>
                            </div>

							<div class="form-group">
                                <label for="exampleInputEmail1">Customer Mobile</label>
                                <input type="number" class="form-control" id="" name="customer_mobile" required>
                            </div>

							<div class="form-group">
                                <label for="exampleInputEmail1">Customer Email</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                            </div>

							<div class="form-group">
							       <label for="exampleInputEmail1">Customer Address</label>
							        <input class="form-control "  id="client_address" name="client_address" placeholder=""
                                    type="text" value="" required>   
                                
                               
                            </div>
                        

							<div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
								<input type="text" class="form-control" id="company_name" name="company_name">
        
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
							
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
 <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    
@endsection