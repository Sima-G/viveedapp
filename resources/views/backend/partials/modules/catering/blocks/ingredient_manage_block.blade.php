<div id="ingredient_manage_block" class="block">
    <!-- Add Contact Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/catering/ingredients.ingredients')</strong> @lang('backend/modules/catering/ingredients.of_product')</h2>
    </div>
    <!-- END Add Contact Title -->

    <div id="info_quantities_manage" class="row" @if($product_action == "edit")style="display: none;"@endif>
        <div class="col-md-12">
            <h1 class="text-success"><i class="fa fa-info-circle"></i> @lang('backend/modules/catering/ingredients.info_message'):</h1>
            <p class="lead">@lang('backend/modules/catering/ingredients.product_ingredients_init_message')</p>
        </div>
    </div>

    <div id="notice_quantities_manage" class="row" @if(($product_action == "create") || ($product->ctr_groups->count() > 0))style="display: none;"@endif>
        <div class="col-md-12">
            <h1 class="text-notice"><i class="fa fa-check-circle"></i> @lang('backend/modules/catering/ingredients.notice_message'):</h1>
            <p class="lead">@lang('backend/modules/catering/ingredients.ingredient_no_group_message')</p>
        </div>
    </div>

    <!-- Add Contact Content -->
    <form id="form_ingredients_manage" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;" @if(($product_action == "create") || $product->ctr_groups->count() == 0)style="display: none;"@endif>

        <div class="form-group">

        <div class="col-md-6">

            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingredient_title">@lang('backend/modules/catering/ingredients.title') <span class="text-danger">*</span></label>
                <div class="col-xs-9">
                    <select id="ingredient_title" name="ingredient_title" class="chosen-select chosen-select-width chosen-select-no-results quantity-control" style="width: 100%;" data-placeholder="@lang('backend/modules/catering/ingredients.title_desc')" style="width: 250px;">
                    </select>
                </div>
            </div>

            {{--<div class="form-group">--}}
                {{--<label class="col-xs-3 control-label" for="ingredient_title">@lang('backend/modules/catering/ingredients.title')--}}
                    {{--<span class="text-danger">*</span>--}}
                {{--</label>--}}
                {{--<div class="col-xs-9">--}}
                    {{--<input type="text" id="ingredient_title" name="ingredient_title" class="form-control" placeholder="@lang('backend/modules/catering/ingredients.title_desc')">--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingredient_description">@lang('backend/modules/catering/ingredients.description')</label>
                <div class="col-xs-9">
                    <textarea id="ingredient_description" name="ingredient_description" rows="4" class="form-control" placeholder="@lang('backend/modules/catering/ingredients.ingredient_description')"></textarea>
                </div>
            </div>

            {{--<div class="form-group">
                <label class="col-xs-3 control-label" for="ingredient_unit">@lang('backend/modules/catering/ingredients.ingredient_unit')
                    <span class="text-danger">*</span>
                </label>
                <div class="col-xs-9">
                    <input type="text" id="ingredient_unit" name="ingredient_unit" class="form-control" placeholder="@lang('backend/modules/catering/ingredients.ingredient_unit_desc')">
                </div>
            </div>--}}
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingredienty_quantity">@lang('backend/modules/catering/ingredients.ingredient_quantity')
                    <span class="text-danger">*</span>
                </label>
                <div class="col-xs-9">
                    <input type="text" id="ingredient_quantity" name="ingredient_quantity" class="form-control" placeholder="@lang('backend/modules/catering/ingredients.ingredient_quantity_desc')">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingredient_status">@lang('backend/modules/catering/ingredients.status') <span class="text-danger">*</span></label>
                <div class="col-xs-9">
                    <select id="ingredient_status" name="ingredient_status" class="form-control">
                        <option value="0">@lang('backend/modules/catering/ingredients.status_unavailable')</option>
                        <option value="1" selected>@lang('backend/modules/catering/ingredients.status_new')</option>
                        <option value="2">@lang('backend/modules/catering/ingredients.status_old')</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">@lang('backend/modules/catering/ingredients.state') <span class="text-danger">*</span></label>
                <div class="col-xs-9">
                    <select id="ingredient_state" name="ingredienty_state" class="form-control">
                        <option value="0">@lang('backend/modules/catering/ingredients.state_disabled')</option>
                        <option value="1" selected>@lang('backend/modules/catering/ingredients.state_enabled')</option>
                    </select>
                </div>
            </div>
        </div>

        </div>

        <div class="form-group form-actions">
            <div id="ingredient_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="ingredient_action_id" id="ingredient_action_id">
                <input type="hidden" name="ingredient-manage-btn-txt" id="ingredient-manage-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/ingredients.ingredient_new_save')">
                <input type="hidden" name="ingredient-manage-btn-txt-alt" id="ingredient-manage-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/ingredients.ingredient_change_save')">
                <input type="hidden" name="ingredient-undo-btn-txt" id="ingredient-undo-btn-txt" value="<i class='fa fa-repeat'></i> @lang('backend/modules/catering/ingredients.ingredient_action_undo')">
                <button type="submit" id="ingredient_manage_btn" class="btn btn-sm btn-primary ingredient_manage_btn">
                    <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/ingredients.ingredient_new_save')
                </button>
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>