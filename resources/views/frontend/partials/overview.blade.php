    {{--<div class="viveed-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
        <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
            <p title="@lang('frontend/home.desc_alt_text_session_title')"><h2 class="mdl-card__title-text">{{ $config->title }}</h2></p>
        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600">
            <h2 class="mdl-card__title-text"><span id="startDt">{{ $config->config_start_date }}</span> - <span id="endDt">{{ $config->config_end_date }}</span></h2>
            <br/>
            {!! str_limit(html_entity_decode($config->description), $limit = 300, $end = '...') !!}
            <input type="hidden" id="currentSdt" value="">
        </div>
        <div class="mdl-card__actions mdl-card--border mdl-grid">
            <div class="mdl-cell mdl-cell--8-col">
                <a href="{{URL::route('about')}}" id="now_date_btn" class="full-width mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect date_change_btn" value="0">
                    @lang('frontend/partials.read_more')
                </a>
            </div>
            <div class="mdl-cell mdl-cell--4-col no-padding">
            </div>
        </div>
    </div>--}}

    <div class="viveed-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">

        <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
            <p title="@lang('frontend/home.desc_alt_text_session_title')"><h2 class="mdl-card__title-text">{{ $config->title }}</h2></p>
        </div>

        <div class="mdl-card__supporting-text mdl-color-text--grey-600">
            <h2 class="mdl-card__title-text"><span id="startDt">{{ $config->config_start_date }}</span> - <span id="endDt">{{ $config->config_end_date }}</span></h2>
            <br/>
            {{--{!! str_limit(html_entity_decode($config->description), $limit = 300, $end = '...') !!}--}}
            {!! html_entity_decode($config->description) !!}
            <br/>
            <input type="hidden" id="currentSdt" value="">
        </div>
        <div class="mdl-card__actions mdl-card--border mdl-grid">
            <div class="mdl-cell mdl-cell--8-col">
                <a href="{{URL::route('about')}}" id="now_date_btn" class="full-width mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect date_change_btn" value="0">
                    @lang('frontend/partials.read_more')
                </a>
            </div>
            <div class="mdl-cell mdl-cell--4-col no-padding">
            </div>
        </div>

    </div>