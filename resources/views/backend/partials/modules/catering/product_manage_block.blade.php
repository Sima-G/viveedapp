<div id="product_manage_block" class="block">
    <!-- Customer Info Title -->
    <div class="block-title">
        <h2><i class="gi gi-shopping_bag"></i> <strong>@lang('backend/modules/catering/products.info')</strong> @lang('backend/modules/catering/products.of_product') (Επεξεργασία υπάρχοντος)</h2>
    </div>
    <!-- END Customer Info Title -->

    <!-- Customer Info -->
    <div class="block-section text-center">
        <a href="javascript:void(0)">
            <img src="img/placeholders/avatars/avatar4@2x.jpg" alt="avatar" class="img-circle">
        </a>
    </div>
    <!-- Add Product Content -->
    <form id="form_products_manage" action="/backend/modules/catering/products/store_product" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

        <div class="form-group">
            <label class="col-xs-3 control-label" for="product_title">@lang('backend/modules/catering/products.title')
                <span class="text-danger">*</span>
            </label>
            <div class="col-xs-9">
                <input type="text" id="product_title" name="product_title" class="form-control" placeholder="@lang('backend/modules/catering/products.title_desc')">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label" for="product_status">@lang('backend/modules/catering/categories.status') <span class="text-danger">*</span></label>
            <div class="col-xs-9">
                <select id="product_status" name="product_status" class="form-control">
                    <option value="0">@lang('backend/modules/catering/products.status_unavailable')</option>
                    <option value="1" selected>@lang('backend/modules/catering/products.status_new')</option>
                    <option value="2">@lang('backend/modules/catering/products.status_old')</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">@lang('backend/modules/catering/products.state') <span class="text-danger">*</span></label>
            <div class="col-xs-9">
                <select id="product_state" name="product_state" class="form-control">
                    <option value="0">@lang('backend/modules/catering/products.state_disabled')</option>
                    <option value="1" selected>@lang('backend/modules/catering/products.state_enabled')</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label" for="product_description">@lang('backend/modules/catering/products.description')</label>
            <div class="col-xs-9">
                <textarea id="product_description" name="product_description" class="ckeditor"></textarea>
            </div>
        </div>

        <div class="form-group form-actions">
            <div id="product_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="product_action_id" id="product_action_id">
                <input type="hidden" name="send-btn-txt" id="send-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/products.product_new_save')">
                <input type="hidden" name="send-btn-txt-alt" id="send-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/products.product_change_save')">
                <input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt" value="@lang('backend/modules/catering/products.product_action_undo')">
                @if((head($userRoles) == 'Admin') || head($userRoles) == 'Editor')
                    <button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">
                        <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/products.product_new_save')
                    </button>
                @endif
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->


    <!-- END Customer Info -->
</div>