<table id="catering-categories" class="table table-bordered table-striped table-vcenter">
    <thead>
    <tr>
        <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/categories.category_id')</th>
        <th>@lang('backend/modules/catering/categories.category_title')</th>
        <th class="text-left hidden-xs">@lang('backend/modules/catering/categories.status')</th>
        <th class="text-left hidden-xs">@lang('backend/modules/catering/categories.state')</th>
        <th class="text-center ">@lang('backend/modules/catering/categories.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $key => $category)
        <tr>
            <td class="text-center"><strong>{{ $key+1 }}</strong></td>
            <td class="category_title">{{ $category->title }}</td>
            <td class="hidden-xs category_status">
                @if($category->status == 0)
                    <span class="label label-warning category_status_txt"> @lang('backend/modules/catering/categories.status_unavailable') </span>
                @elseif($category->status == 1)
                    <span class="label label-success category_status_txt"> @lang('backend/modules/catering/categories.status_new')</span>
                @elseif($category->status == 2)
                    <span class="label label-primary category_status_txt"> @lang('backend/modules/catering/categories.status_old')</span>
                @endif
            </td>
            <td class="hidden-xs category_state">
                @if($category->state == 0)
                    <span class="label label-danger category_state_txt"> @lang('backend/modules/catering/categories.state_disabled') </span>
                @elseif($category->state == 1)
                    <span class="label label-success category_state_txt"> @lang('backend/modules/catering/categories.state_enabled')</span>
                @endif
            </td>
            <td class="text-center">
                <div class="btn-group btn-group-xs">
                    <a href="#" id="{{ $category->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-default category_edit"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0)" id="{{ $category->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_delete')" class="btn btn-xs btn-danger category_delete"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>