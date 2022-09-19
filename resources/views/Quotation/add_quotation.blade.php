@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/classic.date.css') }}">
    @if(config('app.locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/rtl.css') }}">
    @endif
    <style>
        form.form label.error, label.error {
            color: red;
            font-style: italic;
        }
    </style>
@endsection
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
Add invoices
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Quotation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     Add Quotation</span>
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

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Quotation.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        
<br>
<br>

                        <div class="row">
                            <div class="col-2">
                                <label for="quote_number" class="control-label">Number Quotation </label>
                                <input type="text" class="form-control" id="quote_number" name="quote_number"
                                    title="Please enter the Quotation number" required>
                            </div>

                            <div class="col-2">
                                <label>Quotation Date </label>
                                <input class="form-control fc-datepicker" name="quote_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-4">
                        
                                    <label >Title</label>
                                    <input type="text" name="title" class="form-control " >
                                    
                            </div>

                            <div class="col-4">  
                                <label >Company Name</label>
                                <input class="form-control " name="company_name" 
                                title="Please enter the company_name number" required>
                            </div>


                        </div>
                        <div class="row">
                            <br>
                        </div>  

                      
                        <div class="row">
                            <div class="col-4">
                                <label>Customer Name  </label>
                                <input class="form-control " name="client" 
                                    type="text" required>
                            </div>
                            <div class="col-2">
                                <label >Customer Mobile</label>
                                <input class="form-control "  type="text" name="customer_mobile" 
                                title="Please enter the client number" required>
                                
                            </div>
                            <div class="col-4">
                                <label >Customer Address</label>
                                <input class="form-control " type="text" name="client_address" 
                                title="Please enter the client number" required>
                                
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="customer_email">Customer Email</label>
                                    <input type="email" name="customer_email" class="form-control">
                                    @error('customer_email')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            


                            
                            
                        </div>
                      <!-- new------------------------------------------------------------ -->
                      <br>
                      <br>
                        <div class="table-responsive">
                            <table class="table" id="quote_details">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>product Name</th>
                                    <th>unit</th>
                                    <th>Category Name</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>product Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="cloning_row" id="0">
                                    <td>#</td>
                                    <td>
                                        <input type="text" name="Product_name[0]" id="Product_name" class="product_name form-control">
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select name="unit[0]" id="unit" class="unit form-control">
                                            <option></option>
                                            <option value="piece">piece</option>
                                            <option value="g">kilo_gram</option>
                                            <option value="kg">gram</option>
                                            <option value="m²">m²</option>
                                            
                                        </select>
                                        @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                    
                                    <select name="Section[]" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->

                                    <option value="" selected disabled> Select category</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"> {{ $section->section_name }}</option>
                                    @endforeach
                                    
                                </select>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[0]" step="0.1" id="qty" class="qty form-control">
                                        @error('qty')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[0]" step="0.1" id="unit_price" class="unit_price form-control">
                                        @error('unit_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.1" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                                        @error('row_sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn_add btn btn-primary">Add Another_product</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="1">Sub Total</td>
                                    <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="1">Discount</td>
                                    <td>
                                    <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select form-control">
                                            <option value="percentage">percentage</option>
                                            <option value="fixed">AED</option>
                                                
                                            </select>
                                            <div class="input-group-append ">
                                                <input type="number" step="0.1" name="discount_value" id="discount_value" class="discount_value form-control" value="0.0">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="1">Net Amount</td>
                                    <td><input type="number" step="0.01" name="net_ammount" id="net_ammount" class="net_ammount form-control" readonly="readonly"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="1">Vat(15)</td>
                                    <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="1">Total Due</td>
                                    <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly="readonly"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                     <!--new ---------------------------------------------------------------->

                        
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Notes</label>
                                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">*Attachment format pdf, jpeg, .jpg, png </p>
                        <h5 class="card-title">Attachments</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save Date</button>
                        </div>


                </form>  
                    
                </div>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    
    <script src="{{ asset('frontend/js/form_validation/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/additional-methods.min.js') }}"></script>
    
    
    

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    
<script>

    // first
    $(document).ready(function() {  
    $('#quote_details').on('keyup blur', '.qty', function () {
        let $row = $(this).closest('tr');
        let qty = $row.find('.qty').val() || 0;
        let unit_price = $row.find('.unit_price').val() || 0;

        $row.find('.row_sub_total').val((qty * unit_price).toFixed(2));

        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
        $('#net_ammount').val(totdiscount());

    });
    $('#quote_details').on('keyup blur', '.unit_price', function () {
        let $row = $(this).closest('tr');
        let qty = $row.find('.qty').val() || 0;
        let unit_price = $row.find('.unit_price').val() || 0;

        $row.find('.row_sub_total').val((qty * unit_price).toFixed(2));

        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
        $('#net_ammount').val(totdiscount());
    });
    $('#quote_details').on('keyup blur', '.discount_type', function () {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
        $('#net_ammount').val(totdiscount());
    });

    $('#quote_details').on('keyup blur', '.discount_value', function () {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
        $('#net_ammount').val(totdiscount());
        //$row.find('.net_ammount').val((totdiscount).toFixed(2));
    });

    

    let sum_total = function ($selector) {
        let sum = 0;
        $($selector).each(function () {
            let selectorVal = $(this).val() != '' ? $(this).val() : 0;
            sum += parseFloat(selectorVal);
        });
        return sum.toFixed(2);
    }
    let calculate_vat = function () {
        let sub_totalVal = $('.sub_total').val() || 0;
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;
        let totdiscount=sub_totalVal-discountVal;
        let vatVal = totdiscount* 0.00;

        return vatVal.toFixed(2);
    }
    let totdiscount = function () {
        let sub_totalVal = $('.sub_total').val() || 0;
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;
        let totdiscount=sub_totalVal-discountVal;
        let vatVal = totdiscount* 0.00;

        return totdiscount.toFixed(2);
    }
    
    let sum_due_total = function () {
        let sum = 0;
        let sub_totalVal = $('.sub_total').val() || 0;
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;

        let vatVal = parseFloat($('.vat_value').val()) || 0;
        //let totdiscount = parseFloat($('.net_ammount').val()) || 0;

        sum += sub_totalVal;
        sum -= discountVal;
        sum += vatVal;
       

        return sum.toFixed(2);
    }
    $(document).on('click', '.btn_add', function () {
        let trCount = $('#quote_details').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#quote_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;
        $('#quote_details').find('tbody').append($('' +
            '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
            '<td><input type="text" name="Product_name[' + numberIncr + ']" class="Product_name form-control"></td>' +
            '<td><select name="unit[' + numberIncr + ']" class="unit form-control"><option></option><option value="piece">Piece</option><option value="g">Gram</option><option value="kg">Kilo Gram</option><option value="m²">m²</option></select></td>' +
            '<td><select name="Section[]" class="form-control SlectBox"<option value=""  > Select category</option> @foreach ($sections as $section)<option value="{{ $section->id }}"> {{ $section->section_name }}</option> @endforeach</select></td>'+

            '<td><input type="number" name="qty[' + numberIncr + ']" step="0.01" class="qty form-control"></td>' +
            '<td><input type="number" name="unit_price[' + numberIncr + ']" step="0.01" class="unit_price form-control"></td>' +
            '<td><input type="number" name="row_sub_total[' + numberIncr + ']" step="0.01" class="row_sub_total form-control" readonly="readonly"></td>' +
            '</tr>'));

    });
    $(document).on('click', '.delegated-btn', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
        $('#net_ammount').val(totdiscount());
    });

    $('form').on('submit', function (e) {
        $('input.Product_name').each(function () { $(this).rules("add", { required: true }); });
        $('select.unit').each(function () { $(this).rules("add", { required: true }); });
        $('input.qty').each(function () { $(this).rules("add", { required: true }); });
        $('input.unit_price').each(function () { $(this).rules("add", { required: true }); });
        $('input.row_sub_total').each(function () { $(this).rules("add", { required: true }); });
        e.preventDefault();
    });
    $('form').validate({
        rules: {
            'client' : { required:true },
            'customer_email' : { required:true, email:true },
            'customer_mobile' : { required:true, digits: true, minlength: 10, maxlength: 14 },
            'company_name' : { required:true },
            'quote_number' : { required:true, digits: true },
            'quote_Date' : { required:true },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

   });
 </script>
    

    

@endsection