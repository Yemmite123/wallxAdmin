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
                    Complaint Module
                </h1>
                {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">complaints</li>
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
                <h3 class="block-title"> Complain Module</h3>
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
                            <th class="text-center">Action</th>
          
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($complaints as $key=>$complaint)
                       
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="text-center">
                                <img class="img-avatar" style="height: 50px; width:50px" src="{{$complaint['logo'] ?? asset('/media/avatars/avatar13.jpg') }}" alt="">
                                
                            </td>
                            <td class="text-center">
                                {{$complaint['businessname'] ?? 'Nill'}} 
                            </td>

                            <td class="text-center">
                                {{$complaint['phonenumber'] ?? 'Nill'}}
                            </td>
                            <td class="text-center">
                                {{$complaint['emailaddress'] ?? 'Nill' }}
                            </td>
                            <td class="text-center">
                                {{$complaint['review'] ?? 'Nill' }}
                            </td>

                            <td class="text-center">
                               {{$complaint['reviewtype'] ?? 'Nill' }}
                            </td>
                            <td class="text-center">
                                {{$complaint['memberID'] ?? 'Nill' }}
                            </td>
                            <td class="text-center">
                                {{$complaint['caseno'] ?? 'Nill' }}
                            </td>
                        
                            <td class="text-center">
                                @if ($complaint['status'] == 'pending')
                                 <p class="text-danger">Pending</p>
                              @else
                                 <p class="text-success">Active</p>
                              @endif
                            </td>

                            <td class="text-center">
                                @php($updateID = 'update-status-'.$complaint['id'])
                                <a class="btn btn-primary" data-toggle="modal" data-target="#{{$updateID}}">Update</a>
                    

                                <div class="modal fade" id="{{$updateID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <div class="modal-content">

                                            <form class="needs-validation" novalidate method="POST"  action="{{ url('update_complaint') }}">
                                                @csrf 
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$complaint['businessname'] ?? 'Nil'}}</h5>
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            
                                                <div class="modal-body">
                                                
                                                    <input type="hidden" name="id" value="{{$complaint['id']}}">

                                                    <div class="form-row">

                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom04">Status</label>
                                                            <select class="custom-select" name="status" id="validationCustom04" required>
                                                                <option value="Pending" {{strtolower($complaint['status']) == 'pending'? 'selected' : ''}}>Pending</option>
                                                                <option value="Active" {{strtolower($complaint['status']) == 'active'? 'selected' : ''}}>Active</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a status
                                                            </div>

                                                        </div>
                                                    
                                                    </div>
                                                    
                                            
                                                </div>

                                                <div class="mb-6">
                                                    <button type="button" class="btn btn-secondary float-left ml-4 " data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary float-right mr-4">Save Changes</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
  
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
