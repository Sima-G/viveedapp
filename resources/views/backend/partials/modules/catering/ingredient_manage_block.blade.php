<div class="block">
    <!-- Add Contact Title -->
    <div class="block-title">
        <h2><i class="gi gi-pot"></i> <strong>@lang('backend/modules/catering/products.ingredients')</strong> @lang('backend/modules/catering/products.of_product')</h2>
    </div>
    <!-- END Add Contact Title -->

    <!-- Add Contact Content -->
    <form id="form_products" action="/backend/schedule/speakers/store" enctype="multipart/form-data"
          method="post"
          class="form-horizontal form-bordered" onsubmit="return false;">

        <div class="form-group">
            <label class="col-xs-3 control-label" for="category_title">@lang('backend/modules/catering/categories.title')
                <span class="text-danger">*</span>
            </label>
            <div class="col-xs-9">
                <input type="text" id="ingredient_title" name="ingredient_title" class="form-control" placeholder="@lang('backend/modules/catering/categories.title_desc')">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label" for="ingredient_status">@lang('backend/modules/catering/categories.status') <span class="text-danger">*</span></label>
            <div class="col-xs-9">
                <select id="ingredient_status" name="ingredient_status" class="form-control">
                    <option value="0">@lang('backend/modules/catering/categories.status_unavailable')</option>
                    <option value="1" selected>@lang('backend/modules/catering/categories.status_new')</option>
                    <option value="2">@lang('backend/modules/catering/categories.status_old')</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">@lang('backend/modules/catering/categories.state') <span class="text-danger">*</span></label>
            <div class="col-xs-9">
                <select id="ingredient_state" name="ingredienty_state" class="form-control">
                    <option value="0">@lang('backend/modules/catering/categories.state_disabled')</option>
                    <option value="1" selected>@lang('backend/modules/catering/categories.state_enabled')</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label" for="ingredient_description">@lang('backend/modules/catering/categories.description')</label>
            <div class="col-xs-9">
                <textarea id="ingredient_description" name="ingredient_description" class="ckeditor"></textarea>
            </div>
        </div>

        <div class="form-group form-actions">
            <div id="category_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="category_action_id" id="category_action_id">
                <input type="hidden" name="send-btn-txt" id="send-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/categories.category_new_save')">
                <input type="hidden" name="send-btn-txt-alt" id="send-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/categories.category_change_save')">
                <input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt" value="@lang('backend/modules/catering/categories.category_action_undo')">
                    <button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">
                        <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/categories.category_new_save')
                    </button>
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>