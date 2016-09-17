<div id="catalogue_manage_block" class="block">
    <!-- Add Contact Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/pricing/catalogues.catalogue')</strong> @lang('backend/modules/pricing/catalogues.of_prices')</h2>
    </div>
    <!-- END Add Contact Title -->

    <!-- Add Contact Content -->
    <form id="form_catalogues_manage" action="" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered quantity-manage-form" onsubmit="return false;">

        <div class="form-group">
                        <div class="form-group">
                            <label class="col-xs-2 control-label" for="catalogue_title">@lang('backend/modules/pricing/catalogues.title')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-xs-10">
                                <input type="text" id="catalogue_title" name="catalogue_title" class="form-control" placeholder="@lang('backend/modules/pricing/catalogues.catalogue_title')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-2 control-label" for="catalogue_description">@lang('backend/modules/pricing/catalogues.description')</label>
                            <div class="col-xs-10">
                                <textarea id="catalogue_description" name="catalogue_description" rows="2" class="form-control" placeholder="@lang('backend/modules/pricing/catalogues.catalogue_description')"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-4 control-label" for="catalogue_status">@lang('backend/modules/catering/quantities.status') <span class="text-danger">*</span></label>
                                <div class="col-xs-8">
                                    <select id="catalogue_status" name="catalogue_status" class="form-control">
                                        <option value="0">@lang('backend/modules/pricing/catalogues.status_unavailable')</option>
                                        <option value="1" selected>@lang('backend/modules/pricing/catalogues.status_new')</option>
                                        <option value="2">@lang('backend/modules/pricing/catalogues.status_old')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-4 control-label">@lang('backend/modules/catering/quantities.state') <span class="text-danger">*</span></label>
                                <div class="col-xs-8">
                                    <select id="catalogue_state" name="catalogue_state" class="form-control">
                                        <option value="0">@lang('backend/modules/pricing/catalogues.state_disabled')</option>
                                        <option value="1" selected>@lang('backend/modules/pricing/catalogues.state_enabled')</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">@lang('backend/modules/pricing/catalogues.selection_of_days')</label>
                        <div class="col-md-10">
                            <label class="checkbox-inline" for="example-inline-checkbox1">
                                <input id="example-inline-checkbox1" name="example-inline-checkbox1" value="1" type="checkbox"> @lang('backend/modules/pricing/catalogues.sun')
                            </label>
                            <label class="checkbox-inline" for="example-inline-checkbox2">
                                <input id="example-inline-checkbox2" name="example-inline-checkbox2" value="2" type="checkbox"> @lang('backend/modules/pricing/catalogues.mon')
                            </label>
                            <label class="checkbox-inline" for="example-inline-checkbox3">
                                <input id="example-inline-checkbox3" name="example-inline-checkbox3" value="4" type="checkbox"> @lang('backend/modules/pricing/catalogues.tue')
                            </label>
                            <label class="checkbox-inline" for="example-inline-checkbox1">
                                <input id="example-inline-checkbox1" name="example-inline-checkbox1" value="8" type="checkbox"> @lang('backend/modules/pricing/catalogues.wed')
                            </label>
                            <label class="checkbox-inline" for="example-inline-checkbox2">
                                <input id="example-inline-checkbox2" name="example-inline-checkbox2" value="16" type="checkbox"> @lang('backend/modules/pricing/catalogues.thu')
                            </label>
                            <label class="checkbox-inline" for="example-inline-checkbox3">
                                <input id="example-inline-checkbox3" name="example-inline-checkbox3" value="32" type="checkbox"> @lang('backend/modules/pricing/catalogues.fri')
                            </label>
                            <label class="checkbox-inline" for="example-inline-checkbox1">
                                <input id="example-inline-checkbox1" name="example-inline-checkbox1" value="64" type="checkbox"> @lang('backend/modules/pricing/catalogues.sat')
                            </label>
                        </div>
                    </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="example-daterange1">@lang('backend/modules/pricing/catalogues.selection_of_dates')</label>
                <div class="col-md-10">
                    <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                        <input type="text" id="example-daterange1" name="example-daterange1" class="form-control text-center" placeholder="@lang('backend/modules/pricing/catalogues.from')">
                        <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                        <input type="text" id="example-daterange2" name="example-daterange2" class="form-control text-center" placeholder="@lang('backend/modules/pricing/catalogues.to')">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-timepicker24">@lang('backend/modules/pricing/catalogues.selection_of_hours') (@lang('backend/modules/pricing/catalogues.from'))</label>
                    <div class="col-md-8">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text" id="example-timepicker24" name="example-timepicker24" class="form-control input-timepicker24">
                            <span class="input-group-btn">
                                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-timepicker24">@lang('backend/modules/pricing/catalogues.selection_of_hours') (@lang('backend/modules/pricing/catalogues.to'))</label>
                    <div class="col-md-8">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text" id="example-timepicker24" name="example-timepicker24" class="form-control input-timepicker24">
                            <span class="input-group-btn">
                                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                    </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group form-actions">
            <div id="quantity_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="quantity_action_id" id="quantity_action_id">
                <input type="hidden" name="quantity-manage-btn-txt" id="quantity-manage-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')">
                <input type="hidden" name="quantity-manage-btn-txt-alt" id="quantity-manage-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_change_save')">
                <input type="hidden" name="quantity-undo-btn-txt" id="quantity-undo-btn-txt" value="<i class='fa fa-repeat'></i> @lang('backend/modules/catering/quantities.quantity_action_undo')">
                <button type="submit" id="quantity_manage_btn" class="btn btn-sm btn-primary quantity-manage-btn">
                    <i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')
                </button>
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>