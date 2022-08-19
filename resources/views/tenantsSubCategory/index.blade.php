@extends('layouts.master')
@section('title')
    @lang('translation.Dashboards')
@endsection
@section('css')

    <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">
    @livewireStyles
@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.Dashboards')
        @endslot
        @slot('title')
            @lang('translation.tenantsSubCategory')
        @endslot
    @endcomponent


    <livewire:tenants.tenants-categories />







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

    @livewireScripts
@endsection
