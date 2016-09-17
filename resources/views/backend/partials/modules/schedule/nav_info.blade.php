@if( ! empty($schedule_config))
    <div class="sidebar-header sidebar-nav-mini-hide">
        <span class="sidebar-header-options clearfix">
            <a href="javascript:void(0)" title="@lang('master.notifications')"><i class="gi gi-circle_info"></i></a>
        </span>
        <span class="sidebar-header-title">@lang('master.notifications')</span>
    </div>
    <div class="sidebar-section sidebar-nav-mini-hide">
        @if($schedule_config->init == 0)
            <div class="alert alert-warning alert-alt notice_init">
                <i class="fa fa-exclamation fa-fw"></i> @lang('master.notification_setting_init')
            </div>
        @else
            @if($session_count == 0)
                <div class="alert alert-info alert-alt">
                    <small>@lang('master.count_sessions')</small><br>
                    <i class="fa fa-check fa-fw"></i> @lang('master.count_no_sessions')
                </div>
            @else
                <div class="alert alert-success alert-alt">
                    <small>@lang('master.count_sessions')</small><br>
                    <i class="fa fa-check fa-fw"></i> {{ $session_count }} @lang('master.sessions')
                </div>
            @endif

            @if($speaker_count == 0)
                <div class="alert alert-info alert-alt">
                    <small>@lang('master.count_speakers')</small><br>
                    <i class="fa fa-check fa-fw"></i> @lang('master.count_no_speakers')
                </div>
            @else
                <div class="alert alert-success alert-alt">
                    <small>@lang('master.count_speakers')</small><br>
                    <i class="fa fa-check fa-fw"></i> {{ $speaker_count }} @lang('master.speakers')
                </div>
            @endif
        @endif
    </div>
@endif