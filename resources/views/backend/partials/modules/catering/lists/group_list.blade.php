@if($groups->count())
    <table id="catering-categories" class="table table-bordered table-striped table-vcenter table-hover">
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
        @foreach($groups as $key => $group)
            <tr class="clickable" data-toggle="collapse" id="row_{{ $key }}" data-target=".row_{{ $key }}">
                <td class="text-center"><strong>{{ $key+1 }}</strong></td>
                <td class="group_title">{{ $group->title }}</td>

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
                    @if($group->status == 0)
                        <span class="label label-warning group_status_txt"> @lang('backend/modules/catering/categories.status_unavailable') </span>
                    @elseif($group->status == 1)
                        <span class="label label-success group_status_txt"> @lang('backend/modules/catering/categories.status_new')</span>
                    @elseif($group->status == 2)
                        <span class="label label-primary group_status_txt"> @lang('backend/modules/catering/categories.status_old')</span>
                    @endif
                </td>
                <td class="hidden-xs group_state">
                    @if($group->state == 0)
                        <span class="label label-danger group_state_txt"> @lang('backend/modules/catering/categories.state_disabled') </span>
                    @elseif($group->state == 1)
                        <span class="label label-success group_state_txt"> @lang('backend/modules/catering/categories.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a href="#" id="{{ $group->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-default group_edit"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="{{ $group->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_delete')" class="btn btn-xs btn-danger group_delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>

            @foreach ($group->ct_categories as $category)
                <tr class="collapse row_{{ $key }}">
                    <td class="text-center"> <i class="gi gi-check"></i></td>
                    <td id="{{ $category->id }}" class="category_{{ $group->id }}" colspan="6">
                        <span class="text-info"> {{ $category->title }}</span>
                    </td>
                </tr>
            @endforeach

        @endforeach
        </tbody>
    </table>
@else
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action">@lang('backend/modules/catering/groups.empty_group_list')</span></h2>
    </div>
@endif