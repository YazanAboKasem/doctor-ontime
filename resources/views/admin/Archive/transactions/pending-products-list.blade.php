@extends('admin.layouts.app')
@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('image')</th>
                                <th scope="col">@lang('Product name')</th>
                                <th scope="col">@lang('price')</th>
                                <th scope="col">@lang('shipping_cost')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($winners as $item)
                                <tr>
                                    <td data-label="@lang('Date')">{{ showDateTime($item->created_at) }}</td>
                                    <td data-label="@lang('Product Image')">
                                        <div class="user justify-content-lg-center justify-content-end">
                                            <div style="width: 50px;height: 50px">
                                                <img src="{{ getImage(imagePath()["products"]["path"].'/'.$item->bid->product->images[0],imagePath()["products"]["path"])}}" alt="@lang('image')">
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Product')">{{ $item->bid->product->name }}</td>
                                    <td data-label="@lang('Product')">{{ $item->bid->bid_amount }}</td>
                                    <td data-label="@lang('Product')">{{ $item->bid->shipping_cost }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>

                            @endforelse

                            </tbody>
                        </table><!-- table end -->

                    </div>
                </div>

            </div><!-- card end -->
        </div>

    </div>
    <a href="{{ route('admin.store.transaction.products',$userId) }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small p-2 mr-3"><i class="fa fa-fw fa-plus"></i>@lang('Processing All')</a>

{{--    <div class="row mt-50 mb-none-30">--}}
{{--        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">--}}
{{--            <button type="submit">--}}
{{--                <div class="card bg--deep-purple box--shadow2 hover--effect1">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="text-center">--}}
{{--                            <h2 class="text-white">processing all</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </button>--}}


{{--        </div>--}}


{{--    </div>--}}
@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";
            // Order status update
            $(document).on("change", ".changeStatus", function () {
                var url = $('option:selected', this).attr('item_url');
                window.location.href = url + '?status=' + $(this).val();
            });
        })(jQuery);
    </script>
@endpush
