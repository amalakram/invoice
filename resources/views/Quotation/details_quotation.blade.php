@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
Invoice Details
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Quotition Details </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Quotition Details</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
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



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">Informations
                                            Quotition</a></li>
                                          
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">Attachments</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Quotation number</th>
                                                            <td>{{$quotation->quote_number}}</td>
                                                            <th scope="row">quote_Date</th>
                                                            <td>{{$quotation->quote_Date}}</td>
                                                           
                                                            <th scope="row">Customer name </th>
                                                            <td>{{$quotation->client }}</td>
                                                            <th scope="row">Customer Address</th>
                                                            <td>{{ old('client_address', $quotation->client_address) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Customer Email</th>
                                                            <td>{{ old('customer_email', $quotation->customer_email) }}</td>
                                                            <th scope="row">Sub Total </th>
                                                            <td>{{ $quotation->sub_total }}</td>
                                                            <th scope="row">Net Ammount  </th>
                                                            <td>{{$quotation->net_ammount }}</td>
                                                            
                                                        </tr>


                                                        <tr>
                                                        <th scope="row">Discount</th>
                                                            <td>{{ $quotation->discount_value }}</td>
                                                            <th scope="row">Value VAT </th>
                                                            <td>{{ $quotation->vat_value }}</td>
                                                            <th scope="row"> Total </th>
                                                            <td>{{ $quotation->total_due }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Note</th>
                                                            <td>{{ $quotation->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        

                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">
                                                
                                                    <div class="card-body">
                                                        <p class="text-danger">*Attachment format pdf, jpeg, .jpg, png</p>
                                                        <h5 class="card-title">Add Attachments </h5>
                                                        <form method="post" action="{{ url('/quotition_attachment') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="quotition_number"
                                                                    value="{{ $quotation->quote_number }}">
                                                                <input type="hidden" id="quote_id" name="quote_id"
                                                                    value="{{ $quotation->id }}">
                                                                <label class="custom-file-label" for="customFile">Select the attachment
                                                                    </label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">OK</button>
                                                        </form>
                                                    </div>
                                               
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col"></th>
                                                                <th scope="col">File Name </th>
                                                                <th scope="col">Created_by </th>
                                                                <th scope="col"> created_at</th>
                                                                <th scope="col">action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->Created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('View_fileQ') }}/{{ $quotation->quote_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            Show</a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('downloadQ') }}/{{ $quotation->quote_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                                Download</a>

                                                                       
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-quotition_number="{{ $attachment->quotition_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">Delete</button>
                                                                      

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Attachment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_fileQ') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red">Are you sure about deleting the attachment?</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="quotition_number" id="quotition_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">sure</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var quotition_number = button.data('quotition_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #quotition_number').val(quotition_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
