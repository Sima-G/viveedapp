{{--Tabs Content--}}
<div class="tab-content">
    @foreach ( $period as $key=>$dt )
        <div id="tab_{{ $dt->format("d-m-Y") }}" @if($key=='0') class="tab-pane active" @else class="tab-pane" @endif>
            <div class="timeline block-content-full">
                <h3 class="timeline-header">@lang('schedule/sessions.timeline') @lang('schedule/sessions.schedule')</h3>
                @if ($sessions->count())
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
                                    <div class="timeline-time">{{ date('H:i', strtotime($session->start_time)) . "-" . date('H:i', strtotime($session->end_time)) }}</div>
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
                                        <p>
                                            @if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author'))
                                                <a href="#" id="{{ $session->id }}" class="btn btn-xs btn-default session_edit"><i class="fa fa-pencil-square-o"></i>@lang('schedule/sessions.session_edit')</a>&nbsp;
                                            @endif
                                            @if((head($userRoles) == 'Admin') || head($userRoles) == 'Editor')
                                                <a href="javascript:void(0)" id="{{ $session->id }}" class="btn btn-xs btn-default session_delete"><i class="fa fa-times-circle-o"></i>@lang('schedule/sessions.session_delete')</a>
                                            @endif
                                        </p>
                                        </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <h4 class="timeline-header"><i class="gi gi-warning_sign"></i> @lang('schedule/sessions.session_empty_msg')</h4>
                @endif
            </div>
        </div>
    @endforeach
</div>
{{--END Tabs Content--}}