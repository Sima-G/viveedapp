<ul class="sidebar-nav">
    <li class="sidebar-header">
        <span class="sidebar-header-title">@lang('master.admin')</span>
    </li>
    <li>
        <a href="{{URL::route('users')}}" class=""><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.users')</span></a>
        <a href="{{URL::route('modules')}}" class=""><i class="gi gi-adjust_alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.modules')</span></a>
    </li>
</ul>