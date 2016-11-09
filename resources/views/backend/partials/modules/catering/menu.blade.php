<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li @if(Route::current()->getName() == 'ctr_dashboard') class="active" @endif >
            <a href="{{URL::route('ctr_dashboard')}}"><i class="fa fa-bar-chart"></i> @lang('backend/modules/catering/menu.view_dashboard') <br> @lang('backend/modules/catering/menu.of_products')</a>
        </li>
        <li @if(Route::current()->getName() == 'ct_products') class="active" @endif >
            <a href="{{URL::route('ctr_products')}}"><i class="gi gi-shop_window"></i> @lang('backend/modules/catering/menu.list') <br> @lang('backend/modules/catering/menu.of_existing_products')</a>
        </li>
        <li @if(Route::current()->getName() == 'ctr_product_create') class="active" @endif >
            <a href="{{URL::route('ctr_product_create')}}"><i class="gi gi-shopping_bag"></i> @lang('backend/modules/catering/menu.manage_create') <br> @lang('backend/modules/catering/menu.of_products')</a>
        </li>
        <li @if(Route::current()->getName() == 'ct_categories') class="active" @endif >
            <a href="{{URL::route('ct_categories')}}"><i class="gi gi-bookmark"></i> @lang('backend/modules/catering/menu.manage') <br> @lang('backend/modules/catering/menu.of_product_categories')</a>
        </li>
        <li @if(Route::current()->getName() == 'ctr_quantities') class="active" @endif >
            <a href="{{URL::route('ctr_quantities')}}"><i class="gi gi-bookmark"></i> @lang('backend/modules/catering/menu.manage') <br> @lang('backend/modules/catering/menu.of_product_quantities')</a>
        </li>
        <li @if(Route::current()->getName() == 'ctr_groups') class="active" @endif >
            <a href="{{URL::route('ctr_groups')}}"><i class="gi gi-bookmark"></i> @lang('backend/modules/catering/menu.manage') <br> @lang('backend/modules/catering/menu.of_ingredient_groups')</a>
        </li>
        <li @if(Route::current()->getName() == 'ctr_ingredients') class="active" @endif >
            <a href="{{URL::route('ctr_ingredients')}}"><i class="gi gi-bookmark"></i> @lang('backend/modules/catering/menu.manage') <br> @lang('backend/modules/catering/menu.of_product_ingredients')</a>
        </li>
    </ul>
</div>