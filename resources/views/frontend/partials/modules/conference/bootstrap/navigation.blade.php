<!-- Conference Navigation -->
<ul class="sidebar-nav">
    <li>
        <a href="{{URL::route('preview')}}" class=""><i class="gi gi-home sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.home")</span></a>
    </li>
    <li>
        <a href="{{URL::route('session_list')}}" class=""><i class="gi gi-notes sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.sessions")</span></a>
    </li>
    <li>
        <a href="{{URL::route('speaker_list')}}" class=""><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.speakers")</span></a>
    </li>
    <li>
        <a href="{{URL::route('about')}}" class=""><i class="gi gi-circle_info sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang("frontend/master.about")</span></a>
    </li>
</ul>
<!-- END Conference Navigation -->