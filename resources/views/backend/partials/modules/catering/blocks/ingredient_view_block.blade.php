<div class="block" @if(($product_action == "create") || ($product->ctr_groups->count() == 0))style="display: none;"@endif>
    <!-- Orders Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/catering/ingredients.list')</strong> @lang('backend/modules/catering/ingredients.of_product_ingredients')</h2>
    </div>
    <!-- END Orders Title -->
    <div id="ingredient_list" class="ingredient-manage-list">
    </div>
</div>