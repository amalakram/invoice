@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
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
							<h4 class="content-title mb-0 my-auto">Attendance</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Attendance list</span>
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
									
							</div>
                            
							<div class="card-body">
								<div class="table-responsive">
								<button id="button" class="btn btn-primary mg-b-20"  data-effect="effect-scale"  data-toggle="modal" href="#exampleModal">Add </button>

                                
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Date </th>
									<th class="border-bottom-0">Employee ID</th>
                                    <th class="border-bottom-0">Employee Name</th>
                                    <th class="border-bottom-0">Attendance</th>
                                    <th class="border-bottom-0">Time In</th>
                                    <th class="border-bottom-0">Time Out</th>
                                    <th class="border-bottom-0"> Active</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                                @foreach ($Attendance as $Attendance)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $Attendance->date }}</td>
                                        <td>{{ $Attendance->employee->Employee_ID }}</td>
										<td>{{ $Attendance->employee->Employee_Name }}</td>
                                        <td>
                                        @if ($Attendance->attendance == 'Present')
                                                <span class="badge badge-pill badge-success">{{ $Attendance->AddText() }}</span>
                                                @else

                                            <span class="badge badge-pill badge-danger">{{ $Attendance->AddText() }}</span>
                                                
                                            @endif
                                         </td>
                                        <td>{{ $Attendance->time_in }}</td>
										<td>{{ $Attendance->time_out }}</td>
                                        <td>
                                            
                                                <button class="btn btn-outline-success btn-sm"
                                                    data-date="{{ $Attendance->date }}" data-Att_id="{{ $Attendance->id }}"
                                                    data-Employee_ID="{{ $Attendance->employee->Employee_ID }}"
													data-Employee_Name="{{ $Attendance->employee->Employee_Name }}"
                                                    data-attendance="{{ $Attendance->attendance }}"
                                                    data-time_in="{{ $Attendance->time_in }}"
													data-time_out="{{ $Attendance->time_out }}" 
													data-toggle="modal"
                                                    data-target="#edit_Attendance">Update</button>
                                            

                                           
                                                <button class="btn btn-outline-danger btn-sm " data-Att_id="{{ $Attendance->id }}"
                                                    data-Employee_Name="{{ $Attendance->employee->Employee_Name }}" data-toggle="modal"
                                                    data-target="#modaldemo9">Delate</button>
                                            

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

				<!-- /row -->
			
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
<!-- add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add Attendance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('Attendance.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Date </label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                             <label  class="my-1 mr-2" for="inlineFormCustomSelectPref">Employee_ID</label>
                             <select name="Employee_id" id="Employee_id" class="form-control" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')" required>
                                <option value="" selected disabled> --Select Employee ID  --</option>
                                @foreach ($employee as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->Employee_ID }}</option>
                                @endforeach
                             </select>
                            </div>

                            

                            <div class="form-group">
							<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Attendance</label>
                            <select name="attendance" id="attendance" class="form-control" required>
                                <option value="" selected disabled> --Select Attendance  --</option>
                                
                                    <option value="Present">Present</option>
									<option value="Absent">Absent</option>
                                   
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Time In</label>  
							        <input class="form-control fc-datepicker"  id="time_in" name="time_in" placeholder="00:00"
                                    type="time"  >   
                            </div>
                            
							<div class="form-group">
                                <label for="exampleFormControlTextarea1">   Time Out</label>
								<input class="form-control fc-datepicker"  id="time_out" name="time_out" placeholder="00:00"
                                    type="time"  >
                            </div>

                      
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Sure</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="edit_Attendance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Attendance </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='Attendance/update' method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="title">Attendance Table</Table>  :</label>

                                <input type="hidden" class="form-control" name="Att_id" id="Att_id" value="">
                                <label for="title">Date  </Table>  :</label>
                                <input type="text" class="form-control" name="Employee_ID" id="Employee_ID">
                            </div>
                        
                            <div class="form-group">
                                <label for="title">Date  </Table>  :</label>
                                <input type="Date" class="form-control" name="date" id="date">
                            </div>
                            <div>
                              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Attendance</label>
                              <select name="attendance" id="attendance" class="custom-select my-1 mr-sm-2" required>
                                <option></option>
											<option value="Present">Present</option>
                                            <option value="Absent" >Absent</option>
                                            
                              </select>
                             </div>
                            <div class="form-group">
                                <label for="title">Time In </Table>  :</label>
                                <input type="time" class="form-control" name="time_in" id="time_in">
                            </div>
                            
                            <div class="form-group">
                                <label for="title">Time out </Table>  :</label>
                                <input type="time" class="form-control" name="time_out" id="time_out">
                            </div>

                            

                            

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Data </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Attendance </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="Attendance/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="Att_id" id="Att_id" value="">
                            <input class="form-control" name="Employee_Name" id="Employee_Name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
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
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script>
        $('#edit_Attendance').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var date = button.data('date')
            var Employee_id = button.data('Employee_id')
            var Employee_Name = button.data('Employee_Name')
            var Att_id = button.data('Att_id')
            var Attendance = button.data('Attendance')
            var time_in = button.data('time_in')
            var time_out = button.data('time_out')
            var modal = $(this)
            modal.find('.modal-body #Employee_id').val(Employee_id);
            modal.find('.modal-body #Employee_Name').val(Employee_Name);
            modal.find('.modal-body #Attendance').val(Attendance);
            modal.find('.modal-body #Att_id').val(Att_id);
            modal.find('.modal-body #time_in').val(time_in);
            modal.find('.modal-body #time_out').val(time_out);
        })

        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Att_id = button.data('Att_id')
            var product_name = button.data('Employee_Name')
            var modal = $(this)
            modal.find('.modal-body #Att_id').val(Att_id);
            modal.find('.modal-body #Employee_Name').val(Employee_Name);
        })
    </script>
    
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    
       
    
@endsection
