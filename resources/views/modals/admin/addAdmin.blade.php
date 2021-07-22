

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ url('create_admin') }}">
      @csrf 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin User</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- <hr> --}}
      <div class="modal-body">
       
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" name="adminfirstname" id="validationCustom01" required>
                <div class="invalid-feedback">
                  Please provide a valid first name
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" name="adminlastname" id="validationCustom02"  required>
                <div class="invalid-feedback">
                  Please provide a valid last name
                </div>
              </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom09">Email</label>
                  <input type="email" class="form-control" name="adminemailaddress" id="validationCustom01"  required>
                  <div class="invalid-feedback">
                    Please provide a valid email
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom010">Phone Number</label>
                  <input type="number" class="form-control" name="adminphonenumber" id="validationCustom02" value="Otto" required>
                  <div class="invalid-feedback">
                    Please provide a valid phone number
                  </div>
                </div>
              </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom04">Gender</label>
                <select class="custom-select" name="admingender" id="validationCustom04" required>
                  <option selected disabled  value="">Choose...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <div class="invalid-feedback">
                  Please select gender
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="validationCustom03">DOB</label>
                <input type="date" name="admindob" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid DOB
                </div>
              </div>
             
              {{-- <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div> --}}

           
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