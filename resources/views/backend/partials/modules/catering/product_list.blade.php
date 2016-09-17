<table class="table table-vcenter table-striped search-table">
    <thead>
    <tr>
        <th style="width: 150px;" class="text-center">@lang('backend/modules/catering/products.product_id')</th>
        <th>@lang('backend/modules/catering/products.product')</th>
        <th>@lang('backend/modules/catering/products.description')</th>
        <th>@lang('backend/modules/catering/products.status')</th>
        <th>@lang('backend/modules/catering/products.state')</th>
        <th style="width: 150px;" class="text-center">@lang('backend/modules/catering/products.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $key => $product)
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td>{{ $product->title }}</td>
            <td>{!! html_entity_decode($product->description) !!}</td>
            <td>
                @if($product->status == 0)
                    <span class="label label-warning product_status_txt"> @lang('backend/modules/catering/products.status_unavailable') </span>
                @elseif($product->status == 1)
                    <span class="label label-success product_status_txt"> @lang('backend/modules/catering/products.status_new')</span>
                @elseif($product->status == 2)
                    <span class="label label-primary product_status_txt"> @lang('backend/modules/catering/products.status_old')</span>
                @endif
            </td>
            <td>
                @if($product->state == 0)
                    <span class="label label-danger product_state_txt"> @lang('backend/modules/catering/products.state_disabled') </span>
                @elseif($product->state == 1)
                    <span class="label label-success product_state_txt"> @lang('backend/modules/catering/products.state_enabled')</span>
                @endif
            </td>
            {{--<td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>--}}
            <td class="text-center">
                <div class="btn-group btn-group-xs">
                    <a href="{{ route('ct_product_manage', $product->id ) }}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-eye"></i></a>
                    <a id="{{ $product->id }}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger product_delete" data-original-title="Delete"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>