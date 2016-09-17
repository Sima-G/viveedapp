@if($quantities->count())
    <!-- Quantities Content -->
    <table class="table table-bordered table-striped table-vcenter">
        <tbody>

        <tr>
            <th class="text-center" style="width: 100px;"><strong>@lang('backend/modules/catering/quantities.quantity_id')</strong></th>
            <th class="hidden-xs" style="width: 15%;">@lang('backend/modules/catering/quantities.unit')</th>
            <th class="text-right hidden-xs" style="width: 10%;">@lang('backend/modules/catering/quantities.quantity')</th>
            <th class="hidden-xs">@lang('backend/modules/catering/quantities.status')</th>
            <th class="hidden-xs text-center">@lang('backend/modules/catering/quantities.state')</th>
            <th class="text-center" style="width: 70px;">@lang('backend/modules/catering/quantities.actions')</th>
        </tr>

        @foreach($quantities as $key => $quantity)
            <tr>
                <td class="text-center" style="width: 100px;"><strong>{{ $key + 1 }}</strong></td>
                <td class="hidden-xs quantity_unit_txt" style="width: 15%;">{{ $quantity->unit }}</td>
                <td class="text-right hidden-xs quantity_quantity_txt" style="width: 10%;">{{ $quantity->quantity }}</td>
                <td class="hidden-xs">
                    @if($quantity->status == 0)
                        <span class="label label-warning quantity_status_txt"> @lang('backend/modules/catering/quantities.status_unavailable') </span>
                    @elseif($quantity->status == 1)
                        <span class="label label-success quantity_status_txt"> @lang('backend/modules/catering/quantities.status_new')</span>
                    @elseif($quantity->status == 2)
                        <span class="label label-primary quantity_status_txt"> @lang('backend/modules/catering/quantities.status_old')</span>
                    @endif
                </td>
                <td class="hidden-xs text-center">
                    @if($quantity->state == 0)
                        <span class="label label-danger quantity_state_txt"> @lang('backend/modules/catering/quantities.state_disabled') </span>
                    @elseif($quantity->state == 1)
                        <span class="label label-success quantity_state_txt"> @lang('backend/modules/catering/quantities.state_enabled')</span>
                    @endif
                </td>
                <td class="text-center" style="width: 70px;">
                    <div class="btn-group btn-group-xs">
                        <a id="{{ $quantity->id }}" href="#" data-toggle="tooltip" title="" class="btn btn-xs btn-default quantity_edit" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a id="{{ $quantity->id }}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger quantity_delete" data-original-title="Delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
            {{--<tr>
                <td class="text-center" style="width: 100px;"><strong>1</strong></td>
                <td class="hidden-xs" style="width: 15%;">5 Products</td>
                <td class="text-right hidden-xs" style="width: 10%;"><span class="label label-warning">Processing</span></td>
                <td class="hidden-xs">Paypal</td>
                <td class="hidden-xs text-center">16/11/2014</td>
                <td class="text-center" style="width: 70px;">
                    <div class="btn-group btn-group-xs">
                        <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>--}}
        @endforeach
        </tbody>
    </table>
    <!-- END Orders Content -->
@else
    <div class="block-section text-center">
        <h2><span id="manage_product_block_action">@lang('backend/modules/catering/quantities.empty_quantity_list')</span></h2>
    </div>
@endif