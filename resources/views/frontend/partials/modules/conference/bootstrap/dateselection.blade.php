<!-- Dateselection Widget -->
<div class="widget">
    <div class="widget-extra themed-background-dark">
        <h3 title="@lang('frontend/home.desc_alt_text_session_title')" class="widget-content-light">
            {{ $schedule_config->title }}
        </h3>
    </div>
    <div class="widget-extra-full">
        <div class="row text-center">
            <h3>
                <strong><span id="startDt">{{ $config->config_start_date }}</span> - <span id="endDt">{{ $config->config_end_date }}</span></strong><br><br>
                @lang('frontend/home.desc_change_date_action'): <small><span id="currentDt"></span></small>
            </h3>
        </div>

        <div class="row text-center">
            <div class="btn-group">
                <button id="previous_date_btn" href="" class="btn btn-alt btn-primary date_change_btn" value="-1"><i class="fa fa-arrow-left"></i></button>
                <button id="now_date_btn" class="btn btn-alt btn-primary date_change_btn" value="0">@lang('frontend/partials.date_now')</button>
                <button id="next_date_btn" class="btn btn-alt btn-primary date_change_btn" value="1"><i class="fa fa-arrow-right"></i></button>
            </div>
        </div>

    </div>

</div>
<!-- END Dateselection Widget -->