<!-- Modal -->
<div class="modal fade" id="edit_employee{{$Employee->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employee.update',$Employee->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                <div class="modal-body">
                <label for="recipient-name" class="col-form-label">Employee Name:</label>
                    <h5>{{$Employee->Employee_Name}}</h5>
                    <br>
                    <br>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee_ID:</label>
            <select type="text" class="form-control" id="Employee_id" name="Employee_id" value="{{ $Employee->Employee_ID }}" readonly >
            <option value="" selected disabled>{{ $Employee->Employee_ID }}</option>
                                
                            </select> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee Mobile:</label>
            <input type="text" class="form-control" id="Employee_Mobile"  name="Employee_Mobile" value="{{ $Employee->Employee_Mobile }}" >
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employee Position:</label>
            <input type="text" class="form-control" id="Employee_Position" name="Employee_Position"value="{{ $Employee->Employee_Position }}" >
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Member Since:</label>
            <input type="date" class="form-control" id="Member_Since" name="Member_Since" value="{{ $Employee->Member_Since }}">
          </div>   
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Salary:</label>
            <input type="text" class="form-control" id="Salary" name="Salary"value="{{ $Employee->Salary }}" >
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
<div class="modal fade" id="modaldemo9{{$Employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Attendance </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('employee.destroy',$Employee->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value=""{{ $Employee->id }}"">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
