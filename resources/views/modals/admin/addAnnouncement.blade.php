

<div class="modal fade" id="addAnnouncement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
       <form class="needs-validation" novalidate method="POST"  action="{{ url('create_announcement') }}">
        @csrf 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- <hr> --}}
        <div class="modal-body">
         
             
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom013">Announcement Title</label>
                    <input type="text" class="form-control" name="title" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        Please provide an announcement title
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom013">Announcement Merchant</label>
                    <select name="merchantID" class="form-control" required>
                        <option >Select A Merchant</option>
                        @foreach($merchants as $merchantCategory)
                            @foreach($merchantCategory['merchantlist'] as $merchant)
                                <option value="{{$merchant['id']}}">{{$merchant['businessname']}}</option>
                            @endforeach
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please provide an announcement merchant
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom013">Announcement User</label>
                    <select name="userID" class="form-control" required>
                        <option >Select A User</option>
                        @foreach($users as $user)
                            <option value="{{$user['id']}}">{{$user['adminfirstname'].' '.$user['adminlastname']}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please provide an announcement user
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom014">Announcement Contents</label>
                    <textarea type="password" class="form-control" name="body" id="validationCustom02" cols="30"  required></textarea>
                    <div class="invalid-feedback">
                      Please provide a password
                    </div>
                </div>
            </div>
        </div>
            
      
        <hr>
        <div class="mb-6">
          <button type="button" class="btn btn-secondary float-left ml-4 " data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary float-right mr-4">Create Announcement</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
