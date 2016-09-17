<!-- Dashboard 2 Header -->
<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li class="active">
            <a href="{{URL::route('home')}}"><i class="fa fa-home"></i> @lang('home.home')</a>
        </li>
            @if($schedule_config->init != 0)
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
    </ul>
</div>
<!-- END Dashboard 2 Header -->