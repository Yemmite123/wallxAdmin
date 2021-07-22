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
                     MERCHANT MODULE
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
                <h3 class="block-title"> All Merchant</h3>
                {{-- <a class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Admin User</a> --}}
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
        

                <div id="accordion">
                    @foreach ($listmerchant as $key=> $merchant)
                    <div style="margin-top: 20px" class="" class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse{{ $key+1 }}">
                            {{$merchant['category']}}
                        </a>
                      </div>
                      <div id="collapse{{ $key+1 }}" class="collapse @if($key+1 == 1) show @endif" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons  table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">phone Number</th>
                                        <th class="text-center">Account Name</th> 
                                        <th class="text-center">Account Number</th>
                                        <th class="text-center">Bank Name</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Rating</th>
                                        <th class="text-center">supervisor Name</th>
                                        <th class="text-center">supervisor Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($merchant['merchantlist'] as $key=> $mtList)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                       
                                        <td class="text-center">{{$mtList['businessname']}}</td>
                                        <td class="text-center">
                                            @if ($mtList['logo'] == '')
                                              <img class="img-avatar" style="height: 50px; width:50px" src="{{ asset('/media/avatars/avatar13.jpg')}}" alt="">
                                            @else
                                              <img class="img-avatar" style="height: 50px; width:50px" src="{{$mtList['logo']}}" alt="">
                                            @endif
                                        </td>
                                        <td class="text-center">{{$mtList['businesslocation']}}</td>
                                        <td class="text-center">{{$mtList['phonenumber']}}</td>
                                        <td class="text-center">{{$mtList['accountname']}}</td>
                                        <td class="text-center">{{$mtList['accountnumber']}}</td>
                                        <td class="text-center">{{$mtList['bankname']}}</td>
                                        <td class="text-center">{{$mtList['rating']}}</td>
                                        <td class="text-center">{{$mtList['supervisorname']}}</td>
                                        <td class="text-center">{{$mtList['supervisorphone']}}</td>
                                       
                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>

                    @endforeach
                  
                  </div>

            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->

@endsection
