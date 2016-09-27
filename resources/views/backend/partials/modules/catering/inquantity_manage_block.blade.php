<div id="inquantity_manage_block" class="block">
    <!-- Add Contact Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/catering/inquantities.unit_inquantity')</strong> @lang('backend/modules/catering/inquantities.of_product')</h2>
    </div>
    <!-- END Add Contact Title -->

    <!-- Add Contact Content -->
    <form id="form_inquantities_manage" action="" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered inquantity-manage-form" onsubmit="return false;">

        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="inquantity_unit">@lang('backend/modules/catering/inquantities.unit')
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-xs-8">
                        <input type="text" id="inquantity_unit" name="inquantity_unit" class="form-control" placeholder="@lang('backend/modules/catering/inquantities.unit_desc')">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="inquantity_inquantity">@lang('backend/modules/catering/inquantities.inquantity')
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-xs-8">
                        <input type="text" id="inquantity_inquantity" name="inquantity_inquantity" class="form-control" placeholder="@lang('backend/modules/catering/inquantities.inquantity_desc')">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="inquantity_status">@lang('backend/modules/catering/inquantities.status') <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <select id="inquantity_status" name="inquantity_status" class="form-control">
                            <option value="0">@lang('backend/modules/catering/categories.status_unavailable')</option>
                            <option value="1" selected>@lang('backend/modules/catering/categories.status_new')</option>
                            <option value="2">@lang('backend/modules/catering/categories.status_old')</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label">@lang('backend/modules/catering/inquantities.state') <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <select id="inquantity_state" name="inquantity_state" class="form-control">
                            <option value="0">@lang('backend/modules/catering/categories.state_disabled')</option>
                            <option value="1" selected>@lang('backend/modules/catering/categories.state_enabled')</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group form-actions">
            <div id="inquantity_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="inquantity_action_id" id="inquantity_action_id">
                <input type="hidden" name="inquantity-manage-btn-txt" id="inquantity-manage-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/inquantities.inquantity_new_save')">
                <input type="hidden" name="inquantity-manage-btn-txt-alt" id="inquantity-manage-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/inquantities.inquantity_change_save')">
                <input type="hidden" name="inquantity-undo-btn-txt" id="inquantity-undo-btn-txt" value="<i class='fa fa-repeat'></i> @lang('backend/modules/catering/inquantities.inquantity_action_undo')">
                {{--<input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt" value="@lang('backend/modules/catering/categories.category_action_undo')">--}}
                <button type="submit" id="inquantity_manage_btn" class="btn btn-sm btn-primary inquantity-manage-btn">
                    <i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/inquantities.inquantity_new_save')
                </button>
                {{--<button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">
                    <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/categories.category_new_save')
                </button>--}}
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>