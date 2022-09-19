<!-- Modal -->
<div class="modal fade" id="edit_Attendance{{$Attendance->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                Update Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Attendance.update',$Attendance->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                <div class="modal-body">
                <label for="recipient-name" class="col-form-label">Employee Name:</label>
                    <h5>{{$Attendance->employee->Employee_Name}}</h5>
                    <br>
                    <br>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee_ID:</label>
            <select type="text" class="form-control" id="Employee_id" name="Employee_id" value="{{ $Attendance->employee->Employee_ID }}" readonly>
            <option value="" selected disabled>{{ $Attendance->employee->Employee_ID }}</option>
                                
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="date"  name="date" value="{{ $Attendance->date }}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Attendance:</label>
            <select type="text" class="form-control" id="attendance"  name="attendance" >
            <option  selected disabled></option>
            
											<option value="Present">Present</option>
                                            <option value="Absent" >Absent</option>
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Time In:</label>
            <input type="time" class="form-control" id="time_in" name="time_in" value="{{ $Attendance->time_in }}">
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Time Out:</label>
            <input type="time" class="form-control" id="time_out" name="time_out" value="{{ $Attendance->time_out }}">
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
<div class="modal fade" id="modaldemo9{{$Attendance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Attendance </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('Attendance.destroy',$Attendance->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value=""{{ $Attendance->id }}"">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
