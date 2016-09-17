<div id="product_view_block" class="block">
    <!-- Customer Info Title -->
    <div class="block-title">
        <h2><i class="gi gi-shopping_bag"></i> <strong>@lang('backend/modules/catering/products.info')</strong> @lang('backend/modules/catering/products.of_product')</h2>
    </div>
    <!-- END Customer Info Title -->

    <!-- Customer Info -->
    <div class="block-section text-center">
        {{--<a href="javascript:void(0)">
            <img src="img/placeholders/avatars/avatar4@2x.jpg" alt="avatar" class="img-circle">
        </a>--}}
        <h4>
            <strong>{{ $product->title }}</strong><br><small></small>
        </h4>
    </div>
    <table class="table table-borderless table-striped table-vcenter">
        <tbody>
        <tr>
            <td class="text-right" style="width: 50%;"><strong>@lang('backend/modules/catering/products.description')</strong></td>
            <td>{!! $product->description !!}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>@lang('backend/modules/catering/products.status')</strong></td>
            <td>
                @if($product->status == 0)
                    <span class="label label-warning"> @lang('backend/modules/catering/products.status_unavailable') </span>
                @elseif($product->status == 1)
                    <span class="label label-success"> @lang('backend/modules/catering/products.status_new') </span>
                @elseif($product->status == 2)
                    <span class="label label-primary"> @lang('backend/modules/catering/products.status_old') </span>
                @endif
            </td>
        </tr>
        <tr>
            <td class="text-right"><strong>@lang('backend/modules/catering/products.state')</strong></td>
            <td>
                @if($product->status == 0)
                    <span class="label label-danger"> @lang('backend/modules/catering/products.state_disabled') </span>
                @elseif($product->status == 1)
                    <span class="label label-success"><i class="fa fa-check"></i>  @lang('backend/modules/catering/products.state_enabled') </span>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
    <!-- END Customer Info -->

    <div class="block-section text-center">
        <div id="product_actions" class="">
            <form action="" enctype="multipart/form-data" method="get" onsubmit="return false;">
                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                <button type="submit" id="send-btn" class="btn btn-sm btn-primary product-manage-btn">
                    <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/products.product_edit')
                </button>
            </form>
        </div>
    </div>
</div>