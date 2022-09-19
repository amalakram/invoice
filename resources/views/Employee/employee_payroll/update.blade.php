<!-- Modal -->
<div class="modal fade" id="edit_Payroll{{$Payroll->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                Update Payroll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Payroll.update',$Payroll->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                <div class="modal-body">
                <label for="recipient-name" class="col-form-label">Employee Name:</label>
                    <h5>{{$Payroll->employee->Employee_Name}}</h5>
                    <br>
                    <br>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee_ID:</label>
            <select type="text" class="form-control" id="Employee_id" name="Employee_id" value="{{ $Payroll->employee->Employee_ID }}" readonly>
            <option value="" selected disabled>{{ $Payroll->employee->Employee_ID }}</option>
                                
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="date"  name="date" value="{{ $Payroll->date }}">
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Deductions</label>
            <input type="text" class="form-control" id="Deductions" name="Deductions" value="{{ $Payroll->Deductions }}">
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cash Advance :</label>
            <input type="text" class="form-control" id="Cash_Advance" name="Cash_Advance" value="{{ $Payroll->Cash_Advance }}">
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






<div class="modal fade" id="modaldemo9{{$Payroll->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Payroll </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('Payroll.destroy',$Payroll->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value=""{{ $Payroll->id }}"">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
