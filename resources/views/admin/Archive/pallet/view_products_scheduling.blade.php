@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table id="products_scheduling" class="display table table--light tabstyle--two" >
                            <thead>
                            <tr>
                                <th scope="col">@lang('id')</th>
                                <th scope="col">@lang('Box ID')</th>
                                <th scope="col">@lang('Weight')</th>
                                <th scope="col">@lang('Price')</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Category')</th>


                                @if(request()->route()->getName() != 'admin.products.bid.completed')
                                    <th scope="col">@lang('Actions')</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($products as $item)
                                <tr>
                                    <td data-label="@lang('ID')">{{ __($item->id) }}</td>
                                    <td data-label="@lang('Box ID')">{{ __($item->box_id) }}</td>
{{--                                    <td data-label="@lang('Exl ID')">{{ __($item->exl_id) }}</td>--}}
                                    <td data-label="@lang('Weight')">{{ __($item->weight) }}</td>
                                    <td data-label="@lang('Price')">{{ __($item->real_price) }}</td>



                                    <td data-label="@lang('Name')">{{ __($item->name) }}</td>
                                    <td data-label="@lang('Category')">{{ __($item->category->name) }}</td>




                                    @if(request()->route()->getName() != 'admin.products.bid.completed')
                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('admin.pallet.product.label.view', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                                <i class="la la-print"></i>
                                            </a>
                                        </td>
                                    @endif

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">@lang('id')</th>
                                <th scope="col">@lang('Box ID')</th>
{{--                                <th scope="col">@lang('exl ID')</th>--}}
                                <th scope="col">@lang('Weight')</th>
                                <th scope="col">@lang('Price')</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Category')</th>


                                @if(request()->route()->getName() != 'admin.products.bid.completed')
                                    <th scope="col">@lang('Actions')</th>
                                @endif
                            </tr>
                            </tfoot>
                        </table><!-- table end -->

                    </div>

                </div>

            </div><!-- card end -->
        </div>
    </div>



    {{-- Status MODAL --}}
@endsection


@push('breadcrumb-plugins')
    <form action="{{ route('admin.products.search') }}" method="GET" class="form-inline float-sm-right bg--white mr-0 mr-xl-2 mr-lg-0">
        <div class="input-group has_append ">
            <input name="product_name" required type="text" class="form-control" placeholder="@lang('Product Name')" autocomplete="off" value="{{ @request()->product_name }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

    <a href="{{ route('admin.products.add') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small p-2 mr-3"><i class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
@endpush

@push('style')
    <style>
        a[disabled]{
            color: #fff;
            opacity: 0.7;
            cursor: no-drop;
        }
        a[disabled]:hover {
            color: #fff;
        }
    </style>
@endpush

@push('script')
    <script>
        (function($){
            "use strict";

            //Status
            $('.statusBtn').on('click', function () {
                var modal = $('#statusModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush
