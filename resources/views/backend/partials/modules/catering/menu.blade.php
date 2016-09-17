<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li @if(Route::current()->getName() == 'ct_dashboard') class="active" @endif >
            <a href="{{URL::route('ct_dashboard')}}"><i class="fa fa-bar-chart"></i> @lang('backend/modules/catering/menu.view_of_dashboard')</a>
        </li>
        <li @if(Route::current()->getName() == 'ct_products') class="active" @endif >
            <a href="{{URL::route('ct_products')}}"><i class="gi gi-shop_window"></i> @lang('backend/modules/catering/menu.list_of_products')</a>
        </li>
        <li @if(Route::current()->getName() == 'ct_product_create') class="active" @endif >
            <a href="{{URL::route('ct_product_create')}}"><i class="gi gi-shopping_bag"></i> @lang('backend/modules/catering/menu.manage_of_product')</a>
        </li>
        <li @if(Route::current()->getName() == 'ct_categories') class="active" @endif >
            <a href="{{URL::route('ct_categories')}}"><i class="gi gi-bookmark"></i> @lang('backend/modules/catering/menu.manage_of_categories')</a>
        </li>
    </ul>
</div>