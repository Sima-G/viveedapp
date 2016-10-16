@extends('frontend.layouts.material.master')

@section('content')
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">feedback</i><span
                    class="mdl-layout-title">&nbsp;&nbsp;@lang("frontend/master.about")</span>
        </div>
        <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
            <div style="margin: 0 auto;" class="session_description mdl-card__title mdl-card--expand">
                <span><h2 class="mdl-card__title-text">{{ $config->title }}</h2></span>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-card__actions mdl-card--border">
                <span><h2 class="mdl-card__title-text">{{ $config->config_start_date }}
                        - {{ $config->config_end_date }}</h2></span>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-card__actions mdl-card--border vvd_content"><span>{!! $config->description  !!}</span></div>
        </div>
    </div>
@stop