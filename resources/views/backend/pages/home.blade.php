@extends('backend.layouts.master')

{{--@section('title', 'Page Title')--}}


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
                <a href="{{URL::route('home')}}"><i class="fa fa-home"></i> @lang('home.home')</a>
            </li>
            @if($config->init != 0)
            <li>
                <a href="{{URL::route('preview')}}" target="_blank"><i class="gi gi-eye_open"></i> @lang('home.preview')</a>
            </li>
            <li>
                <a href="{{URL::route('sessions')}}"><i class="gi gi-notes_2"></i> @lang('home.viveed_sessions')</a>
            </li>
            <li>
                <a href="{{URL::route('speakers')}}"><i class="gi gi-notes_2"></i> @lang('home.viveed_speakers')</a>
            </li>
            @endif
            <li>
                <a href="{{URL::route('settings')}}"><i class="gi gi-notes_2"></i> @lang('home.viveed_settings')</a>
            </li>
            {{--<li>
                <a href="javascript:void(0)"><i class="gi gi-video_hd"></i> Movies</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="gi gi-music"></i> Music</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-cubes"></i> Apps</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-pencil"></i> Profile</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-cogs"></i> Settings</a>
            </li>--}}
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
                {{--<article>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque?</p>
                    <p>Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque?</p>
                    <p>Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus.</p>
                </article>--}}
            </div>
        </div>
    </div>
    <!-- END Dummy Content -->

</div>
<!-- END Page Content -->
@stop