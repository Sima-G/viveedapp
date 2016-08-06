<div class="viveed-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
    <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
        <p title="@lang('frontend/home.desc_alt_text_session_title')"><h2 class="mdl-card__title-text">{{ $schedule_config->title }}</h2></p>
    </div>
    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
        <h2 class="mdl-card__title-text"><span id="startDt">{{ $config->config_start_date }}</span> - <span id="endDt">{{ $config->config_end_date }}</span></h2>
        <br/>
        @lang('frontend/home.desc_change_date_action'): <span id="currentDt"></span>
        <input type="hidden" id="currentSdt" value="">
    </div>
    <div class="mdl-card__actions mdl-card--border mdl-grid">

        <div class="mdl-cell mdl-cell--4-col">
            <!-- Raised button -->
            <button id="previous_date_btn" class="mdl-button mdl-js-button mdl-button--raised date_change_btn" value="-1">
                <i class="material-icons">skip_previous</i>
            </button>
            {{--<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="material-icons">skip_previous</i></a>--}}
        </div>
        <div class="mdl-cell mdl-cell--4-col no-padding">

            <!-- Raised button with ripple -->
            <button id="now_date_btn" class="full-width mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect date_change_btn" value="0">
                ΤΡΕΧΟΥΣΑ
            </button>

            {{--<center>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect date_change_btn">ΤΡΕΧΟΥΣΑ</a>
            </center>--}}
        </div>
        <div class="mdl-cell mdl-cell--4-col">
            <!-- Raised button -->
            <button id="next_date_btn" class="mdl-button mdl-js-button mdl-button--raised date_change_btn" value="1">
                <i class="material-icons">skip_next</i>
            </button>
            {{--<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="material-icons">skip_next</i></a>--}}
        </div>

        {{--<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΤΡΕΧΟΥΣΑ</a>
        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΕΠΟΜΕΝΗ</a>
        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΠΡΟΗΓΟΥΜΕΝΗ</a>--}}
    </div>
</div>