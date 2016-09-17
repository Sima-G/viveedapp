@if($ingredients->count())
    <!-- Ingredients Content -->
    <table class="table table-bordered table-striped table-center table-responsive">
        <tbody>

        <tr>
            <th class="text-center" style="width: 100px;"><strong>@lang('backend/modules/catering/ingredients.ingredient_id')</strong></th>
            <th class="hidden-xs" style="width: 15%;">@lang('backend/modules/catering/ingredients.title')</th>
            <th class="text-right hidden-xs" style="width: 10%;">@lang('backend/modules/catering/ingredients.description')</th>
            <th class="hidden-xs" style="width: 15%;">@lang('backend/modules/catering/ingredients.ingredient_unit')</th>
            <th class="text-right hidden-xs" style="width: 10%;">@lang('backend/modules/catering/ingredients.ingredient')</th>
            <th class="hidden-xs">@lang('backend/modules/catering/ingredients.status')</th>
            <th class="hidden-xs text-center">@lang('backend/modules/catering/ingredients.state')</th>
            <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/ingredients.actions')</th>
        </tr>

        @foreach($ingredients as $key => $ingredient)
            <tr>
                <td class="text-center" style="width: 100px;"><strong>{{ $key + 1 }}</strong></td>
                <td class="hidden-xs ingredient_title_txt" style="width: 15%;">{{ $ingredient->title }}</td>
                <td class="text-right hidden-xs ingredient_description_txt" style="width: 10%;">{{ $ingredient->description }}</td>
                <td class="hidden-xs ingredient_unit_txt" style="width: 15%;">{{ $ingredient->unit }}</td>
                <td class="text-right hidden-xs ingredient_quantity_txt" style="width: 10%;">{{ $ingredient->quantity }}</td>
                <td class="hidden-xs">
                    @if($ingredient->status == 0)
                        <span class="label label-warning ingredient_status_txt"> @lang('backend/modules/catering/ingredients.status_unavailable') </span>
                    @elseif($ingredient->status == 1)
                        <span class="label label-success ingredient_status_txt"> @lang('backend/modules/catering/ingredients.status_new')</span>
                    @elseif($ingredient->status == 2)
                        <span class="label label-primary ingredient_status_txt"> @lang('backend/modules/catering/ingredients.status_old')</span>
                    @endif
                    <br>
                </td>
                <td class="hidden-xs text-center">
                    @if($ingredient->state == 0)
                        <span class="label label-danger ingredient_state_txt"> @lang('backend/modules/catering/ingredients.state_disabled') </span>
                    @elseif($ingredient->state == 1)
                        <span class="label label-success ingredient_state_txt"> @lang('backend/modules/catering/ingredients.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center" style="width: 70px;">
                    <div class="btn-group btn-group-xs">
                        <a id="{{ $ingredient->id }}" href="#" data-toggle="tooltip" title="" class="btn btn-xs btn-default ingredient_edit" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a id="{{ $ingredient->id }}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger ingredient_delete" data-original-title="Delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- END Orders Content -->
@else
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action">@lang('backend/modules/catering/ingredients.empty_ingredient_list')</span></h2>
    </div>
@endif