@if ($speakers->count())
    @foreach($speakers AS $speaker)
        <div id="widget_{{ $speaker->id }}" class="col-sm-6 col-lg-4">
            <div class="widget">
                <div class="widget-simple">
                    <h4 class="widget-content text-right">
                        <span class="btn-group">
                            @if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author'))
                                <a href="#" id="{{ $speaker->id }}" class="btn btn-xs btn-primary speaker_edit" data-toggle="tooltip" title="@lang('schedule/speakers.speaker_edit')"><i class="fa fa-pencil"></i></a>
                            @endif
                            @if((head($userRoles) == 'Admin') || head($userRoles) == 'Editor')
                                @if(empty(json_decode($speaker->sessions, true)))
                                    <a href="javascript:void(0)" id="{{ $speaker->id }}" class="btn btn-xs btn-primary speaker_delete" data-toggle="tooltip" title="@lang('schedule/speakers.speaker_delete')"><i class="fa fa-times"></i></a>
                                @endif
                            @endif
                        </span>
                    </h4>

                    <h4 class="widget-content text-left">
                        <strong>
                            <span id="firstname_{{ $speaker->id }}">{{ $speaker->firstname }}</span>
                            <span id="lastname_{{ $speaker->id }}">{{ $speaker->lastname }}</span>
                        </strong>
                    </h4>

                    <div class="row">
                        <div class="col-md-12">
                            <span id="description_{{ $speaker->id }}"> {!!  $speaker->description  !!} </span>
                            <h4 class="widget-content text-right">
                                    <span class="btn-group">
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip" title="@lang('schedule/speakers.speaker_email')">
                                            <span id="email_{{ $speaker->id }}">{{ $speaker->email }}</span>
                                        </a>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">@lang('schedule/speakers.speakers_list_is_empty')</h3>
        </div>
    </div>
@endif