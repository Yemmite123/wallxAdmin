@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>


    <script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/be_forms_wizard.min.js') }}"></script>

@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-left">
                <h1 class="flex-sm-fill h3 my-2">
                    App User Module
                </h1>
                {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">List</a>
                        </li>
                    </ol>
                </nav> --}}
            </div>
       </div>
    </div>
    <!-- END Hero -->

    
    <!-- Page Content -->
    <div class="m-2">
        <!-- Info -->
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

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded ">
            <div class="block-header">
                <h3 class="block-title"> App User Module</h3>
                {{-- <a class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Admin User</a> --}}
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">business Name</th>
                            <th class="text-center">phone Number</th>
                            <th class="text-center">Email</th> 
                            <th class="text-center">Review</th>
                            <th class="text-center">Review Type</th>
                            <th class="text-center">MemberID</th>
                            <th class="text-center">Caseno</th>
                            <th class="text-center">Status</th>
          
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($complaint as $key=>$user)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="text-center">
                                @if ($user['logo'] == '')
                                  <img class="img-avatar" style="height: 50px; width:50px" src="{{ asset('/media/avatars/avatar13.jpg')}}" alt="">
                                @else
                                  <img class="img-avatar" style="height: 50px; width:50px" src="{{$user['logo']}}" alt="">
                                @endif
                            </td>
                            <td class="text-center">
                                {{$user['businessname']}}
                            </td>

                            <td class="text-center">
                                {{$user['phonenumber']}}
                            </td>
                            <td class="text-center">
                                {{$user['emailaddress']}}
                            </td>
                            <td class="text-center">
                                {{$user['review']}}
                            </td>

                            <td class="text-center">
                               {{$user['reviewtype']}}
                            </td>
                            <td class="text-center">
                                {{$user['memberID']}}
                            </td>
                            <td class="text-center">
                                {{$user['caseno']}}
                            </td>
                        
                            <td class="text-center">
                                @if ($user['status'] == 'pending')
                                 <p class="text-danger">Pending</p>
                              @else
                                 <p class="text-success">Active</p>
                              @endif
                            </td>
                          
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->

@endsection
