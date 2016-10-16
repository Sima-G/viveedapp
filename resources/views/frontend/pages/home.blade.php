@extends('frontend.layouts.bootstrap.master')

@section('content')
        <div class="block block-alt-noborder">
            <h3 class="sub-header">@lang('frontend/messages.welcome_viveed_msg')</h3>
            <div style="text-align: center;">
                <img src="{{ asset('assets/frontend/bootstrap/img/logo/Viveed_Logo_Inverted.png') }}"
                     style="width: 40%; margin: 0 auto;">
            </div>
            <br>
        </div>
@stop