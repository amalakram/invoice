@extends('layouts.master')
@section('css')
@endsection
@section('title')
Update Payment Status
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Payment status change</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Status_Update', ['id' => $invoices->id]) }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Invoices Numper </label>
                                <input type="hidden" name="invoice_id" value="{{ $invoices->id }}">
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="Please enter your invoice number" value="{{ $invoices->invoice_number }}" required
                                    readonly>
                            </div>

                            <div class="col">
                                <label>Invoice Date</label>
                                <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoices->invoice_Date }}" required readonly>
                            </div>

                            <div class="col">
                                <label>Due Date </label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoices->Due_date }}" required readonly>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Customer Name  </label>
                                <input class="form-control " name="client" 
                                    type="text" value="{{ old('client', $invoices->client) }}"required readonly>
                            </div>
                            <div class="col-2">
                                <label >Customer Mobile</label>
                                <input class="form-control fc-datepicker" name="customer_mobile" 
                                title="Please enter the client number"value="{{ old('customer_mobile', $invoices->customer_mobile) }}" readonly>
                                
                            </div>
                            <div class="col-4">
                                <label >Customer Address</label>
                                <input class="form-control fc-datepicker" name="client_address" 
                                title="Please enter the client number" value="{{ old('client_address', $invoices->client_address) }}" readonly>
                                
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="customer_email">Customer Email</label>
                                    <input type="text" name="customer_email" class="form-control" value="{{ old('customer_email', $invoices->customer_email) }}" readonly>
                                    @error('customer_email')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            


                            
                            
                        </div>
                        {{-- 2 --}}
                        <!--<div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Category</label>
                                <select name="Section" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')" readonly>
                                    <--placeholder
                                    <option value=" {{ $invoices->section->id }}">
                                        {{ $invoices->section->section_name }}
                                    </option>

                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Product</label>
                                <select id="product" name="product" class="form-control" readonly>
                                    <option value="{{ $invoices->product }}"> {{ $invoices->product }}</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Amount Collection </label>
                                <input type="text" class="form-control" id="inputName" name="Amount_collection"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoices->Amount_collection }}" readonly>
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> Amount Commission</label>
                                <input type="text" class="form-control form-control-lg" id="Amount_Commission"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoices->Amount_Commission }}" required readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Discount</label>
                                <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoices->Discount }}" required readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Rate VAT   </label>
                                <select name="Rate_VAT" id="Rate_VAT" class="form-control" onchange="myFunction()" readonly>
                                    <--placeholder
                                    <option value=" {{ $invoices->Rate_VAT }}">
                                        {{ $invoices->Rate_VAT }}
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> Value_VAT  </label>
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
                                        <input type="text" name="Product_name[{{ $loop->index }}]" id="Product_name"  value="{{ old('Product_name', $item->Product_name) }}" class="product_name form-control" readonly>
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select name="unit[{{ $loop->index }}]" id="unit" class="unit form-control"readonly >
                                            <option></option>
											<option value="piece" {{ $item->unit == 'piece' ? 'selected' : '' }}>{{'piece'}}</option>
                                            <option value="g" {{ $item->unit == 'g' ? 'selected' : '' }}>{{'gram'}}</option>
                                            <option value="kg" {{ $item->unit == 'kg' ? 'selected' : '' }}>{{'kilo_gram' }}</option>
											<option value="m²" {{ $item->unit == 'm²' ? 'selected' : '' }}>{{'m²' }}</option>
                                            
                                            
                                        </select>
                                        @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                
                                    <td>
                                        <input type="number" name="qty[{{ $loop->index }}]" step="1" id="qty" class="qty form-control" value="{{ old('qty', $item->qty) }}"readonly>
                                        @error('qty')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[{{ $loop->index }}]" step="1" id="unit_price" class="unit_price form-control"  value="{{ old('unit_price', $item->unit_price) }}" readonly>
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
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select form-control" readonly>
                                            <option value="percentage">percentage</option>
                                            <option value="fixed">AED</option>
											<option value="fixed" {{ $invoices->discount_type == 'fixed' ? 'selected' : '' }}>AED</option>
                                                <option value="percentage" {{ $invoices->discount_type == 'percentage' ? 'selected' : '' }}>percentage</option>
                                                
                                            </select>
                                            <div class="input-group-append ">
                                                <input type="number" step="0.01" name="discount_value" id="discount_value"  value="{{ old('discount_value', $invoices->discount_value) }}"class="discount_value form-control" value="0.00" readonly>
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
                                    <td colspan="2">Vat(15%)</td>
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

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Note</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3" readonly>
                                {{ $invoices->note }}</textarea>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea"> Status</label>
                                <select class="form-control" id="Status" name="Status" required>
                                    <option selected="true" disabled="disabled">-- Select Payment Status   --</option>
                                    <option value="paid">paid</option>
                                    <option value=" partially paid">partially paid </option>
                                </select>
                            </div>

                            <div class="col">
                                <label>Payment Date</label>
                                <input class="form-control fc-datepicker" name="Payment_Date" placeholder="YYYY-MM-DD"
                                    type="text" required>
                            </div>


                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Update Payment Status  </button>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
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
@endsection
