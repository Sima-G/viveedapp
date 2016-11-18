@if($products->count())
    <table id="product_catering_ingredients" class="table table-bordered table-striped table-vcenter table-hover" data-count="{{ $products->count() }}">
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
        @foreach($products->first()->ctr_ingredients as $key => $ingredient)
            <tr class="clickable" data-toggle="collapse" id="row_{{ $key }}" data-target=".row_{{ $key }}">
                <td class="text-center"><strong>{{ $key+1 }}</strong></td>
                <td class="ingredient_title">
                    <span class="ingredient_title_id" data-value="{{ $ingredient->id }}">
                        {{ $ingredient->title }}
                    </span>
                </td>

                <td class="hidden-xs ingredient_description">
                    {{ $ingredient->description }}
                </td>

                <td class="hidden-xs ingredient_quantity">
                    {{ $ingredient->pivot->quantity }}
                </td>

                <td class="hidden-xs ingredient_status">
                    @if($ingredient->pivot->status == 0)
                        <span class="label label-warning ingredient_status_txt"> @lang('backend/modules/catering/categories.status_unavailable') </span>
                    @elseif($ingredient->pivot->status == 1)
                        <span class="label label-success ingredient_status_txt"> @lang('backend/modules/catering/categories.status_new')</span>
                    @elseif($ingredient->pivot->status == 2)
                        <span class="label label-primary ingredient_status_txt"> @lang('backend/modules/catering/categories.status_old')</span>
                    @endif
                </td>
                <td class="hidden-xs ingredient_state">
                    @if($ingredient->pivot->state == 0)
                        <span class="label label-danger ingredient_state_txt"> @lang('backend/modules/catering/categories.state_disabled') </span>
                    @elseif($ingredient->pivot->state == 1)
                        <span class="label label-success ingredient_state_txt"> @lang('backend/modules/catering/categories.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a href="#" id="{{ $ingredient->pivot->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_edit')" class="btn btn-xs btn-default ingredient_edit"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="{{ $ingredient->pivot->id }}" data-toggle="tooltip" title="@lang('backend/modules/catering/categories.category_delete')" class="btn btn-xs btn-danger ingredient_delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="block-section text-center">
        <h2><span id="manage_product_ingredient_block_action">@lang('backend/modules/catering/ingredients.empty_ingredient_list')</span></h2>
    </div>
@endif