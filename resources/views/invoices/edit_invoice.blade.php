@extends('layouts.master')
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
Edit Envoice
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">invoice</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Edit Envoice</span>
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
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
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

                    <form action="{{ url('invoices/update') }}" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">nvoice Number </label>
                                <input type="hidden" name="invoice_id" value="{{ $invoices->id }}">
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="Please enter the invoice number" value="{{ $invoices->invoice_number }}" required>
                            </div>

                            <div class="col">
                                <label> invoice Date</label>
                                <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoices->invoice_Date }}" required>
                            </div>

                            <div class="col">
                                <label>Due Date</label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoices->Due_date }}" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Customer Name  </label>
                                <input class="form-control " name="client" 
                                    type="text" value="{{ old('client', $invoices->client) }}"required>
                            </div>
                            <div class="col-2">
                                <label >Customer Mobile</label>
                                <input class="form-control fc-datepicker" name="customer_mobile" 
                                title="Please enter the client number"value="{{ old('customer_mobile', $invoices->customer_mobile) }}" required>
                                
                            </div>
                            <div class="col-4">
                                <label >Customer Address</label>
                                <input class="form-control fc-datepicker" name="client_address" 
                                title="Please enter the client number" value="{{ old('client_address', $invoices->client_address) }}" required>
                                
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="customer_email">Customer Email</label>
                                    <input type="text" name="customer_email" class="form-control" value="{{ old('customer_email', $invoices->customer_email) }}">
                                    @error('customer_email')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            


                            
                            
                        </div>

                        {{-- 2 --}}
                        <!--<div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Category</label>
                                <select name="Section" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <--placeholder-->
                                    <!--<option value=" {{ $invoices->section->id }}">
                                        {{ $invoices->section->section_name }}
                                    </option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"> {{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Product</label>
                                <select id="product" name="product" class="form-control">
                                    <option value="{{ $invoices->product }}"> {{ $invoices->product }}</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Amount Collection</label>
                                <input type="text" class="form-control" id="inputName" name="Amount_collection"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoices->Amount_collection }}">
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">Amount Commission </label>
                                <input type="text" class="form-control form-control-lg" id="Amount_Commission"
                                    name="Amount_Commission" 
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoices->Amount_Commission }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Discount</label>
                                <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                                    
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoices->Discount }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Rate VAT</label>
                                <select name="Rate_VAT" id="Rate_VAT" class="form-control" onchange="myFunction()">
                                    <--placeholder->
                                    <option value=" {{ $invoices->Rate_VAT }}">
                                        {{ $invoices->Rate_VAT }}
                                    <option value=" 5%">5%</option>
                                    <option value="10%">10%</option>
                                    <option value="15%">15%</option>
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Value VAT</label>
                                <input type="text" class="form-control" id="Value_VAT" name="Value_VAT"
                                    value="{{ $invoices->Value_VAT }}" readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Total</label>
                                <input type="text" class="form-control" id="Total" name="Total" readonly
                                    value="{{ $invoices->Total }}">
                            </div>
                        </div>-->
                        <!-- new------------------------------------------------------------ -->
                      <br>
                      <br>
                      <br>
                        <div class="table-responsive">
                            <table class="table" id="quote_details">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>product Name</th>
                                    <th>unit</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>product Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                               
							@foreach( $invoices->details as $item)
                                <tr class="cloning_row" id="{{ $loop->index }}">
                                <td>  
								@if($loop->index == 0)
                                        {{ '#' }}
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button>
                                        @endif
                                        </td>
                                    <td>
                                        <input type="text" name="Product_name[{{ $loop->index }}]" id="Product_name"  value="{{ old('Product_name', $item->Product_name) }}" class="product_name form-control">
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select name="unit[{{ $loop->index }}]" id="unit" class="unit form-control">
                                            <option></option>
											<option value="piece" {{ $item->unit == 'piece' ? 'selected' : '' }}>{{'piece'}}</option>
                                            <option value="g" {{ $item->unit == 'g' ? 'selected' : '' }}>{{'gram'}}</option>
                                            <option value="kg" {{ $item->unit == 'kg' ? 'selected' : '' }}>{{'kilo_gram' }}</option>
											<option value="m²" {{ $item->unit == 'm²' ? 'selected' : '' }}>{{'m²' }}</option>
                                            
                                            
                                        </select>
                                        @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                
                                    <td>
                                        <input type="number" name="qty[{{ $loop->index }}]" step="0.01" id="qty" class="qty form-control" value="{{ old('qty', $item->qty) }}">
                                        @error('qty')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[{{ $loop->index }}]" step="0.01" id="unit_price" class="unit_price form-control"  value="{{ old('unit_price', $item->unit_price) }}">
                                        @error('unit_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="row_sub_total[{{ $loop->index }}]" id="row_sub_total" class="row_sub_total form-control" value="{{ old('row_sub_total', $item->row_sub_total) }}" readonly="readonly">
                                        @error('row_sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn_add btn btn-primary">Add Another_product</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Sub Total</td>
                                    <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control"  value="{{ old('sub_total', $invoices->sub_total) }}"readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Discount</td>
                                    <td>
                                    <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select form-control" >
                                            <option value="percentage">percentage</option>
                                            <option value="fixed">AED</option>
											<option value="fixed" {{ $invoices->discount_type == 'fixed' ? 'selected' : '' }}>AED</option>
                                                <option value="percentage" {{ $invoices->discount_type == 'percentage' ? 'selected' : '' }}>percentage</option>
                                                
                                            </select>
                                            <div class="input-group-append ">
                                                <input type="number" step="0.01" name="discount_value" id="discount_value"  value="{{ old('discount_value', $invoices->discount_value) }}"class="discount_value form-control" value="0.00">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Net Amount</td>
                                    <td><input type="number" step="0.01" name="net_ammount" id="net_ammount" class="net_ammount form-control"  value="{{ old('net_ammount', $invoices->net_ammount) }}" readonly="readonly"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Vat(0
                                        
                                        %)</td>
                                    <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" value="{{ old('vat_value', $invoices->vat_value) }}" readonly="readonly"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Total Due</td>
                                    <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" value="{{ old('total_due', $invoices->total_due) }}" readonly="readonly"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                     <!--new ---------------------------------------------------------------->





                      
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Note</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3">
                                {{ $invoices->note }}</textarea>
                            </div>
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save Data </button>
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
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

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
    let vatVal = totdiscount* 0.15;

    return vatVal.toFixed(2);
}
let totdiscount = function () {
    let sub_totalVal = $('.sub_total').val() || 0;
    let discount_type = $('.discount_type').val();
    let discount_value = parseFloat($('.discount_value').val()) || 0;
    let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;
    let totdiscount=sub_totalVal-discountVal;
    let vatVal = totdiscount* 0.15;

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

    <script>
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert(' Please enter commission amount   ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }

    </script>


@endsection
