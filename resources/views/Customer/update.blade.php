<!-- Modal -->
<div class="modal fade" id="edit_Costomer{{$Costomer->id}}" tabindex="-1" role="dialog"
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
            <form action="{{route('customer.update',$Costomer->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                <div class="modal-body">
                
         <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Customer Name::</label>
            <input type="text" class="form-control" id="client"  name="client" value="{{ $Costomer->client }}" readonly>
          </div>   

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Customer Mobile:</label>
            <input type="text" class="form-control" id="customer_mobile"  name="customer_mobile" value="{{ $Costomer->customer_mobile }}">
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Customer Email:</label>
            <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ $Costomer->customer_email }}">
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Customer Address:</label>
            <input type="text" class="form-control" id="client_address" name="client_address" value="{{ $Costomer->client_address }}">
          </div>   
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Company Name:</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $Costomer->company_name }}">
          </div> 
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="col-form-label" >Description:</label>
            <textarea  type="text" class="form-control" id="description" name="description" rows="3" >{{ $Costomer->description }}</textarea>
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
<div class="modal fade" id="modaldemo9{{$Costomer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete PettyCash </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('customer.destroy',$Costomer->id) }}"  method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p> Are you sure about the deletion process?</p><br>
                            <input type="hidden" name="id" id="id" value=""{{ $Costomer->id }}"">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
