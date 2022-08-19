@extends('layouts.master')
@section('title') @lang('translation.Data_Tables')  @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Dashboard @endslot
        @slot('title') Tenants @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <a href="{{route('tenants.create')}}" type="button" class="btn btn-outline-primary mx-2 button-icon mb-3 float-end "><i class="fas fa-plus-circle me-2"></i>@lang('translation.addTenants')</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>description</th>
                            <th>Logo</th>
                            <th>Category</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($tenants as $tenant)
                            <tr>
                                <td>{{$tenant->tenant_name}}</td>
                                <td>{{$tenant->tenant_description}}</td>
                                <td>{{$tenant->tenant_logo}}</td>

                                <td>{{$tenant->category->tenants_category_name_en}}</td>

                                <td>
                                    @if($tenant->tenant_status)
                                        <span class="badge bg-primary me-1 my-2">Active</span>
                                    @else
                                        <span class="badge bg-danger me-1 my-2">Deactivate</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <form action="" method="POST" class="mt-2">
                                                @csrf
                                                @method('GET')
                                                <input type="hidden" name="course_id" value="">
                                                <a title="edit" href="javascript:void(0);" onclick="event.preventDefault(); this.closest('form').submit();"><i class="far fa-edit text-info fa-2x"></i></a>
                                            </form>
                                        </div>

                                        <div class="col">
                                            <a title="delete" type="button" class="mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$tenant->tenant_id}}" data-bs-whatever="@mdo"><i class=" fas fa-trash-alt fa-2x text-danger"></i></a>
                                        </div>

                                        <div class="col">
                                            <a title="show details" type="button" href="" class="mt-2"  data-bs-whatever="@mdo"><i class=" far fa-eye text-primary fa-2x"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModal_{{$tenant->tenant_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">

                                            <p>Are you sure want To Delete this ?!</p>
                                            <form action="{{route('tenants.destroy',$tenant->tenant_id)}}" method="post" id="delteForm">
                                                @csrf
                                                @method('DELETE')
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" name="tenant_id" value="{{$tenant->tenant_id}}" id="recipient-name">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="delteForm" class="btn btn-primary">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection
