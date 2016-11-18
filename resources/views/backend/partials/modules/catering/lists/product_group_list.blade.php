@if($products->count())
    <table id="product_catering_groups" class="table table-bordered table-striped table-vcenter table-hover" data-count="{{ $products->count() }}">
        <thead>
        <tr>
            <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/groups.group_id')</th>
            <th>@lang('backend/modules/catering/groups.title')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/groups.description')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/groups.type')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/groups.status')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/groups.state')</th>
            <th class="text-center ">@lang('backend/modules/catering/groups.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products->first()->ctr_groups as $key => $group)
            <tr class="clickable" data-toggle="collapse" id="row_{{ $key }}" data-target=".row_{{ $key }}">
                <td class="text-center"><strong>{{ $key+1 }}</strong></td>
                <td class="group_title">
                    <span class="group_title_id" data-value="{{ $group->id }}">
                        {{ $group->title }}
                    </span>
                </td>

                <td class="hidden-xs group_description">
                    {{ $group->description }}
                </td>

                <td class="hidden-xs group_selection">
                    @if($group->selection == "single")
                        @lang('backend/modules/catering/groups.type_single')
                    @elseif($group->selection == "multiple")
                        @lang('backend/modules/catering/groups.type_multiple')
                    @endif
                </td>

                <td class="hidden-xs group_status">
                    @if($group->pivot->status == 0)
                        <span class="label label-warning group_status_txt"> @lang('backend/modules/catering/categories.status_unavailable') </span>
                    @elseif($group->pivot->status == 1)
                        <span class="label label-success group_status_txt"> @lang('backend/modules/catering/categories.status_new')</span>
                    @elseif($group->pivot->status == 2)
                        <span class="label label-primary group_status_txt"> @lang('backend/modules/catering/categories.status_old')</span>
                    @endif
                </td>
                <td class="hidden-xs group_state">
                    @if($group->pivot->state == 0)
                        <span class="label label-danger group_state_txt"> @lang('backend/modules/catering/categories.state_disabled') </span>
                    @elseif($group->pivot->state == 1)
                        <span class="label label-success group_state_txt"> @lang('backend/modules/catering/categories.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a href="#" id="{{ $group->pivot->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-default group_edit"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="{{ $group->pivot->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_delete')" class="btn btn-xs btn-danger group_delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="block-section text-center">
        <h2><span id="manage_product_group_block_action">@lang('backend/modules/catering/groups.empty_group_list')</span></h2>
    </div>
@endif