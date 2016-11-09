<div id="quantity_manage_block" class="block">
    <!-- Add Contact Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/catering/quantities.unit_quantity')</strong> @lang('backend/modules/catering/quantities.of_product')</h2>
    </div>
    <!-- END Add Contact Title -->

    <div id="info_quantities_manage" class="row" @if($product_action == "edit")style="display: none;"@endif>
        <div class="col-md-12">
            <h1 class="text-success"><i class="fa fa-info-circle"></i> @lang('backend/modules/catering/quantities.info_message'):</h1>
            <p class="lead">@lang('backend/modules/catering/quantities.product_quantities_init_message')</p>
        </div>
    </div>

    <!-- Add Contact Content -->
    <form id="form_quantities_manage" action="" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered quantity-manage-form" onsubmit="return false;" @if($product_action == "create")style="display: none;"@endif>

        <div class="form-group">
        <div class="col-md-6">

            <div class="form-group">
                <label class="col-xs-4 control-label" for="quantity_unit">@lang('backend/modules/catering/quantities.unit') <span class="text-danger">*</span></label>
                <div class="col-xs-8">
                    <select id="quantity_unit" name="quantity_unit" class="chosen-select chosen-select-width chosen-select-no-results quantity-control" style="width: 100%;" data-placeholder="@lang('backend/modules/catering/quantities.unit_desc')">
                    </select>
                </div>
            </div>

            {{--<div class="form-group">
                <label class="col-xs-4 control-label" for="quantity_unit">@lang('backend/modules/catering/quantities.unit')
                    <span class="text-danger">*</span>
                </label>
                <div class="col-xs-8">
                    <input type="text" id="quantity_unit" name="quantity_unit" class="form-control" placeholder="@lang('backend/modules/catering/quantities.unit_desc')">
                </div>
            </div>--}}

            <div class="form-group">
                <label class="col-xs-4 control-label" for="quantity_quantity">@lang('backend/modules/catering/quantities.quantity')
                    <span class="text-danger">*</span>
                </label>
                <div class="col-xs-8">
                    <input type="text" id="quantity_quantity" name="quantity_quantity" class="form-control" placeholder="@lang('backend/modules/catering/quantities.quantity_desc')">
                </div>
            </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <label class="col-xs-4 control-label" for="quantity_status">@lang('backend/modules/catering/quantities.status') <span class="text-danger">*</span></label>
            <div class="col-xs-8">
                <select id="quantity_status" name="quantity_status" class="form-control">
                    <option value="0">@lang('backend/modules/catering/categories.status_unavailable')</option>
                    <option value="1" selected>@lang('backend/modules/catering/categories.status_new')</option>
                    <option value="2">@lang('backend/modules/catering/categories.status_old')</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">@lang('backend/modules/catering/quantities.state') <span class="text-danger">*</span></label>
            <div class="col-xs-8">
                <select id="quantity_state" name="quantity_state" class="form-control">
                    <option value="0">@lang('backend/modules/catering/categories.state_disabled')</option>
                    <option value="1" selected>@lang('backend/modules/catering/categories.state_enabled')</option>
                </select>
            </div>
        </div>
        </div>

        </div>

        <div class="form-group form-actions">
            <div id="quantity_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="quantity_category_selected" id="quantity_category_selected" value="0">
                <input type="hidden" name="quantity_action_id" id="quantity_action_id">
                <input type="hidden" name="quantity-manage-btn-txt" id="quantity-manage-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')">
                <input type="hidden" name="quantity-manage-btn-txt-alt" id="quantity-manage-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_change_save')">
                <input type="hidden" name="quantity-undo-btn-txt" id="quantity-undo-btn-txt" value="<i class='fa fa-repeat'></i> @lang('backend/modules/catering/quantities.quantity_action_undo')">
                {{--<input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt" value="@lang('backend/modules/catering/categories.category_action_undo')">--}}
                    <button type="submit" id="quantity_manage_btn" class="btn btn-sm btn-primary quantity-manage-btn">
                        <i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')
                    </button>
                    {{--<button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">
                        <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/categories.category_new_save')
                    </button>--}}
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>