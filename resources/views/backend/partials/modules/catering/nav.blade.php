{{--@if( ! empty($schedule_config))--}}
<ul class="sidebar-nav">

    <li @if(substr(Route::current()->getName(), 0, 4) == "ctr_")  class="active" @endif>
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-fast_food sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">@lang('master.catering')</span></a>
        <ul>

            <li>
                <a href="{{URL::route('ctr_dashboard')}}" @if(Route::current()->getName() == 'ctr_dashboard') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ct_dashboard')</span></a>
            </li>

            <li>
                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>@lang('master.ct_products')</a>
                <ul @if(Route::current()->getName() == 'ctr_product_manage') style="display: block;" @else style="display: none;" @endif >
                    <li>
                        <a href="{{URL::route('ctr_products')}}" @if(Route::current()->getName() == 'ctr_products') class="active" @endif ><span id="sessions_nav_span" title="@lang('master.ct_product_manage_desc')">@lang('master.ct_product_manage')</span></a>
                    </li>
                    <li>
                        <a href="{{URL::route('ctr_product_create')}}" @if(Route::current()->getName() == 'ct_product_create') class="active" @endif ><span id="sessions_nav_span" title="@lang('master.ct_product_manage_desc')">@lang('master.ct_product_create')</span></a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{URL::route('ct_categories')}}" @if(Route::current()->getName() == 'ct_categories') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ct_categories')</span></a>
            </li>

            <li>
                <a href="{{URL::route('ctr_quantities')}}" @if(Route::current()->getName() == 'ctr_quantities') class="active notice_init_tooltip" @endif><span id="settings_nav_span" title="@lang('master.ct_categories_description')">@lang('master.ctr_quantities')</span></a>
            </li>

            <li>
                <a href="{{URL::route('ctr_groups')}}" @if(Route::current()->getName() == 'ctr_groups') class="active" @endif><span id="ctr_groups_nav_span" title="@lang('master.ctr_groups_description')">@lang('master.ctr_groups')</span></a>
            </li>

            <li>
                <a href="{{URL::route('ctr_ingredients')}}" @if(Route::current()->getName() == 'ctr_ingredients') class="active" @endif><span id="ctr_ingredients_nav_span" title="@lang('master.ctr_ingredients_description')">@lang('master.ctr_ingredients')</span></a>
            </li>

        </ul>
    </li>
</ul>
{{--@endif--}}