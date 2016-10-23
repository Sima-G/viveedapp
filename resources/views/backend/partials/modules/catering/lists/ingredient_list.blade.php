@if($ingredients->count())
    <table id="catering-categories" class="table table-bordered table-striped table-vcenter table-hover">
        <thead>
        <tr>
            <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/ingredients.ingredient_id')</th>
            <th>@lang('backend/modules/catering/ingredients.title')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/ingredients.description')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/ingredients.type')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/ingredients.status')</th>
            <th class="text-left hidden-xs">@lang('backend/modules/catering/ingredients.state')</th>
            <th class="text-center ">@lang('backend/modules/catering/ingredients.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ingredients as $key => $ingredient)
            <tr class="clickable" data-toggle="collapse" id="row_{{ $key }}" data-target=".row_{{ $key }}">
                <td class="text-center"><strong>{{ $key+1 }}</strong></td>
                <td class="ingredient_title">{{ $ingredient->title }}</td>

                <td class="hidden-xs ingredient_description">
                    {{ $ingredient->description }}
                </td>

                <td class="hidden-xs ingredient_selection">
                    @if($ingredient->selection == "basic")
                        @lang('backend/modules/catering/ingredients.type_basic')
                    @elseif($ingredient->selection == "optional")
                        @lang('backend/modules/catering/ingredients.type_optional')
                    @endif
                </td>

                <td class="hidden-xs ingredient_status">
                    @if($ingredient->status == 0)
                        <span class="label label-warning ingredient_status_txt"> @lang('backend/modules/catering/categories.status_unavailable') </span>
                    @elseif($ingredient->status == 1)
                        <span class="label label-success ingredient_status_txt"> @lang('backend/modules/catering/categories.status_new')</span>
                    @elseif($ingredient->status == 2)
                        <span class="label label-primary ingredient_status_txt"> @lang('backend/modules/catering/categories.status_old')</span>
                    @endif
                </td>
                <td class="hidden-xs ingredient_state">
                    @if($ingredient->state == 0)
                        <span class="label label-danger ingredient_state_txt"> @lang('backend/modules/catering/categories.state_disabled') </span>
                    @elseif($ingredient->state == 1)
                        <span class="label label-success ingredient_state_txt"> @lang('backend/modules/catering/categories.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-ingredient btn-ingredient-xs">
                        <a href="#" id="{{ $ingredient->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-default ingredient_edit"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="{{ $ingredient->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_delete')" class="btn btn-xs btn-danger ingredient_delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>

            @foreach ($ingredient->ctr_groups as $group)
                <tr class="collapse row_{{ $key }}">
                    <td class="text-center"> <i class="gi gi-check"></i></td>
                    <td id="{{ $group->id }}" class="group_{{ $ingredient->id }}" colspan="6">
                        <span class="text-info"> {{ $group->title }}</span>
                    </td>
                </tr>
            @endforeach

        @endforeach
        </tbody>
    </table>
@else
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action">@lang('backend/modules/catering/ingredients.empty_ingredient_list')</span></h2>
    </div>
@endif