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
    @include('backend.partials.modules.admin.nav')
@endif

<div class="sidebar-header sidebar-nav-mini-hide">
    <span class="sidebar-header-title">@lang('master.MODULES')</span>
</div>

@include('backend.partials.modules.schedule.nav')

{{--{{ Route::current()->getPrefix() }}--}}

{{ substr(Route::current()->getName(), 0, 4) }}

@include('backend.partials.modules.catering.nav')

@include('backend.partials.modules.pricing.nav')

@include('backend.partials.modules.schedule.nav_info')