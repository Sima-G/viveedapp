<!-- Overview Widget -->
<div class="widget viveed-updates">
    <div class="widget-simple themed-background-dark">
        <h4 title="@lang('frontend/home.desc_alt_text_session_title')" class="widget-content widget-content-light">
            {{ $config->title }}
        </h4>
    </div>
    <div class="widget-extra themed-background">
        <div class="row text-center">
            <h3 class="widget-content-light">
                <strong><span id="startDt">{{ $config->config_start_date }}</span> - <span id="endDt">{{ $config->config_end_date }}</span></strong>
            </h3>
        </div>
    </div>
    <div class="widget-extra">
        <h4 class="sub-header">Περίληψη</h4>
        {!! html_entity_decode($config->description) !!}
        <input type="hidden" id="currentSdt" value="">
        <a href="{{URL::route('about')}}" id="now_date_btn" type="button" class="btn btn-block btn-primary date_change_btn" value="0">
            @lang('frontend/partials.read_more')
        </a>
        <br>
    </div>
</div>
<!-- END Overview Widget -->