@if($catalogues->count())
{{--<table id="pricing_catalogues" class="table table-vcenter table-striped search-table">
    <thead>
    <tr>
        <th style="width: 150px;" class="text-center">@lang('backend/modules/catering/products.product_id')</th>
        <th>@lang('backend/modules/catering/products.product')</th>
        <th>@lang('backend/modules/catering/products.description')</th>
        <th>@lang('backend/modules/catering/products.status')</th>
        <th>@lang('backend/modules/catering/products.state')</th>
        <th>@lang('backend/modules/catering/products.product')</th>
        <th>@lang('backend/modules/catering/products.description')</th>
        <th>@lang('backend/modules/catering/products.status')</th>
        <th>@lang('backend/modules/catering/products.state')</th>
        <th style="width: 150px;" class="text-center">@lang('backend/modules/catering/products.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($catalogues as $key => $catalogue)
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td>{{ $catalogue->title }}</td>
            --}}{{--<td>{!! html_entity_decode($catalogue->description) !!}</td>--}}{{--
            <td>{{ $catalogue->start_date }}</td>
            <td>{{ $catalogue->end_date }}</td>
            <td>{{ $catalogue->day }}</td>
            <td>{{ $catalogue->start_hour }}</td>
            <td>{{ $catalogue->end_hour }}</td>
            <td>
                @if($catalogue->status == 0)
                    <span class="label label-warning product_status_txt"> @lang('backend/modules/catering/products.status_unavailable') </span>
                @elseif($catalogue->status == 1)
                    <span class="label label-success product_status_txt"> @lang('backend/modules/catering/products.status_new')</span>
                @elseif($catalogue->status == 2)
                    <span class="label label-primary product_status_txt"> @lang('backend/modules/catering/products.status_old')</span>
                @endif
            </td>
            <td>
                @if($catalogue->state == 0)
                    <span class="label label-danger product_state_txt"> @lang('backend/modules/catering/products.state_disabled') </span>
                @elseif($catalogue->state == 1)
                    <span class="label label-success product_state_txt"> @lang('backend/modules/catering/products.state_enabled')</span>
                @endif
            </td>
            --}}{{--<td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>--}}{{--
            <td class="text-center">
                <div class="btn-group btn-group-xs">
                    <a href="{{ route('ct_product_manage', $catalogue->id ) }}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-eye"></i></a>
                    <a id="{{ $catalogue->id }}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger product_delete" data-original-title="Delete"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>--}}

<div id="pricing_catalogues" class="panel-group">
    @foreach($catalogues as $key => $catalogue)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 id="catalogue_title_{{ $catalogue->id }}" class="panel-title pull-left"><i class="fa fa-angle-right"></i> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#pricing_catalogues" href="#catalogue_{{ $catalogue->id }}" aria-expanded="false">{{ $catalogue->title }}</a></h4>
                {{--<button class="btn btn-default pull-right">New</button>--}}
                <div class="btn-group btn-group-xs pull-right">
                    <a href="#" id="{{ $catalogue->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-default catalogue_edit @if($catalogue->init == 0) disabled @endif"><i class="fa fa-pencil"></i></a>
                    {{--<a href="{{ route('ct_product_manage', $catalogue->id ) }}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-eye"></i></a>--}}
                    <a id="{{ $catalogue->id }}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger catalogue_delete @if($catalogue->init == 0) disabled @endif" data-original-title="Delete"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="catalogue_{{ $catalogue->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    <span id="catalogue_description_{{ $catalogue->id }}">{!! html_entity_decode($catalogue->description) !!}</span>
                </div>
                <dl class="dl-horizontal">
                    <dt>@lang('backend/modules/pricing/catalogues.start_date'):</dt>
                    <dd id="catalogue_start_date_{{ $catalogue->id }}">@if(is_null( $catalogue->start_date )) - @else {{ $catalogue->start_date }} @endif</dd>
                    <dt>@lang('backend/modules/pricing/catalogues.end_date'):</dt>
                    <dd id="catalogue_end_date_{{ $catalogue->id }}">@if(is_null($catalogue->end_date)) - @else {{ $catalogue->end_date }} @endif</dd>
                    {{--<dd>Donec id elit non mi porta gravida at eget metus.</dd>--}}
                    <dt>@lang('backend/modules/pricing/catalogues.days'):</dt>
                    <dd id="catalogue_days_{{ $catalogue->id }}" data-days="{{ $catalogue->day }}">
                        <span id="catalogue_day_sun_{{ $catalogue->id }}" @if(($catalogue->day & 1) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.sun')</span>
                        <span id="catalogue_day_mon_{{ $catalogue->id }}" @if(($catalogue->day & 2) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.mon')</span>
                        <span id="catalogue_day_tue_{{ $catalogue->id }}" @if(($catalogue->day & 4) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.tue')</span>
                        <span id="catalogue_day_wed_{{ $catalogue->id }}" @if(($catalogue->day & 8) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.wed')</span>
                        <span id="catalogue_day_thu_{{ $catalogue->id }}" @if(($catalogue->day & 16) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.thu')</span>
                        <span id="catalogue_day_fri_{{ $catalogue->id }}" @if(($catalogue->day & 32) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.fri')</span>
                        <span id="catalogue_day_sat_{{ $catalogue->id }}" @if(($catalogue->day & 64) > 0 ) data-selected="1" class="text-info" @else data-selected="0" class="text-muted" @endif>@lang('backend/modules/pricing/catalogues.sat')</span>
                        {{--{{ $catalogue->day }}--}}
                    </dd>
                    <dt>@lang('backend/modules/pricing/catalogues.start_hour'):</dt>
                    <dd id="catalogue_start_hour_{{ $catalogue->id }}">@if(is_null( $catalogue->start_hour )) - @else {{ $catalogue->start_hour }} @endif</dd>
                    <dt>@lang('backend/modules/pricing/catalogues.end_hour'):</dt>
                    <dd id="catalogue_end_hour_{{ $catalogue->id }}">@if(is_null( $catalogue->end_hour )) - @else {{ $catalogue->end_hour }} @endif</dd>
                </dl>
                <div class="panel-body">
                    @if($catalogue->status == 0)
                        <span class="label label-warning product_status_txt"> @lang('backend/modules/pricing/catalogues.status_unavailable') </span>
                    @elseif($catalogue->status == 1)
                        <span class="label label-success product_status_txt"> @lang('backend/modules/pricing/catalogues.status_new')</span>
                    @elseif($catalogue->status == 2)
                        <span class="label label-primary product_status_txt"> @lang('backend/modules/pricing/catalogues.status_old')</span>
                    @endif
                    /
                    @if($catalogue->state == 0)
                        <span class="label label-danger product_state_txt"> @lang('backend/modules/pricing/catalogues.state_disabled') </span>
                    @elseif($catalogue->state == 1)
                        <span class="label label-success product_state_txt"> @lang('backend/modules/pricing/catalogues.state_enabled')</span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

@else
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action">@lang('backend/modules/catering/quantities.empty_quantity_list')</span></h2>
    </div>
@endif