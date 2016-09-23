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
                            <label class="checkbox-inline" for="selected_date_sun">
                                <input id="catalogue_date_sun" name="catalogue_date" value="1" type="checkbox"> @lang('backend/modules/pricing/catalogues.sun')
                            </label>
                            <label class="checkbox-inline" for="selected_date_mon">
                                <input id="catalogue_date_mon" name="catalogue_date" value="2" type="checkbox"> @lang('backend/modules/pricing/catalogues.mon')
                            </label>
                            <label class="checkbox-inline" for="selected_date_tue">
                                <input id="catalogue_date_tue" name="catalogue_date" value="4" type="checkbox"> @lang('backend/modules/pricing/catalogues.tue')
                            </label>
                            <label class="checkbox-inline" for="selected_date_wed">
                                <input id="catalogue_date_wed" name="catalogue_date" value="8" type="checkbox"> @lang('backend/modules/pricing/catalogues.wed')
                            </label>
                            <label class="checkbox-inline" for="selected_date_thu">
                                <input id="catalogue_date_thu" name="catalogue_date" value="16" type="checkbox"> @lang('backend/modules/pricing/catalogues.thu')
                            </label>
                            <label class="checkbox-inline" for="selected_date_fri">
                                <input id="catalogue_date_fri" name="catalogue_date" value="32" type="checkbox"> @lang('backend/modules/pricing/catalogues.fri')
                            </label>
                            <label class="checkbox-inline" for="selected_date_sat">
                                <input id="catalogue_date_sat" name="catalogue_date" value="64" type="checkbox"> @lang('backend/modules/pricing/catalogues.sat')
                            </label>
                                <input type="hidden" name="catalogue_dates" id="catalogue_dates">
                        </div>
                    </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="example-daterange1">@lang('backend/modules/pricing/catalogues.selection_of_dates')</label>
                <div class="col-md-10">
                    <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                        <input type="text" id="catalogue_start_date" name="catalogue_start_date" class="form-control text-center" placeholder="@lang('backend/modules/pricing/catalogues.from')">
                        <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                        <input type="text" id="catalogue_end_date" name="catalogue_end_date" class="form-control text-center" placeholder="@lang('backend/modules/pricing/catalogues.to')">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-timepicker24">@lang('backend/modules/pricing/catalogues.selection_of_hours') (@lang('backend/modules/pricing/catalogues.from'))</label>
                    <div class="col-md-8">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text" id="catalogue_start_hour" name="catalogue_start_hour" class="form-control input-timepicker24">
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
                            <input type="text" id="catalogue_end_hour" name="catalogue_end_hour" class="form-control input-timepicker24">
                            <span class="input-group-btn">
                                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                    </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{--<div id="container"><h1>Add-ons</h1>
            <input type="checkbox" name="ch1" value="10" id="qr1" />Add-on Number 1 - 10 QR <br />
            <input type="checkbox" name="ch1" value="20" id="qr1" />Add-on Number 2 - 20 QR <br />
            <input type="checkbox" name="ch1" value="40" id="qr1" />Add-on Number 3 - 40 QR <br />
            <input type="checkbox" name="ch1" value="60" id="qr1" />Add-on Number 4 - 60 QR <br />
        </div>

        <div> I want more add-ons
            <select id="more" name="more">
                <option value="0 QR">0</option>
                <option value="30 QR">1</option>
                <option value="50 QR">2</option>
                <option value="100 QR">3</option>
            </select>
            <span id="span"></span>
            User total usage: <span id="usertotal"> </span>--}}

        <div class="form-group form-actions">
            <div id="quantity_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="catalogue_action_id" id="quantity_action_id">
                <input type="hidden" name="catalogue_manage_btn_txt" id="catalogue_manage_btn_txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')">
                <input type="hidden" name="catalogue_manage_btn_txt_alt" id="catalogue_manage_btn_txt_alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_change_save')">
                <input type="hidden" name="catalogue_undo_btn_txt" id="catalogue_undo_btn_txt" value="<i class='fa fa-repeat'></i> @lang('backend/modules/catering/quantities.quantity_action_undo')">
                <button type="submit" id="catalogue_manage_btn" class="btn btn-sm btn-primary catalogue-manage-btn">
                    <i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')
                </button>
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>