    <div class="col-sm-6 col-lg-3">
        <a href="page_ecom_product_edit.html" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/categories.new')</strong> @lang('backend/modules/catering/categories.categories')</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen">{{ $new_categories_cnt }}</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
                <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/categories.enabled')</strong> @lang('backend/modules/catering/categories.categories')</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $enabled_categories_cnt }}</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-danger">
                <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/categories.disabled')</strong> @lang('backend/modules/catering/categories.categories')</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen">{{ $disabled_categories_cnt }}</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/categories.total')</strong> @lang('backend/modules/catering/categories.of_categories')</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $total_categories_cnt }}</span></div>
        </a>
    </div>