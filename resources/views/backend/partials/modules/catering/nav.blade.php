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
                        <a href="{{URL::route('ct_product_create')}}" @if(Route::current()->getName() == 'ct_product_create') class="active" @endif ><span id="sessions_nav_span" title="@lang('master.ct_product_manage_desc')">@lang('master.ct_product_create')</span></a>
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