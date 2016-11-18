{{--<input type="hidden" id="timeline_date_value" value="{{ date("d-m-Y", strtotime($date)) }}">--}}
{{--@if($sessions_cnt == 0)
    <div class="text-center"><h1 class="text-muted">@lang('frontend/home.no_session_results')..</h1></div>
@else
    <ul class="timeline-list">
        @foreach($sessions AS $key => $session)
            <li class="active">
                <div class="timeline-icon"><i class="gi gi-airplane"></i></div>
                <div class="timeline-time"><small> {{ substr($session->start_time, 0, -3) }} - {{ substr($session->end_time, 0, -3) }}</small></div>
                <div class="timeline-content">
                    <p class="push-bit"><strong>{{ $session->title }}</strong></p>
                    <p class="push-bit">{!! $session->description !!}</p>
                    <p class="push-bit">
                        @foreach ($session->speakers as $key => $speaker)@if ($key > 0) @endif
                        --}}{{--<a href="#" class="speaker_of_session" id="{{ $speaker->id }}">{{ $speaker->full_name }}</a>--}}{{--
                        <a href="#" class="btn btn-xs btn-primary" id="{{ $speaker->id }}"><i class="fa fa-user"></i> {{ $speaker->full_name }}</a>
                        @endforeach
                    </p>
                </div>
            </li>
        @endforeach
    </ul>
@endif--}}




{{--Tabs Content--}}
<div class="tab-content">
    @foreach ( $period as $key=>$dt )
        {{--<div id="tab_{{ $dt->format("d-m-Y") }}" @if($key=='0') class="tab-pane active timeline block-content-full" @else class="tab-pane" @endif>--}}
            <div id="tab_{{ $dt->format("d-m-Y") }}" @if($key=='0') class="timeline tab-pane active block-content-full" @else class="timeline tab-pane block-content-full" @endif>
            {{--<div class="timeline block-content-full">--}}
                {{--<h3 class="timeline-header">@lang('schedule/sessions.timeline') @lang('schedule/sessions.schedule')</h3>--}}

                @if ($sessions->where('date', $dt->format("Y-m-d"))->count())
                    <ul class="timeline-list timeline-hover" id="{{ $dt->format("Y-m-d") }}">
                        {{--Getting all table data--}}
                        @foreach($sessions AS $session)
                            @if($session->date == $dt->format("Y-m-d"))
                                <li id="session_{{ $session->id }}">
                                    <div id="title_{{ $session->id }}" style="display: none;">{{ $session->title }}</div>
                                    <div id="start_time_{{ $session->id }}" style="display: none;">{{ $session->start_time }}</div>
                                    <div id="end_time_{{ $session->id }}" style="display: none;">{{ $session->end_time }}</div>
                                    <div id="date_{{ $session->id }}" style="display: none;">{{ $dt->format("d/m/Y") }}</div>
                                    <div id="description_{{ $session->id }}" style="display: none;">{{ $session->description }}</div>
                                    {{--<div class="timeline-icon"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-inverse fa-stack-1x">{{ abs(($end_time - $start_time)/60) }}</i></div>--}}
                                    <div class="timeline-icon"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-inverse fa-stack-1x">{{ abs(($session->end_time - $session->start_time)/60) }}</i></div>
                                    <div class="timeline-time"> {{ date('H:i', strtotime($session->start_time)) . "-" . date('H:i', strtotime($session->end_time)) }}</div>
                                    <div class="timeline-content">
                                        <h3 class="push-bit">{{ $session->title }}</h3>
                                        <span class="push-bit">{!! $session->description !!}</span>
                                        <p class="push-bit"><strong>@lang('schedule/sessions.session_speakers'):</strong>
                                            @foreach ($session->speakers as $key => $speaker)
                                                @if ($key > 0)
                                                    {{ ", " }}
                                                @endif
                                                <span id="{{ $speaker->id }}" class="speaker_{{ $session->id }}" value="{{ $speaker->full_name }}">{{ $speaker->full_name }}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <div class="text-center">
                    <h4 class="timeline-header"><i class="gi gi-warning_sign"></i><br>@lang('schedule/sessions.session_empty_day_msg')</h4>
                    </div>
                @endif
            {{--</div>--}}
            </div>
        {{--</div>--}}
    @endforeach
</div>
{{--END Tabs Content--}}