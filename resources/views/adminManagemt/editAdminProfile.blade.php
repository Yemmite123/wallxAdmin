@extends('layouts.backend')
@section('content')
   <!-- Main Container -->
   
    <!-- Hero -->
    <div class="bg-image" style="background-image: url({{ asset('/media/photos/photo8@2x.jpg') }});">
        <div class="bg-black-75">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" src="{{ asset('/media/avatars/avatar13.jpg') }}" alt="">
                </div>
                <h1 class="h2 text-white mb-0">Edit Account</h1>
                <h2 class="h4 font-w400 text-white-75">
                    {{session('adminfirstname')}} {{session('adminlastname')}}
                </h2>
                <a class="btn btn-light" href="{{url('dashboard')}}">
                    <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">User Profile</h3>
            </div>
            <div class="block-content">
                <form  method="POST" enctype="multipart/form-data" action="{{ url('update_admin') }}">
                    @csrf
                    <div class="row push">
                        <div class="col-lg-4">
                            
                            <p class="font-size-sm text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif
                
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                            <div class="form-group">
                                <label for="one-profile-edit-name">First Name</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="adminfirstname" placeholder="Enter your firstname.." value="{{session('adminfirstname')}}">
                            </div>
                            <div class="form-group">
                                <label for="one-profile-edit-name">Last Name</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="adminlastname" placeholder="Enter your lastname.." value="{{session('adminlastname')}}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="one-profile-edit-email" name="adminemailaddress" placeholder="Enter your email.." value="{{session('adminemailaddress')}}">
                            </div> --}}
                            <div class="form-group">
                                <label for="one-profile-edit-email">Gender</label>
                                <select class="custom-select" name="admingender" id="validationCustom04" required>
                                    <option selected disabled  value="">Choose...</option>
                                    <option value="Male" {{session('admingender')=='Male'?'selected':''}}>Male</option>
                                    <option value="female" {{session('admingender')=='Female'?'selected':''}}>Female</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label>Your Avatar</label>
                                <div class="push">
                                    <img class="img-avatar" src="{{ asset('/media/avatars/avatar13.jpg')}}" alt="">
                                </div>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="one-profile-edit-avatar" name="adminprofilelink" value="{{session('adminprofilelink')}}">
                                    <label class="custom-file-label" for="one-profile-edit-avatar">Choose a new avatar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Change Password</h3>
            </div>
            <div class="block-content">
                <form  method="POST"action="{{ url('change_admin_password') }}">
                    @csrf 
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Changing your sign in password is an easy way to keep your account secure.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="one-profile-edit-password">Current Password</label>
                                <input type="password" class="form-control" id="one-profile-edit-password" required name="oldpassword">
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="one-profile-edit-password-new">New Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new" required name="newpassword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="one-profile-edit-password-new-confirm">Confirm New Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new-confirm" required name="one-profile-edit-password-new-confirm">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Change Password -->

    </div>
    <!-- END Page Content -->

<!-- END Main Container -->

@endsection