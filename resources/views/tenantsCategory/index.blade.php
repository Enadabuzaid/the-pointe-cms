@extends('layouts.master')
@section('title')
    @lang('translation.Dashboards')
@endsection
@section('css')

    <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.Dashboards')
        @endslot
        @slot('title')
            @lang('translation.tenantsCategory')
        @endslot
    @endcomponent


    {{--INCALUDE ADD CATEGORY MODAL START--}}
    @include('tenantsCategory.inc.Add_modal')
    {{--INCALUDE ADD CATEGORY MODAL END--}}

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif




    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach

    @if(! $category->isEmpty())
        <div class="row">
            @foreach($category as $tenants)
                @if(app()->getLocale() == 'en')
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom text-uppercase">
                                <div class="row">
                                    <div class="col">{{$tenants->tenants_category_name_en}}</div>
                                    <div class="col">
                                        <a href="#" class="text-danger"> <i class=" far fa-trash-alt fa-lg" style="float: right"></i></a>
                                        <a href="#" class="text-primary"> <i class="far fa-edit fa-lg" style="float: right;padding-right: 6px"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{$tenants->tenants_category_desc_en}}
                                </p>
                                <a href="javascript: void(0);"
                                   class="btn btn-primary waves-effect waves-light">@lang('translation.Go To') {{$tenants->tenants_category_name_en}}</a>
                            </div>
                            <div class="card-footer bg-transparent border-top text-muted">
                                @if($tenants->tenants_category_status)
                                    <a href="#" class="badge badge-success bg-success">@lang('translation.Active')</a>
                                @else
                                    <a href="#" class="badge badge-danger bg-danger">@lang('translation.Deactivate')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom text-uppercase">
                                {{$tenants->tenants_category_name_ar}}
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{$tenants->tenants_category_desc_ar}}
                                </p>
                                <a href="javascript: void(0);"
                                   class="btn btn-primary waves-effect waves-light">@lang('translation.Go To') {{$tenants->tenants_category_name_ar}}</a>
                            </div>
                            <div class="card-footer bg-transparent border-top text-muted">
                                @if($tenants->tenants_category_status)
                                    <a href="#" class="badge badge-success bg-success">@lang('translation.Active')</a>
                                @else
                                    <a href="#" class="badge badge-danger bg-danger">@lang('translation.Deactivate')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            @lang('translation.empty_category_message')
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        const switcherButton = document.querySelector('#customSwitchsizemd')
        const selecterDiv = document.querySelector('#category_select')

        switcherButton.addEventListener('click', function(){
            if(switcherButton.checked === true){
                selecterDiv.style.display = "block";
            } else{
                selecterDiv.style.display = "none";
            }
        });
    </script>
@endsection
