<!-- Block Tabs -->
<div id="price_manage_block" class="block full">
    <!-- Block Tabs Title -->
    <div class="block-title">
        <ul class="nav nav-tabs" data-toggle="tabs">
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
                <div id="quantity_" class="row catalogue_{{ $catalogue->id }}">
                {{--<div class="row">--}}
                    <div class="col-md-3">
                        <p class="form-control-static"><span id="quantity_" class=""> @lang('backend/modules/pricing/products.universal_unit_quantity')</span></p>
                        {{--<input id="example-disabled-input" name="example-disabled-input" class="form-control" value="@lang('backend/modules/pricing/products.universal_unit_quantity')" disabled="" type="text">--}}
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="" name="val_username" class="form-control" placeholder="Your username.." type="text" value="">
                            <span class="input-group-addon"><i class="gi gi-euro"></i></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="val_username" name="val_username" class="form-control" placeholder="Your username.." type="text">
                            <span class="input-group-addon"><i class="gi gi-star"></i></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                                <span class="input-group-btn">
                                    {{--<button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-undo"></i></button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-save"></i></button>--}}
                                    <button type="button" value="0" name="catalogue_{{ $catalogue->id }}" class="btn btn-primary price_edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" value="0" name="catalogue_{{ $catalogue->id }}" class="btn btn-default price_undo"><i class="fa fa-undo"></i></button>
                                    <button type="button" value="0" name="catalogue_{{ $catalogue->id }}" class="btn btn-info price_save"><i class="fa fa-save"></i></button>
                                    <button type="button" value="0" name="catalogue_{{ $catalogue->id }}" class="btn btn-danger price_delete"><i class="fa fa-times"></i></button>
                                </span>
                        </div>
                    </div>
                </div>
                {{ var_dump($master_product) }}
                <!-- Product Price/Quantity -->
                @foreach($master_product->ct_quantities as $product_quantity)
                    <div id="" class="row">
                        <form id="quantity_{{ $product_quantity->id }}" action="" enctype="multipart/form-data" method="post" class="catalogue_{{ $catalogue->id }} price_manage_form" onsubmit="return false;">
                            <div class="col-md-3">
                                <p class="form-control-static"><span id="quantity_{{ $product_quantity->id }}" class=""> {{ $product_quantity->quantity }} / {{ $product_quantity->unit }}</span></p>
                                {{--<input type="hidden" name="product_action_id" value="{{ $product->id }}">--}}
                                {{--<input type="hidden" name="product_quantity_id" value="{{ $product_quantity->id }}">--}}
                                {{--<input type="hidden" name="product_catalogue_id" value="{{ $catalogue->id }}">--}}

                                {{--<input id="quantity_{{ $product->id }}" name="example-disabled-input" class="form-control" value="{{ $product_quantity->quantity }} / {{ $product_quantity->unit }}"disabled="" type="text">--}}
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input id="price_{{ $product_quantity->id }}" name="product_price" class="form-control" placeholder="Your username.." type="text">
                                    <input type="hidden" id="old_price_{{ $product_quantity->id }}" name="old_price">
                                    <span class="input-group-addon"><i class="gi gi-euro"></i></span>
                                </div>
                            </div>
                            {{--{{ dd($master_product) }}--}}
                            {{ var_dump($product_quantity) }}
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input id="discount_{{ $product_quantity->id }}" name="product_discount" class="form-control" placeholder="Your username.." type="text" value="">
                                    <input type="hidden" id="old_discount_{{ $product_quantity->id }}" name="old_discount">
                                    <span class="input-group-addon"><i class="gi gi-star"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" value="{{ $product_quantity->id }}" name="catalogue_{{ $catalogue->id }}" class="btn btn-primary price_edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" value="{{ $product_quantity->id }}" name="catalogue_{{ $catalogue->id }}" class="btn btn-default price_undo"><i class="fa fa-undo"></i></button>
                                        <button type="button" value="{{ $product_quantity->id }}" name="catalogue_{{ $catalogue->id }}" class="btn btn-info price_save"><i class="fa fa-save"></i></button>
                                        <button type="button" value="{{ $product_quantity->id }}" name="catalogue_{{ $catalogue->id }}" class="btn btn-danger price_delete"><i class="fa fa-times"></i></button>
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