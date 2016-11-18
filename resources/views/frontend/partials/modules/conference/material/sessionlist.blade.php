@if($sessions_cnt == 0)
    <div style="margin: 0 auto;" class="mdl-color-text--grey-600">
        <i style="width:24px; height: 24px;" class="material-icons">info</i>
    </div>
    <div style="margin: 0 auto;" class="mdl-color-text--grey-600">
        <h4>@lang('frontend/home.no_session_results')..</h4>
    </div>
@else
    @foreach($sessions AS $session)
    <div class="demo-separator mdl-cell--1-col"></div>
    <div class="mdl-card__actions mdl-card--border">
        <span><h4>{{ $session->title }}</h4></span>
    </div>
    <div class="">
        <span>{!! $session->description  !!}</span>
    </div>
    <div class="">
        <span>
            @foreach ($session->speakers as $key => $speaker) @if ($key > 0), @endif
            <a href="#" class="speaker_of_session" id="{{ $speaker->id }}">{{ $speaker->full_name }}</a>
            @endforeach
        </span>
    </div>
    @endforeach
@endif

