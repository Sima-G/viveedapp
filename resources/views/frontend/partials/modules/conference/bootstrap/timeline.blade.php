<input type="hidden" id="timeline_date_value" value="{{ date("d-m-Y", strtotime($date)) }}">
@if($sessions_cnt == 0)
    <div class="text-center"><h1 class="text-muted">@lang('frontend/home.no_session_results')..</h1></div>
@else
    @foreach($sessions AS $key => $session)
        <div href="javascript:void(0)" class="list-group-item">
            <span class="badge">Διάρκεια: 99'</span>
            <h4 class="list-group-item-heading">{{ $session->title }}</h4>
            <h4 class="pull-right">{{ substr($session->start_time, 0, -3) }} - {{ substr($session->end_time, 0, -3) }}</h4>
            <p class="list-group-item-text">{!! $session->description !!}</p>
            <p class="list-group-item-text"><strong>Ομιλητές:</strong>
            @foreach ($session->speakers as $key => $speaker)@if ($key > 0), @endif
                {{ $speaker->full_name }}
            @endforeach
            </p>
        </div>
    @endforeach
@endif