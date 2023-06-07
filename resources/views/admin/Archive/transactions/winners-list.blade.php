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
                                <th scope="col">@lang('User')</th>
                                <th scope="col">@lang('Product')</th>
                                <th scope="col">@lang('Shipping Status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($winners as $item)
                                <tr>
                                    <td data-label="@lang('Date')">{{ showDateTime($item->created_at) }}</td>
                                    <td data-label="@lang('User')">
                                        <div class="user justify-content-lg-center justify-content-end">
{{--                                            <div class="thumb">--}}
{{--                                                <img src="{{ getImage(imagePath()['profile']['user']['path'].'/'.$item->user->image,imagePath()['profile']['user']['size'])}}" alt="@lang('image')">--}}
{{--                                            </div>--}}
                                            <a href="{{ route('admin.users.detail', $item->id) }}" class="ml-2">{{$item->fullname}}</a>

                                        </div>
                                    </td>
                                    <td data-label="@lang('Products')">{{ $item->productsCount }}</td>

                                    <td data-label="@lang('Order Status')">
                                        <a href="{{ route('admin.transaction.winner.products', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                            <i class="la la-edit"></i>
                                        </a>


                                    </td>
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
