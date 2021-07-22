@extends('layouts.simple')

@section('content')
<div id="page-container">
    @section('js_after')

    <script src="{{ asset('js/oneui.core.min.js') }}"></script>

    <script src="{{ asset('js/oneui.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/op_auth_signin.min.js') }}"></script>
    
        <!-- Page JS Code -->
        <script src="{{ asset('js/pages/be_forms_wizard.min.js') }}"></script>
    
    @endsection
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url({{ asset('/media/photos/photo28@2x.jpg') }});">
            <div class="row no-gutters bg-primary-dark-op">
                <!-- Meta Info Section -->
                <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
                    <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                        <div class="w-100">
                            <a class="link-fx font-w600 font-size-h2 text-white" href="index.html">
                                Wall<span class="font-w400">X</span>
                            </a>
                            <p class="text-white-75 mr-xl-8 mt-2">
                                Welcome to your amazing app. Feel free to login and start managing your projects and clients.
                            </p>
                        </div>
                    </div>
                    <div class="p-4 p-xl-5 d-xl-flex justify-content-between align-items-center font-size-sm">
                        <p class="font-w500 text-white-50 mb-0">
                            <strong>WallX</strong> &copy; <span data-toggle="year-copy"></span>
                        </p>
                        <ul class="list list-inline mb-0 py-2">
                            <li class="list-inline-item">
                                <a class="text-white-75 font-w500" href="javascript:void(0)">Legal</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white-75 font-w500" href="javascript:void(0)">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white-75 font-w500" href="javascript:void(0)">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Meta Info Section -->

                <!-- Main Section -->
                <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-white">
                    <div class="p-3 w-100 d-lg-none text-center">
                        <a class="link-fx font-w600 font-size-h3 text-dark" href="index.html">
                            One<span class="font-w400">UI</span>
                        </a>
                    </div>
                    <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                        <div class="w-100">
                            <!-- Header -->
                          
                            <div class="text-center mb-5">
                                <p class="mb-3">
                                    {{-- <i class="fa fa-2x fa-circle-notch text-primary-light"></i> --}}
                                    <img height="100" src="https://api.wallx.co/img/WallX.a9443cd8.png">
                                </p>
                                <h1 class="font-w700 mb-2">
                                    Sign In
                                </h1>
                                <h2 class="font-size-base text-muted">
                                    Welcome, please login or <a href="op_auth_signup3.html">sign up</a> for a new account.
                                </h2>
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('error') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <div class="row no-gutters justify-content-center">
                                <div class="col-sm-8 col-xl-4">
                                    <form class="needs-validation" action="{{ url('admin_login') }}" novalidate method="POST">
                                        @csrf 
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt py-4" id="login-username" name="username" required placeholder="Username">
                                            <div class="invalid-feedback">
                                                Please provide your username
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt py-4" id="login-password" required name="password" placeholder="Password">
                                            <div class="invalid-feedback">
                                                Please provide a login password
                                              </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div>
                                                <a class="text-muted font-size-sm font-w500 d-block d-lg-inline-block mb-1" href="#">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1 opacity-50"></i> Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <div class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between font-size-sm text-center text-sm-left">
                        <p class="font-w500 text-black-50 py-2 mb-0">
                            <strong>WallX</strong> &copy; <span data-toggle="year-copy"></span>
                        </p>
                        <ul class="list list-inline py-2 mb-0">
                            <li class="list-inline-item">
                                <a class="text-muted font-w500" href="javascript:void(0)">Legal</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted font-w500" href="javascript:void(0)">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted font-w500" href="javascript:void(0)">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Main Section -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
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
@endsection
