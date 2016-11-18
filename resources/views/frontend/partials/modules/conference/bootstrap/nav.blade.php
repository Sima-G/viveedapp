<ul class="sidebar-nav">
    <li class="sidebar-header">
        <span class="sidebar-header-title">@lang("frontend/master.conference")</span>
    </li>

    <li>
        <a href="{{URL::route('preview')}}" @if(Route::current()->getName() == 'preview') class="active" @endif><i class="gi gi-home sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.home")</span></a>
    </li>
    <li>
        <a href="{{URL::route('session_list')}}" @if(Route::current()->getName() == 'session_list') class="active" @endif><i class="gi gi-notes sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.sessions")</span></a>
    </li>
    <li>
        <a href="{{URL::route('speaker_list')}}" @if(Route::current()->getName() == 'speaker_list') class="active" @endif><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.speakers")</span></a>
    </li>
    <li>
        <a href="{{URL::route('about')}}" @if(Route::current()->getName() == 'about') class="active" @endif><i class="gi gi-circle_info sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.about")</span></a>
    </li>
</ul>