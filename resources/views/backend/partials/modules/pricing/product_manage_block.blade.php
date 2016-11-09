{{--{{ dd($master_product) }}--}}
<div id="product_manage_block" class="block ">
    <!-- Customer Info Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="" data-original-title="Options" aria-expanded="true"><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li>
                        <a href="{{URL::route('ctr_product_manage', $master_product->id)}}"><i class="gi gi-shopping_bag pull-right"></i>@lang('backend/modules/pricing/products.product_manage')</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{URL::route('ctr_products')}}"><i class="gi gi-shop_window fa-fw pull-right"></i>@lang('backend/modules/pricing/products.product_list')</a>
                    </li>
                </ul>
            </div>
        </div>
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