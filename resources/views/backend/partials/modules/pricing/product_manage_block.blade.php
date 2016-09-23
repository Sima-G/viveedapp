<div id="product_manage_block" class="block ">
    <!-- Customer Info Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/pricing/products.pricing')</strong> @lang('backend/modules/pricing/products.of_product')</h2>
    </div>
    <!-- END Customer Info Title -->

    <!-- Customer Info -->
    {{--<div class="block-section text-center">--}}
        {{--<h2><span id="manage_product_block_action"></span></h2>--}}
    {{--</div>--}}
    <!-- Add Product Content -->
    <form id="form_products_manage" action="/backend/modules/catering/products/store_product" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered product-manage-form" onsubmit="return false;">

        <div class="form-group">
                <div class="form-group">
                    <label class="col-xs-3 control-label" for="product_title">@lang('backend/modules/pricing/products.title')
                    </label>
                    <div class="col-xs-9">
                        <p class="form-control-static"><span> {{ $master_product->title }}</span></p>
                        {{--<input type="text" id="product_title" name="product_title" class="form-control" value="{{ $product->title }}" disabled="">--}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product_description">@lang('backend/modules/pricing/products.description')</label>
                    <div class="col-md-9">
                        <span id="product_description" class="form-control-static">{!! $master_product->description !!}</span>
                    </div>
                </div>
        </div>

    </form>
    <!-- END Add Contact Content -->


    <!-- END Customer Info -->
</div>