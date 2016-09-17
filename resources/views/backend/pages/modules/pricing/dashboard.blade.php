@extends('backend.layouts.master')

@section('title')
    @lang('schedule/speakers.speakers')
@stop

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Catering Categories Header -->
    @include('backend.partials.modules.pricing.menu')
    <!-- END Catering Categories Header -->

        <!-- Main Row -->
        <div class="row">
            <div class="col-md-9 col-lg-4 col-lg-offset-1">
                <div class="block-section">
                    <img src="{{ asset('assets/backend/img/logo/Viveed_Logo_Inverted.png') }}" class="img-responsive center-block" width="80%">
                    <h3 class="sub-header text-center">Let's have some <strong>Vice Versa</strong> feed</h3>
                </div>
            </div>
            <div class="col-md-3 col-lg-5 col-lg-offset-1">
                <!-- Subscriptions Content -->
                <h3 class="sub-header"><strong>@lang('module/pricing.pricing_module')</strong></h3>
                <div id="faq3" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q1">@lang('module/pricing.catalogues')</a></h4>
                        </div>
                        <div id="faq3_q1" class="panel-collapse collapse">
                            <div class="panel-body">@lang('module/pricing.catalogues_desc')</div>
                        </div>
                    </div>
                </div>
                <!-- END Subscriptions Content -->
            </div>
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/backend/js/pages/modules/catering/viveed.js') }}"></script>
@stop