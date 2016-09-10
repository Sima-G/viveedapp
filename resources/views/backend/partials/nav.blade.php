<ul class="sidebar-nav">
    <li class="sidebar-header">
        <span class="sidebar-header-title">@lang('master.viveed')</span>
    </li>
    <li>
        <a href="{{URL::route('home')}}" class=""><i class="gi gi-home sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.home')</span></a>
        @if( ! empty($schedule_config))
            @if($schedule_config->init == 0)
                <a class="sidebar_nav_no_preview" data-toggle="tooltip" data-original-title="@lang('master.msg_no_preview')"><i class="gi gi-eye_close sidebar-nav-icon"></i><span id="preview_nav_span" title="@lang('master.preview')" class="sidebar-nav-mini-hide">@lang('master.preview')</span></a>
            @else
                <a href="{{URL::route('preview')}}" target="_blank" class=""><i class="gi gi-eye_open sidebar-nav-icon"></i><span id="preview_nav_span" title="@lang('master.preview')" class="sidebar-nav-mini-hide">@lang('master.preview')</span></a>
            @endif
        @endif
    </li>
</ul>

@if(head($userRoles) == 'Admin')
<ul class="sidebar-nav">
    <li class="sidebar-header">
        <span class="sidebar-header-title">@lang('master.admin')</span>
    </li>
    <li>
        <a href="{{URL::route('users')}}" class=""><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.users')</span></a>
        <a href="{{URL::route('modules')}}" class=""><i class="gi gi-adjust_alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.modules')</span></a>
    </li>
</ul>
@endif

<div class="sidebar-header sidebar-nav-mini-hide">
    <span class="sidebar-header-title">@lang('master.MODULES')</span>
</div>

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
{{ Route::current()->getPrefix() }}
{{--@if( ! empty($schedule_config))--}}
    <ul class="sidebar-nav">

        <li @if((Route::current()->getName() == 'sessions') || (Route::current()->getName() == 'speakers') || (Route::current()->getName() == 'settings'))  class="active" @endif>
            <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-fast_food sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.catering')</span></a>
            <ul>

                <li>
                    <a href="{{URL::route('ct_dashboard')}}" @if(Route::current()->getName() == 'ct_dashboard') class="active notice_init_tooltip" @endif @if($schedule_config->init == 0) data-toggle="tooltip" data-original-title="@lang('master.msg_setting_init')" @endif ><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ct_dashboard')</span> @if($schedule_config->init == 0) <i class="fa fa-exclamation-circle notice_init"></i> @endif</a>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>@lang('master.ct_products')</a>
                    <ul @if(Route::current()->getName() == 'ct_product_manage') style="display: block;" @else style="display: none;" @endif >
                        <li>
                            <a href="{{URL::route('ct_products')}}" @if(Route::current()->getName() == 'ct_products') class="active" @endif ><span id="sessions_nav_span" title="@lang('master.ct_product_manage_desc')">@lang('master.ct_product_manage')</span></a>
                        </li>
                        <li>
                            <a href="{{URL::route('ct_product_manage')}}" @if(Route::current()->getName() == 'ct_product_manage') class="active" @endif ><span id="sessions_nav_span" title="@lang('master.ct_product_manage_desc')">@lang('master.ct_product_create')</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{URL::route('ct_categories')}}" @if(Route::current()->getName() == 'ct_categories') class="active notice_init_tooltip" @endif @if($schedule_config->init == 0) data-toggle="tooltip" data-original-title="@lang('master.msg_setting_init')" @endif ><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ct_categories')</span> @if($schedule_config->init == 0) <i class="fa fa-exclamation-circle notice_init"></i> @endif</a>
                </li>
            </ul>
        </li>
    </ul>
{{--@endif--}}

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