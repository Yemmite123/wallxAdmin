

<div class="modal fade" id="changedAdminPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
       <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ url('create_admin') }}">
        @csrf 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Admin Password</h5>
         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- <hr> --}}
        <div class="modal-body">
         
             
            <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom013">Username</label>
                    <input type="text" class="form-control" name="adminusername" id="validationCustom01" required>
                    <div class="invalid-feedback">
                      Please provide a valid Username
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom014">Password</label>
                    <input type="password" class="form-control" name="adminpassword" id="validationCustom02"  required>
                    <div class="invalid-feedback">
                      Please provide a password
                    </div>
                  </div>
            </div>
        </div>
            
      
        <hr>
        <div class="mb-6">
          <button type="button" class="btn btn-secondary float-left ml-4 " data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary float-right mr-4">Create Admin</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  
  <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
  </script>