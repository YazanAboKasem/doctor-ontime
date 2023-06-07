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
{{--                                <th scope="col">@lang('exl ID')</th>--}}
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
                                            @if($item->bid_complete !== 1)
                                                <a href="{{ route('admin.products.edit', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                                    <i class="la la-edit"></i>
                                                </a>

                                                <a href="javascript:void(0)" class="icon-btn {{ $item->status ? 'btn--danger' : 'btn--success' }} ml-1 statusBtn" data-original-title="@lang('Status')" data-toggle="tooltip" data-url="{{ route('admin.products.status', $item->id) }}">
                                                    <i class="la la-eye{{ $item->status ? '-slash' : null }}"></i>
                                                </a>
                                            @else
                                                <a disabled class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a disabled class="icon-btn {{ $item->status ? 'btn--danger' : 'btn--success' }} ml-1" data-original-title="@lang('Status')" data-toggle="tooltip" data-url="{{ route('admin.products.status', $item->id) }}">
                                                    <i class="la la-eye{{ $item->status ? '-slash' : null }}"></i>
                                                </a>
                                            @endif
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
                    <button id="products_scheduling_button">Add new row</button>
                    <form action="{{ route('admin.pallet.products.Scheduling.add.dally') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input hidden id="AuctionSchedulingId" value="{{$AuctionSchedulingId}}" name="AuctionSchedulingId">
                    <table id="dally_products_scheduling" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Counter')</th>
                            <th scope="col">@lang('id')</th>
                            <th scope="col">@lang('Box ID')</th>
                            {{--                                <th scope="col">@lang('exl ID')</th>--}}
                            <th scope="col">@lang('Weight')</th>
                            <th scope="col">@lang('Price')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Category')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th scope="col">@lang('Counter')</th>
                            <th scope="col">@lang('id')</th>
                            <th scope="col">@lang('Box ID')</th>
                            {{--                                <th scope="col">@lang('exl ID')</th>--}}
                            <th scope="col">@lang('Weight')</th>
                            <th scope="col">@lang('Price')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Category')</th>
                        </tr>
                        </tfoot>
                    </table>
                        <div class="card-footer">
                            <button class="btn btn--primary w-100">@lang('Update')</button>
                        </div>
                    </form>
                </div>

            </div><!-- card end -->
        </div>
    </div>



    {{-- Status MODAL --}}
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Update Status')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    @csrf

                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure to change status?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn--danger deleteButton">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
