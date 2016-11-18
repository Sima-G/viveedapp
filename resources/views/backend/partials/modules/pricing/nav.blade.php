<ul class="sidebar-nav">
    {{--<li @if((Route::current()->getName() == 'prc_catalogues') || (Route::current()->getName() == 'prc_catalogue'))  class="active" @endif>--}}
    <li @if(substr(Route::current()->getName(), 0, 4) == "prc_")  class="active" @endif>
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-coins sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.prc_prices')</span></a>
        <ul>
            <li>
                <a href="{{URL::route('prc_dashboard')}}" @if(Route::current()->getName() == 'prc_dashboard') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ct_dashboard')</span></a>
            </li>
            <li>
                <a href="{{URL::route('prc_catalogues')}}" @if(Route::current()->getName() == 'prc_catalogues') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.settings_desc')">@lang('master.prc_catalogues')</span></a>
            </li>
        </ul>
    </li>
</ul>

<ul class="sidebar-nav">
    <li @if(substr(Route::current()->getName(), 0, 4) == "prc_")  class="active" @endif>
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-list sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.prc_prices')</span></a>
        <ul>
            <li>
                <a href="{{URL::route('prc_ordering')}}" @if(Route::current()->getName() == 'prc_dashboard') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ct_dashboard')</span></a>
            </li>
            <li>
                <a href="{{URL::route('prc_catalogues')}}" @if(Route::current()->getName() == 'prc_catalogues') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.settings_desc')">@lang('master.prc_catalogues')</span></a>
            </li>
        </ul>
    </li>
</ul>