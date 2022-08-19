@extends('layouts.master')
@section('title') @lang('translation.Data_Tables')  @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Tenants @endslot
        @slot('title') Add Tenant @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tenant Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Images </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">SEO</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Tenant Banner</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <p class="mb-0">
                                    <form id="pristine-valid-example" novalidate method="post">
                                    <input type="hidden"/>
                                    <div class="row">

                                        <div class="col-xl-4 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" required data-pristine-required-message="Please Enter a Tenant Name " class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" required data-pristine-required-message="Please Enter a Tenant Name " class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <select type="text" required data-pristine-required-message="Please Enter a Tenant Name " class="form-control" >
                                                    @foreach($tenants_cat as $category)
                                                        <option id="{{$category->tenant_category_id}}">{{$category->tenants_category_name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Description</label>
                                                <textarea name="tenant_description" required data-pristine-required-message="Please Enter a Description" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                    <div class="form-group">
                                        <button  type="submit" class="btn btn-primary">Submit form</button>
                                    </div>
                                </form>
                                </p>
                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <p class="mb-0">
                                     <div action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane" id="messages1" role="tabpanel">
                                <p class="mb-0">

                                </p>
                            </div>
                            <div class="tab-pane" id="settings1" role="tabpanel">
                                <p class="mb-0">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/pristinejs/pristinejs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection
