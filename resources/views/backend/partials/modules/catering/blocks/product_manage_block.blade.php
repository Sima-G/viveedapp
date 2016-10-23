<div id="product_manage_block" class="block ">
    <!-- Customer Info Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <div id="manage_product_block_actions" class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="" data-original-title="Options" aria-expanded="true"><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li>
                        <a class="manage_product_block_anchor" href=""><i class="gi gi-euro pull-right"></i>@lang('backend/modules/catering/products.product_pricing')</a>
                    </li>
                </ul>
            </div>
        </div>
        <h2><strong>@lang('backend/modules/catering/products.info')</strong> @lang('backend/modules/catering/products.of_product')</h2>
    </div>
    <!-- END Customer Info Title -->

    <!-- Customer Info -->
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action"></span></h2>
    </div>
    <!-- Add Product Content -->
    <form id="form_products_manage" action="/backend/modules/catering/products/store_product" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered product-manage-form" onsubmit="return false;">



        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="product_title">@lang('backend/modules/catering/products.title')
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-xs-8">
                        <input type="text" id="product_title" name="product_title" class="form-control" placeholder="@lang('backend/modules/catering/products.title_desc')">
                    </div>
                </div>

                {{--<div class="form-group">
                    <label class="col-xs-4 control-label" for="product_category">@lang('backend/modules/catering/categories.category') <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <select id="product_category" name="product_category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>--}}

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="product_category">@lang('backend/modules/catering/categories.category') <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <select id="product_category" name="product_category" class="chosen-select chosen-select-width chosen-select-no-results quantity-control" style="width: 100%;" data-placeholder="@lang('backend/modules/catering/categories.category_desc')" style="width: 250px;">
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="product_status">@lang('backend/modules/catering/categories.status') <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <select id="product_status" name="product_status" class="form-control">
                            <option value="0">@lang('backend/modules/catering/products.status_unavailable')</option>
                            <option value="1" selected>@lang('backend/modules/catering/products.status_new')</option>
                            <option value="2">@lang('backend/modules/catering/products.status_old')</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label">@lang('backend/modules/catering/products.state') <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <select id="product_state" name="product_state" class="form-control">
                            <option value="0">@lang('backend/modules/catering/products.state_disabled')</option>
                            <option value="1" selected>@lang('backend/modules/catering/products.state_enabled')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-xs-12">
                        <textarea id="product_description" name="product_description" class="ckeditor"></textarea>
                    </div>
                </div>
            </div>
        </div>



        <div class="form-group form-actions">
            <div id="product_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="product_action_id" id="product_action_id">
                <input type="hidden" name="product-manage-btn-txt" id="product-manage-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/products.product_new_save')">
                <input type="hidden" name="product-manage-btn-alt" id="product-manage-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/products.product_change_save')">
                    <button type="submit" id="send-btn" class="btn btn-sm btn-primary product-manage-btn">
                        {{--<i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/products.product_new_save')--}}
                    </button>
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->


    <!-- END Customer Info -->
</div>