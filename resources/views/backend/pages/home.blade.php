@extends('backend.layouts.master')

{{--@section('title', 'Page Title')--}}

@section('title')
    @lang('home.home')
@stop


@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop


@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
    @stop

@section('content')
<!-- Page content -->
<div id="page-content">
    <!-- Dashboard 2 Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="{{URL::route('home')}}"><i class="gi gi-home"></i> @lang('home.home')</a>
            </li>
            <li class="">
                <a href="{{URL::route('cnf_dashboard')}}"><i class="fa fa-microphone"></i> @lang('home.conference')</a>
            </li>
            <li class="">
                <a href="{{URL::route('ct_dashboard')}}"><i class="gi gi-fast_food"></i> @lang('home.catering')</a>
            </li>
            <li class="">
                <a href="{{URL::route('prc_dashboard')}}"><i class="gi gi-coins"></i> @lang('home.pricing')</a>
            </li>
        </ul>
    </div>
    <!-- END Dashboard 2 Header -->

    <!-- Dashboard 2 Content -->
    <div class="row">

    </div>
    <!-- END Dashboard 2 Content -->

    <!-- Dummy Content -->
    <div class="block full block-alt-noborder">

        <img src="{{ asset('assets/backend/img/logo/Viveed_Logo_Inverted.png') }}" class="img-responsive center-block" width="40%">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <h3 class="sub-header text-center">Let's have some <strong>Vice Versa</strong> feed</h3>
            </div>
        </div>
    </div>
    <!-- END Dummy Content -->

</div>
<!-- END Page Content -->
@stop