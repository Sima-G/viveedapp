@if($quantities->count())
    <table id="catering-categories" class="table table-bordered table-striped table-vcenter table-hover">
        <thead>
        <tr>
            <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/categories.category_id')</th>
            <th>@lang('backend/modules/catering/quantities.unit')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/quantities.quantity_abbreviation')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/quantities.quantity_decimals')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/quantities.status')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/quantities.state')</th>
            <th class="text-center ">@lang('backend/modules/catering/quantities.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quantities as $key => $quantity)
            <tr class="clickable" data-toggle="collapse" id="row_{{ $key }}" data-target=".row_{{ $key }}">
                <td class="text-center"><strong>{{ $key+1 }}</strong></td>
                <td class="quantity_title">{{ $quantity->title }}</td>

                <td class="hidden-xs quantity_description">
                    {{ $quantity->description }}
                </td>
                <td class="hidden-xs quantity_decimal">
                    {{ $quantity->decimal }}
                </td>

                <td class="hidden-xs quantity_status">
                    @if($quantity->status == 0)
                        <span class="label label-warning quantity_status_txt"> @lang('backend/modules/catering/categories.status_unavailable') </span>
                    @elseif($quantity->status == 1)
                        <span class="label label-success quantity_status_txt"> @lang('backend/modules/catering/categories.status_new')</span>
                    @elseif($quantity->status == 2)
                        <span class="label label-primary quantity_status_txt"> @lang('backend/modules/catering/categories.status_old')</span>
                    @endif
                </td>
                <td class="hidden-xs quantity_state">
                    @if($quantity->state == 0)
                        <span class="label label-danger quantity_state_txt"> @lang('backend/modules/catering/categories.state_disabled') </span>
                    @elseif($quantity->state == 1)
                        <span class="label label-success quantity_state_txt"> @lang('backend/modules/catering/categories.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a href="#" id="{{ $quantity->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-default quantity_edit"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="{{ $quantity->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_delete')" class="btn btn-xs btn-danger quantity_delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>

            @foreach ($quantity->ct_categories as $category)
            <tr class="collapse row_{{ $key }}">
                <td class="text-center"> <i class="gi gi-check"></i></td>
                <td id="{{ $category->id }}" class="category_{{ $quantity->id }}" colspan="6">
                    <span class="text-info"> {{ $category->title }}</span>
                </td>
            </tr>
            @endforeach

        @endforeach
        </tbody>
    </table>

    {{--<table class="table table-responsive table-hover">
        <thead>
        <tr><th>Column</th><th>Column</th><th>Column</th><th>Column</th></tr>
        </thead>
        <tbody>
        <tr class="clickable" data-toggle="collapse" id="row1" data-target=".row1">
            <td><i class="gi gi-plus"></i></td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>Κατηγορία</td>
            <td colspan="3">data</td>
            --}}{{--<td>data</td>--}}{{--
            --}}{{--<td>data</td>--}}{{--
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
        </tr>
        <tr class="clickable" data-toggle="collapse" id="row2" data-target=".row2">
            <td><i class="gi gi-plus"></i></td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
        </tr>
        <tr class="collapse row2">
            <td>- child row</td>
            <td>data 2</td>
            <td>data 2</td>
            <td>data 2</td>
        </tr>
        <tr class="collapse row2">
            <td>- child row</td>
            <td>data 2</td>
            <td>data 2</td>
            <td>data 2</td>
        </tr>
        </tbody>
    </table>--}}

@else
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action">@lang('backend/modules/catering/quantities.empty_quantity_list')</span></h2>
    </div>
@endif