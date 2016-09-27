@if($ingroups->count())
    <!-- Ingredients Content -->
    <table class="table table-bordered table-striped table-center table-responsive">
        <tbody>

        <tr>
            <th class="text-center" style="width: 100px;"><strong>@lang('backend/modules/catering/ingroups.ingroup_id')</strong></th>
            <th class="hidden-xs" style="width: 15%;">@lang('backend/modules/catering/ingroups.title')</th>
            <th class="text-right hidden-xs" style="width: 10%;">@lang('backend/modules/catering/ingroups.selection')</th>
            <th class="hidden-xs">@lang('backend/modules/catering/ingroups.status')</th>
            <th class="hidden-xs text-center">@lang('backend/modules/catering/ingroups.state')</th>
            <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/ingroups.actions')</th>
        </tr>

        @foreach($ingroups as $key => $ingroup)
            <tr>
                <td class="text-center" style="width: 100px;"><strong>{{ $key + 1 }}</strong></td>
                <td class="hidden-xs ingroup_title_txt" style="width: 15%;">{{ $ingroup->title }}</td>
                <td class="text-right hidden-xs ingroup_selection_txt" style="width: 10%;">
                    @if($ingroup->selection = "single")
                        @lang('backend/modules/catering/ingroups.type_single')
                    @elseif($ingroup->selection = "multiple")
                        @lang('backend/modules/catering/ingroups.type_multiple')
                    @endif
                </td>
                <td class="hidden-xs">
                    @if($ingroup->status == 0)
                        <span class="label label-warning ingroup_status_txt"> @lang('backend/modules/catering/ingredients.status_unavailable') </span>
                    @elseif($ingroup->status == 1)
                        <span class="label label-success ingroup_status_txt"> @lang('backend/modules/catering/ingredients.status_new')</span>
                    @elseif($ingroup->status == 2)
                        <span class="label label-primary ingroup_status_txt"> @lang('backend/modules/catering/ingredients.status_old')</span>
                    @endif
                    <br>
                </td>
                <td class="hidden-xs text-center">
                    @if($ingroup->state == 0)
                        <span class="label label-danger ingroup_state_txt"> @lang('backend/modules/catering/ingredients.state_disabled') </span>
                    @elseif($ingroup->state == 1)
                        <span class="label label-success ingroup_state_txt"> @lang('backend/modules/catering/ingredients.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center" style="width: 70px;">
                    <div class="btn-group btn-group-xs">
                        <a id="{{ $ingroup->id }}" href="#" data-toggle="tooltip" title="" class="btn btn-xs btn-default ingroup_edit" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a id="{{ $ingroup->id }}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger ingroup_delete" data-original-title="Delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- END Orders Content -->
@else
    <div class="block-section text-center">
        <h2><span id="manage_ingroup_block_action">@lang('backend/modules/catering/ingredients.empty_ingredient_list')</span></h2>
    </div>
@endif