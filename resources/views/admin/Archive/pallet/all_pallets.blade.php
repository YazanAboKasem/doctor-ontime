@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table id="example" class="display table table--light tabstyle--two" >
                            <thead>
                            <tr>
                                <th scope="col">@lang('id')</th>
                                <th scope="col">@lang('price')</th>
                                <th scope="col">@lang('other_expenses')</th>
                                <th scope="col">@lang('source_country')</th>
{{--                                <th scope="col">@lang('created at')</th>--}}
                                <th scope="col">@lang('note')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($pallets as $item)
                                <tr>
                                    <td data-label="@lang('ID')"><strong>{{ __($item->id) }}</strong></td>
                                    <td data-label="@lang('price')"><strong>{{ __($item->price) }}</strong></td>

                                    <td data-label="@lang('other expenses')"><strong>{{ __($item->other_expenses) }}</strong></td>
                                    <td data-label="@lang('source country')">{{ __($item->source_country) }}</td>
{{--                                    <td data-label="@lang('created at')">{{ __($item->created_at) }}</td>--}}
                                    <td data-label="@lang('note')">{{ __($item->note) }}</td>
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.pallet.allScheduling', $item->id) }}" class="icon-btn ml-1 btn--success" data-original-title="@lang('Edit')">
                                            <i class="la la-eye"></i>
                                        </a>


                                    </td>




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
                                <th scope="col">@lang('price')</th>
                                <th scope="col">@lang('other_expenses')</th>
                                <th scope="col">@lang('source_country')</th>
{{--                                <th scope="col">@lang('created at')</th>--}}
                                <th scope="col">@lang('note')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </tfoot>
                        </table><!-- table end -->

                    </div>
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
