<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li @if(Route::current()->getName() == 'prc_dashboard') class="active" @endif >
            <a href="{{URL::route('prc_dashboard')}}"><i class="fa fa-bar-chart"></i> @lang('backend/modules/pricing/menu.view_of_dashboard')</a>
        </li>
        <li @if(Route::current()->getName() == 'prc_catalogues') class="active" @endif >
            <a href="{{URL::route('prc_catalogues')}}"><i class="gi gi-notes"></i> @lang('backend/modules/pricing/menu.view_of_catalogues')</a>
        </li>
    </ul>
</div>