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
                    <h5>{{$Attendance->employee->Employee_Name}}</h5>
                    <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="recipient-name" value="{{ $Attendance->date }}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee_ID:</label>
            <select type="text" class="form-control" id="recipint-name" value="{{ $Attendance->employee->Employee_ID }}">
            <option value="" selected disabled>{{ $Attendance->employee->Employee_ID }}</option>
                                @foreach ($employee as $employee)e
                                    <option value="{{ $employee->id }}">{{ $employee->Employee_ID }}</option>
                                @endforeach
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Attendance:</label>
            <select type="text" class="form-control" id="recipint-name" value="{{ $Attendance->employee->Employee_ID }}">
            <option value="" selected disabled>{{ $Attendance->attendance}}</option>
            <option></option>
											<option value="Present">Present</option>
                                            <option value="Absent" >Absent</option>
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Time In:</label>
            <input type="time" class="form-control" id="recipient-name" value="{{ $Attendance->time_in }}">
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Time Out:</label>
            <input type="time" class="form-control" id="recipient-name" value="{{ $Attendance->time_out }}">
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
