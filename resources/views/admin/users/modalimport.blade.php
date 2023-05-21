<div class="modal" id="exampleImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('message.delete_header')}} <br></h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{URL::to('/upload-users')}}" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="mb-3 col-md-4">
                <label class="form-label" for="inputState">{{__('text.file')}}</label>
                <input type="file" class="form-control" id="file" name="file" placeholder="{{__('text.file')}}" value="{{ old('file') }}" required>
            </div>
           

        </div>
        </div>
        <div class="modal-footer">
            
                @csrf
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-danger">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>