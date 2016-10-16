@extends('frontend.layouts.master')

@section('content')
    <!-- About Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="gi gi-circle_info"></i> @lang("frontend/master.about")</li>
    </ul>
    <!-- END About Header -->

    <!-- About Content -->
    <div class="block block-alt-noborder">
        <h3 class="sub-header">{{ $config->title }}<br>
        <small>{{ $config->config_start_date }} - {{ $config->config_end_date }}</small></h3>
        <p>{!! $config->description  !!}</p>
    </div>
    <!-- END About Content -->
@stop