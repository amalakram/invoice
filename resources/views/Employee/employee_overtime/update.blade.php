<!-- Modal -->
<div class="modal fade" id="edit_Overtime{{$Overtime->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                Update Overtime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Overtime.update',$Overtime->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                <div class="modal-body">
                <label for="recipient-name" class="col-form-label">Employee Name:</label>
                    <h5>{{$Overtime->employee->Employee_Name}}</h5>
                    <br>
                    <br>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee_ID:</label>
            <select type="text" class="form-control" id="Employee_id" name="Employee_id" value="{{ $Overtime->employee->Employee_ID }}" readonly >
            <option value="" selected disabled>{{ $Overtime->employee->Employee_ID }}</option>
                                
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="date"  name="date" value="{{ $Overtime->date }}">
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">No_of_hours:</label>
            <input type="text" class="form-control" id="No_of_hours" name="No_of_hours" value="{{ $Overtime->No_of_hours }}">
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Rate:</label>
            <input type="text" class="form-control" id="Rate" name="Rate" value="{{ $Overtime->Rate }}">
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
<div class="modal fade" id="modaldemo9{{$Overtime->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Attendance </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('Overtime.destroy',$Overtime->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value=""{{ $Overtime->id }}"">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
