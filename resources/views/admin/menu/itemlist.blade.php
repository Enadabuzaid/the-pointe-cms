@extends('layouts.master')
@section('title') @lang('translation.Data_Tables')  @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Menus @endslot
        @slot('title')  {{$menuinfo->name}} @endslot

     @endcomponent
     

    <button type="button" class="btn btn-primary waves-effect waves-light mb-4" data-bs-toggle="modal" data-bs-target="#myModal">Add New MenuItem</button>

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog">




         
 



            <form action="{{route('menuitem.store')}}" method="post">
                @csrf
                @method('POST')
                <input  name="menu_id" type="hidden"  value="{{$menuinfo->id}}" >

                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add MenuItem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="example-text-input" class="form-label">Title</label>
                        <input class="form-control" name="title" type="text" placeholder="menuitem title" id="example-text-input">
                    </div>

                    <div class="mb-3">
                        <label for="example-text-input" class="form-label">URL</label>
                        <input class="form-control" name="url" type="url" placeholder="menuitem URL" id="example-text-input">
                    </div>

                    <div class="mb-3">
                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Status</label>
                        <select class="form-control" data-trigger name="parent_id"  id="choices-single-default"    >
                            <option value="0">root</option>
                            @foreach($menuitems as $menuitem)
                              <option value="{{$menuitem->id}} ">{{$menuitem->title}} </option>
                             @endforeach 
                         </select>
                    </div>

                    <div class="mb-3">
                        <label for="example-text-input" class="form-label">Order</label>
                        <input class="form-control" name="order" type="number" placeholder="menuitem Order" id="example-text-input">
                    </div>






                    <div class="mb-3">
                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Status</label>
                        <select class="form-control" data-trigger name="status"  id="choices-single-default"   placeholder="Enter menuitem type">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @if($errors->any())
        <div class="alert alert-danger mg-b-0 alert-dismissible fade show mb-4" role="alert">
            <strong>Opps !</strong> Something went wrong.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($menuitems as $menuitem)
                        <tr>
                            <td>{{$menuitem->id}}</td>
                            <td>{{$menuitem->title}}</td>
                            <td>{{$menuitem->url}}</td>
                             <td>
                                @if($menuitem->status)
                                    <span class="badge bg-success me-1 my-2">Active</span>
                                @else
                                    <span class="badge bg-danger me-1 my-2">Deactivate</span>
                                @endif
                            </td>
                            <td>
                                <a title="delete" type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$menuitem->id}}" data-bs-whatever="@mdo">
                                    <i data-feather="trash-2"></i>
                                </a>

                                <a title="switch status" type="button" class="text-secondary" data-bs-toggle="modal" data-bs-target="#switch{{$menuitem->id}}" data-bs-whatever="@mdo">
                                    <i data-feather="refresh-ccw"></i>
                                </a>

                                <a title="Edit" type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#edit{{$menuitem->id}}" data-bs-whatever="@mdo">
                                    <i data-feather="edit"></i>
                                </a>

                             

                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModal_{{$menuitem->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <p>Are you sure want To Delete this ?!</p>
                                        <form action="{{route('menuitem.destroy')}}" method="post" id="delteForm">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="id" value="{{$menuitem->id}}" id="recipient-name">
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

                        <div class="modal fade" id="switch{{$menuitem->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Switch status</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        @if($menuitem->status)
                                            @php
                                                $type = 0;
                                                $color = 'danger';
                                                $text = 'Deactivate'
                                            @endphp
                                        @else
                                            @php
                                                $type = 1;
                                                $color = 'success';
                                                $text = 'Active'
                                            @endphp
                                        @endif
                                            <p>Are you sure want To Switch to <span class="text-{{$color}}">{{$text}}</span> ?!</p>
                                            <form action="{{route('menuitem.switch')}}" method="post" id="swichForm">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="id" value="{{$menuitem->id}}" id="recipient-name">
                                                <input type="hidden" class="form-control" name="type" value="{{$type}}" id="recipient-name">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="swichForm" class="btn btn-{{$color}}">{{$text}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="edit{{$menuitem->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{route('menuitem.update')}}" method="post" id="editForm">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" class="form-control" name="id" value="{{$menuitem->id}}" id="recipient-name">
                                    <input  name="menu_id" type="hidden"  value="{{$menuinfo->id}}" >

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Edit MenuItem</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         

                                          
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Title</label>
                                                <input class="form-control" value="{{$menuitem->title}}" name="title" type="text" placeholder="menuitem title" id="example-text-input">
                                            </div>
                        
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">URL</label>
                                                <input class="form-control" value="{{$menuitem->url}}" name="url" type="url" placeholder="menuitem URL" id="example-text-input">
                                            </div>
                        
                                            <div class="mb-3">
                                                <label for="choices-single-default" class="form-label font-size-13 text-muted">Status</label>
                                                <select class="form-control" data-trigger name="parent_id"  id="choices-single-default"    >
                                                    <option value="0">root</option>
                                                    @foreach($menuitems as $menuitem_select)
                                                      <option  @if($menuitem->parent_id == $menuitem_select->id) selected @endif value="{{$menuitem_select->id}} ">{{$menuitem_select->title}} </option>
                                                     @endforeach 
                                                 </select>
                                            </div>
                        
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Order</label>
                                                <input class="form-control" value="{{$menuitem->order}}"  name="order" type="number" placeholder="menuitem Order" id="example-text-input">
                                            </div>

                                    

                                            <div class="mb-3">
                                                <label class="example-text-input">Status <span class="text-danger">*</span></label>
                                                <select class="form-select" name="status">
                                                    @if($menuitem->status)
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactivate</option>
                                                    @else
                                                        <option value="0">Deactivate</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm" class="btn btn-success waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </form>
                            </div>
                        </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
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
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

    @if(Session::has('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{Session::get('success')}}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if(Session::has('delete'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{Session::get('delete')}}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if(Session::has('switch'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: '{{Session::get('switch')}}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if(Session::has('update'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: '{{Session::get('update')}}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    {{Session::forget('success')}}
    {{Session::forget('delete')}}
    {{Session::forget('switch')}}
    {{Session::forget('update')}}


@endsection
