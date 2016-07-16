@extends('frontend.layouts.master')

@section('content')
<div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <div class="vvd_date">
            <h2 id="vvd_date" class="mdl-card__title-text"></h2>
        </div>
        <div class="vvd_time">
            <h2 id="vvd_time" class="mdl-card__title-text vvd_time"></h2>
        </div>
    </div>
    <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
        <div style="margin: 0 auto;" class="session_description"><span><h3>Τρίτη 12 Ιουλίου 2016</h3></span></div>
        <ul class="timeline">
            <li>
                <div class="timeline-badge">
                    <a><i class="fa fa-circle" id=""></i></a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Timeline Event</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Invitamus me testatur sed quod non dum animae tuae lacrimis ut libertatem deum rogus aegritudinis causet. Dicens hoc contra serpentibus isto.</p>
                    </div>
                    <div class="timeline-footer">
                        <p class="text-right">Feb-21-2014</p>
                    </div>
                </div>
            </li>

            <li class="timeline-inverted">
                <div class="timeline-badge">
                    <a><i class="fa fa-circle invert" id=""></i></a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Timeline Event</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Stranguillione in deinde cepit roseo commendavit patris super color est se sed. Virginis plus plorantes abscederem assignato ipsum ait regem Ardalio nos filiae Hellenicus mihi cum. Theophilo litore in lucem in modo invenit quasi nomen magni ergo est se est Apollonius, habet clementiae venit ad nomine sed dominum depressit filia navem.</p>
                    </div>
                    <div class="timeline-footer">
                        <p class="text-right">Feb-23-2014</p>
                    </div>
                </div>
            </li>

            <li>
                <div class="timeline-badge">
                    <a><i class="fa fa-circle" id=""></i></a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Timeline Event</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Advenientibus aliorum eam ad per te sed. Facere debetur aut veneris accedens.</p>
                    </div>
                    <div class="timeline-footer">
                        <p class="text-right">Feb-23-2014</p>
                    </div>
                </div>
            </li>

            <li class="timeline-inverted">
                <div class="timeline-badge">
                    <a><i class="fa fa-circle invert" id=""></i></a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Timeline Event</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Volvitur ingreditur id ait mea vero cum autem quod ait Cumque ego illum vero cum unde beata. Commendavi si non dum est in. Dionysiadem tuos ratio puella ut casus, tunc lacrimas effunditis magister cives Tharsis. Puellae addita verbaque' capellam sanctissima quid, apollinem existimas filiam rex cum autem quod tamen adnuente rediens eam est se in. Peracta licet ad nomine Maria non ait in modo compungi mulierem volutpat.</p>
                    </div>
                    <div class="timeline-footer">
                        <p class="text-right">Feb-27-2014</p>
                    </div>
                </div>
            </li>

            <li>
                <div class="timeline-badge">
                    <a><i class="fa fa-circle" id=""></i></a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Timeline Event</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Adfertur guttae sapientiae ducitur est Apollonius ut a a his domino Lycoridem in lucem. Theophile atque bona dei cenam veniebant est cum. Iusto opes mihi Tyrum in modo compungi mulierem ubi augue eiusdem ordo quos vero diam omni catervis famulorum. Bene dictis ut diem finito servis unde.</p>
                    </div>
                    <div class="timeline-footer">
                        <p class="text-right">Mar-01-2014</p>
                    </div>
                </div>
            </li>

            <li  class="timeline-inverted">
                <div class="timeline-badge">
                    <a><i class="fa fa-circle invert" id=""></i></a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Timeline Event</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Crede respiciens loco dedit beneficio ad suis alteri si puella eius in. Acceptis codicello lenonem in deinde plectrum anni ipsa quod eam est Apollonius.</p>
                    </div>
                    <div class="timeline-footer primary">
                        <p class="text-right">Mar-02-2014</p>
                    </div>
                </div>
            </li>
            <li class="clearfix no-float"></li>
        </ul>
    </div>
    <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
        <div class="viveed-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <p title="@lang('frontend/home.desc_alt_text_session_title')"><h2 class="mdl-card__title-text">{{ $config->title }}</h2></p>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                <h2 class="mdl-card__title-text">{{ $config->config_start_date }} - {{ $config->config_end_date }}</h2>
                <br/>
                @lang('frontend/home.desc_change_date_action'):
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΤΡΕΧΟΥΣΑ</a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΕΠΟΜΕΝΗ</a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΠΡΟΗΓΟΥΜΕΝΗ</a>
            </div>
        </div>
        <div class="demo-separator mdl-cell--1-col"></div>

        {{--<div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                <h3>View options</h3>
                <ul>
                    <li>
                        <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                            <input type="checkbox" id="chkbox1" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Click per object</span>
                        </label>
                    </li>
                    <li>
                        <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                            <input type="checkbox" id="chkbox2" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Views per object</span>
                        </label>
                    </li>
                    <li>
                        <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                            <input type="checkbox" id="chkbox3" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Objects selected</span>
                        </label>
                    </li>
                    <li>
                        <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                            <input type="checkbox" id="chkbox4" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Objects viewed</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change location</a>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">location_on</i>
            </div>
        </div>--}}



    </div>
</div>
    @stop