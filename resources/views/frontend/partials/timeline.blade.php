<div style="margin: 0 auto;" class="session_description"><span><h3><i class="material-icons">date_range</i>{{ date("d-m-Y", strtotime($date)) }}</h3></span></div>
@if($sessions_cnt == 0)
<div style="margin: 0 auto;" class="mdl-color-text--grey-600">
    <i style="width:24px; height: 24px;" class="material-icons">info</i>
</div>
<div style="margin: 0 auto;" class="mdl-color-text--grey-600">
    <h4>Δεν βρέθηκαν ομιλίες για την συγκεκριμένη ημέρα..</h4>
</div>
@else
<ul class="timeline">
    @foreach($sessions AS $key => $session)
    @if($key % 2 == 0)
    <li>
        <div class="timeline-badge">
            <a><i class="fa fa-circle" id=""></i></a>
        </div>
    @else
    <li class="timeline-inverted">
        <div class="timeline-badge">
            <a><i class="fa fa-circle invert" id=""></i></a>
        </div>
    @endif
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>{{ $session->title }}</h4>
            </div>
            <div class="timeline-body">
                <div>{!! $session->description !!}</div>
                <p><i class="material-icons">record_voice_over</i>
                    @foreach ($session->speakers as $key => $speaker) @if ($key > 0), @endif
                    <a href="#" class="speaker_of_session" id="{{ $speaker->id }}">{{ $speaker->full_name }}</a>
                    @endforeach
                </p>
            </div>
            <div class="timeline-footer">
                <p class="text-right"><h5><i class="material-icons">alarm</i> {{ $session->start_time }} - {{ $session->end_time }}</h5> </p>
            </div>
        </div>
    </li>
    @endforeach
    <li class="clearfix no-float"></li>
</ul>
@endif

