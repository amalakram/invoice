<!-- Modal -->
<!--    تعديل  -->

<div class="modal fade" id="edit_PettyCash{{$PettyCash->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                Update PettyCash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('PettyCash.update',$PettyCash->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                <div class="modal-body">
                
                    

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="date"  name="date" value="{{ $PettyCash->date }}">
          </div>
          
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="col-form-label" >Description:</label>
            <textarea  type="text" class="form-control" id="description" name="description" rows="3" >{{ $PettyCash->description }}</textarea>
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Amount:</label>
            <input type="text" class="form-control" id="Amount" name="Amount" value="{{ $PettyCash->Amount }}">
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
<!--    الحذف -->

<div class="modal fade" id="modaldemo9{{$PettyCash->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete PettyCash </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('PettyCash.destroy',$PettyCash->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value="{{ $PettyCash->id }}">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--  نقل الي  الارشفه  -->

        <div class="modal fade" id="modaldemo96{{$PettyCash->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive the PettyCash</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('PettyCash.destroy',$PettyCash->id) }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                Are you sure of the archiving process?
                    <input type="hidden" name="id" id="id" value="{{ $PettyCash->id }}">
                    <input type="hidden" name="id_page" id="id_page" value="2">

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Sure</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!--   الارشفه الغاء -->
    <div class="modal fade" id="modaldemo966{{$PettyCash->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel archiving invoice </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('ArchiveP.update', 'test') }}" method="post"><!-- -->
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                Are you sure about the process of canceling the archive?
                    <input type="hidden" name="id" id="id" value="{{ $PettyCash->id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-success">Sure</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!--   حذف الارشفه  -->
    <div class="modal fade" id="modaldemo94{{$PettyCash->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete PettyCash </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('ArchiveP.destroy',$PettyCash->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value="{{ $PettyCash->id }}">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>