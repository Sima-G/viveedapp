@if( ! empty($schedule_config))
    <ul class="sidebar-nav">
        <li @if((Route::current()->getName() == 'sessions') || (Route::current()->getName() == 'speakers') || (Route::current()->getName() == 'settings'))  class="active" @endif>
            <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-notes_2 sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.sessions')</span></a>
            <ul>
                @if($schedule_config->init != 0)
                    <li @if($schedule_config->init == 0) class="content_not_for_init" @endif>
                        <a href="{{URL::route('sessions')}}" @if(Route::current()->getName() == 'sessions') class="active" @endif ><span id="sessions_nav_span" title="@lang('master.sessions_desc')">@lang('master.sessions')</span></a>
                    </li>
                    <li @if($schedule_config->init == 0) class="content_not_for_init" @endif>
                        <a href="{{URL::route('speakers')}}" @if(Route::current()->getName() == 'speakers') class="active" @endif><span id="speakers_nav_span" title="@lang('master.speakers_desc')">@lang('master.speakers')</span></a>
                    </li>
                @endif
                <li>
                    <a href="{{URL::route('settings')}}" @if(Route::current()->getName() == 'settings') class="active notice_init_tooltip" @endif @if($schedule_config->init == 0) data-toggle="tooltip" data-original-title="@lang('master.msg_setting_init')" @endif ><span id="settings_nav_span" title="@lang('master.settings_desc')">@lang('master.settings')</span> @if($schedule_config->init == 0) <i class="fa fa-exclamation-circle notice_init"></i> @endif</a>
                </li>
            </ul>
        </li>
    </ul>
@endif