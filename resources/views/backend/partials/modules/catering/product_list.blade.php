<table class="table table-vcenter table-striped search-table">
    <thead>
    <tr>
        <th style="width: 150px;" class="text-center">@lang('backend/modules/catering/products.product_id')</th>
        <th>@lang('backend/modules/catering/products.product')</th>
        <th>@lang('backend/modules/catering/products.description')</th>
        <th>@lang('backend/modules/catering/products.ingredients')</th>
        <th style="width: 150px;" class="text-center">@lang('backend/modules/catering/products.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $key => $product)
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td>{{ $product->title }}</td>
            <td>{!! html_entity_decode($product->description) !!}</td>
            <td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>
            <td class="text-center">
                <div class="btn-group btn-group-xs">
                    <a href="{{ route('ct_product_show', $product->id ) }}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-eye"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    <tr>
        <td class="text-center">1</td>
        <td>client1</td>
        <td>client1@example.com</td>
        <td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>
        <td class="text-center">
            <div class="btn-group btn-group-xs">
                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
            </div>
        </td>
    </tr>
    </tbody>
</table>