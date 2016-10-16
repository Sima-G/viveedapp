<!-- Block Tabs -->
<div id="price_manage_block" class="block full">
    <!-- Block Tabs Title -->
    <div class="block-title">
        <ul class="nav nav-tabs" data-toggle="tabs">
                {{--<li class="active"><a href="#catalogue_{{ $catalogue->id }}">{{ $catalogue->title }}</a></li>--}}
            @foreach($catalogues as $key => $catalogue)
                <li class="@if($key == 0) active @endif"><a href="#catalogue_{{ $catalogue->id }}">{{ $catalogue->title }}</a></li>
            @endforeach
            {{--<li class="active"><a href="#example-tabs2-activity">Activity</a></li>
            <li class=""><a href="#example-tabs2-profile">Profile</a></li>--}}
        </ul>
    </div>
    <!-- END Block Tabs Title -->
{{--{{ dd($product) }}--}}
    <!-- Tabs Content -->
    <div class="tab-content">
        @foreach($catalogues as $key => $catalogue)
            <div class="tab-pane @if($key == 0) active @endif" id="catalogue_{{ $catalogue->id }}">
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label" for="val_skill">@lang('backend/modules/pricing/products.unit_quantity')</label>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="val_skill">@lang('backend/modules/pricing/products.price')</label>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="val_skill">@lang('backend/modules/pricing/products.discount') (%)</label>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="val_skill">@lang('backend/modules/pricing/products.actions')</label>
                    </div>
                </div>
                <!-- Product Universal Price -->
                <div id="" class="row">
                    <form id="qnt_0_ctl_{{ $catalogue->id }}" action="" enctype="multipart/form-data" method="post" class="ctl_{{ $catalogue->id }} price_manage_form" onsubmit="return false;">
                    {{--<div class="row">--}}
                        <div class="col-md-3">
                            <p class="form-control-static"><span id="quantity_0" class=""> @lang('backend/modules/pricing/products.universal_unit_quantity')</span></p>
                            <input type="hidden" name="product_action_id" value="{{ $master_product->id }}">
                            <input type="hidden" name="product_quantity_id" value="0">
                            <input type="hidden" name="product_catalogue_id" value="{{ $catalogue->id }}">
                            <input type="hidden" name="product_init" value="0">
                            <input type="hidden" name="product_status" value="1">
                            <input type="hidden" name="product_state" value="1">


                            {{--<input id="example-disabled-input" name="example-disabled-input" class="form-control" value="@lang('backend/modules/pricing/products.universal_unit_quantity')" disabled="" type="text">--}}
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input id="price_0" name="product_price" class="form-control" placeholder="@lang('backend/modules/pricing/products.price_help').." type="text" value="">
                                <span class="input-group-addon"><i class="gi gi-euro"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input id="discount_0" name="product_discount" class="form-control" placeholder="@lang('backend/modules/pricing/products.discount_help').." type="text">
                                <span class="input-group-addon"><i class="gi gi-star"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                    <span class="input-group-btn">
                                        {{--<button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-default"><i class="fa fa-undo"></i></button>
                                        <button type="button" class="btn btn-info"><i class="fa fa-save"></i></button>--}}
                                        <button type="button" value="0" name="ctl_{{ $catalogue->id }}" class="btn btn-primary price_edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" value="0" name="ctl_{{ $catalogue->id }}" class="btn btn-default price_undo"><i class="fa fa-undo"></i></button>
                                        <button type="button" value="0" name="ctl_{{ $catalogue->id }}" class="btn btn-info price_save"><i class="fa fa-save"></i></button>
                                        {{--<button type="button" value="0" name="catalogue_{{ $catalogue->id }}" class="btn btn-danger price_delete"><i class="fa fa-times"></i></button>--}}
                                    </span>
                            </div>
                        </div>
                    </form>
                </div>
                {{--{{ var_dump($master_product) }}--}}
                <!-- Product Price/Quantity -->
                @foreach($master_product->ct_quantities as $product_quantity)
                    <div id="" class="row">
                        <form id="qnt_{{ $product_quantity->id }}_ctl_{{ $catalogue->id }}" action="" enctype="multipart/form-data" method="post" class="ctl_{{ $catalogue->id }} price_manage_form" onsubmit="return false;">
                            <div class="col-md-3">
                                <p class="form-control-static"><span id="quantity_{{ $product_quantity->id }}" class=""> {{ $product_quantity->quantity }} / {{ $product_quantity->unit }}</span></p>
                                <input type="hidden" name="product_action_id" value="{{ $product_quantity->product }}">
                                <input type="hidden" name="product_quantity_id" value="{{ $product_quantity->id }}">
                                <input type="hidden" name="product_catalogue_id" value="{{ $catalogue->id }}">
                                <input type="hidden" name="product_init" value="1">
                                <input type="hidden" name="product_status" value="1">
                                <input type="hidden" name="product_state" value="1">

                                {{--<input id="quantity_{{ $product->id }}" name="example-disabled-input" class="form-control" value="{{ $product_quantity->quantity }} / {{ $product_quantity->unit }}"disabled="" type="text">--}}
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input id="price_{{ $product_quantity->id }}" name="product_price" class="form-control" placeholder="@lang('backend/modules/pricing/products.price_help').." type="text" value="@if (!empty($master_product->prc_products->where('quantity', $product_quantity->id)->where('catalogue', $catalogue->id)->first()->price)){{ $master_product->prc_products->where('quantity', $product_quantity->id)->where('catalogue', $catalogue->id)->first()->price }}@endif">
                                    <input type="hidden" id="old_price_{{ $product_quantity->id }}" name="old_price" value="@if (!empty($master_product->prc_products->where('quantity', $product_quantity->id)->where('catalogue', $catalogue->id)->first()->price)){{ $master_product->prc_products->where('quantity', $product_quantity->id, 'catalogue', $catalogue->id)->first()->price }}@endif">
                                    {{--{{ dd($master_product->prc_products) }}--}}
                                    <span class="input-group-addon"><i class="gi gi-euro"></i></span>
                                </div>
                            </div>
                            {{--{{ dd($master_product) }}--}}
                            {{--{{ var_dump($product_quantity) }}--}}
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input id="discount_{{ $product_quantity->id }}" name="product_discount" class="form-control" placeholder="@lang('backend/modules/pricing/products.discount_help').." type="text" value="@if (!empty($master_product->prc_products->where('quantity', $product_quantity->id)->where('catalogue', $catalogue->id)->first()->discount)){{ $master_product->prc_products->where('quantity', $product_quantity->id, 'catalogue', $catalogue->id)->first()->discount }}@endif">
                                    <input type="hidden" id="old_discount_{{ $product_quantity->id }}" name="old_discount" value="@if (!empty($master_product->prc_products->where('quantity', $product_quantity->id)->where('catalogue', $catalogue->id)->first()->discount)){{ $master_product->prc_products->where('quantity', $product_quantity->id, 'catalogue', $catalogue->id)->first()->discount }}@endif">
                                    <span class="input-group-addon"><i class="gi gi-star"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span id="input_group_qnt_{{ $product_quantity->id }}_ctl_{{ $catalogue->id }}" class="input-group-btn">
                                        <button type="button" value="{{ $product_quantity->id }}" name="ctl_{{ $catalogue->id }}" class="btn btn-primary price_edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" value="{{ $product_quantity->id }}" name="ctl_{{ $catalogue->id }}" class="btn btn-default price_undo"><i class="fa fa-undo"></i></button>
                                        <button type="button" value="{{ $product_quantity->id }}" name="ctl_{{ $catalogue->id }}" class="btn btn-info price_save"><i class="fa fa-save"></i></button>
                                        {{--<button type="button" value="{{ $product_quantity->id }}" name="ctl_{{ $catalogue->id }}" class="btn btn-danger price_delete"><i class="fa fa-times"></i></button>--}}
                                        {{--<button type="button" value="{{ $product_quantity->id }}" name="ctl_{{ $catalogue->id }}" class="btn "><i class="fa fa-times"></i></button>--}}
                                        {{--<button type="button" class="btn btn-warning price_save"><i class="fa fa-exclamation-circle" data-toggle="tooltip" title="" data-original-title="View all"></i></button>--}}
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <!-- END Tabs Content -->
    {{--@foreach($master_product as $product)
        @foreach($master_product->ct_quantities as $product_quantity)
    @endforeach--}}
    {{--{{ var_dump($master_product) }}--}}
</div>
<!-- END Block Tabs -->