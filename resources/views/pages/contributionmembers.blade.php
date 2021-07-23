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
                    Contribution Members
                </h1>
                {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Members</li>
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
                <h3 class="block-title"> All Contribution Members</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Business Name</th>
                            <th class="text-center">Amount Contributed</th>
                            <th class="text-center">Phone number</th>
                            <th class="text-center">Email Address</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($members as $key=>$member)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <th class="text-center">
                                    @if(isset($member['logo']))
                                        <img src="{{$member['logo']}}" class="img-responsive" width="51" height="51">
                                    @endif
                                    <div>{{$member['businessname']}}</div>
                            </th>
                            <th class="text-center">{{$member['amountcontributed']}}</th>
                            <th class="text-center">{{$member['phonenumber']}}</th>
                            <th class="text-center">{{$member['emailaddress']}}</th>
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
