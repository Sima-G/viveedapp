<div class="col-sm-6 col-lg-3">
    <a href="page_ecom_product_edit.html" class="widget widget-hover-effect2">
        <div class="widget-extra themed-background-success">
            <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/products.new_plural')</strong> @lang('backend/modules/catering/products.products')</h4>
        </div>
        <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen">{{ $new_products_cnt }}</span></div>
    </a>
</div>
<div class="col-sm-6 col-lg-3">
    <a href="javascript:void(0)" class="widget widget-hover-effect2">
        <div class="widget-extra themed-background">
            <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/products.enabled_plural')</strong> @lang('backend/modules/catering/products.products')</h4>
        </div>
        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $enabled_products_cnt }}</span></div>
    </a>
</div>
<div class="col-sm-6 col-lg-3">
    <a href="javascript:void(0)" class="widget widget-hover-effect2">
        <div class="widget-extra themed-background-danger">
            <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/products.disabled_plural')</strong> @lang('backend/modules/catering/products.products')</h4>
        </div>
        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $disabled_products_cnt }}</span></div>
    </a>
</div>
<div class="col-sm-6 col-lg-3">
    <a href="javascript:void(0)" class="widget widget-hover-effect2">
        <div class="widget-extra themed-background-dark">
            <h4 class="widget-content-light"><strong>@lang('backend/modules/catering/products.total')</strong> @lang('backend/modules/catering/products.of_products')</h4>
        </div>
        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $total_products_cnt }}</span></div>
    </a>
</div>