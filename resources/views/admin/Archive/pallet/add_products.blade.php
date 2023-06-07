@extends('admin.layouts.app')
@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">@lang('Product Name')</label>
                                    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" />
                                    <div class="col-md-6" id="productList">

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">@lang('Category')</label>
                                    <select class="form-control" id="category" name="category_id" required="">
                                        <option value="">-- @lang('Select One') --</option>
                                        @forelse($main_categories as $main_cat)
                                            <optgroup label = {{$main_cat->name }}>
                                                @forelse($main_cat->categories as $cat)
                                                    <option value="{{ $cat->id }}">{{$cat->name }}</option>

                                                @empty
                                                @endforelse
                                            </optgroup>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>@lang('Exl ID')</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="@lang('ID')"
                                               name="exl_id"
                                               value="{{ old('exl_id') }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">ID</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>@lang('Real Price')</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="@lang('Price')"
                                               name="real_price"
                                               value="{{ old('real_price') }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{ $general->cur_text }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="category">@lang('Box')</label>--}}
{{--                                    <select class="form-control" id="box" name="box_id" required="">--}}
{{--                                        <option value="">-- @lang('Select One') --</option>--}}
{{--                                        @forelse($baletBoxes as $item)--}}
{{--                                            <option value="{{ $item->id }}">{{ __(@$item->box_id) }}</option>--}}
{{--                                        @empty--}}
{{--                                        @endforelse--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{ csrf_field() }}

{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="start_date">@lang('Start Date')</label>--}}
{{--                                    <input type="text" id="start_date" class="form-control timepicker"--}}
{{--                                           placeholder="@lang('Date')" value="{{ old('start_date') }}"--}}
{{--                                           autocomplete="off" name="start_date" required="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('End Date')</label>--}}
{{--                                    <input type="text" class="form-control timepicker" placeholder="@lang('Date')"--}}
{{--                                           value="{{ old('end_date') }}"--}}
{{--                                           autocomplete="off" name="end_date" required="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>@lang('Weight')</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="@lang('Weight')"
                                               name="weight"
                                               value="{{ old('weight') }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">.Gram</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">@lang('Status')</label>
                                    <select class="form-control" id="Status" name="status_id" required="">
                                        <option value="">-- @lang('Select One') --</option>
                                        @forelse($statuses as $item)
                                            <option value="{{ $item->id }}">{{ __(@$item->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                            </div>

{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('Minimum Bid Price')</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input type="text" class="form-control" placeholder="@lang('Price')"--}}
{{--                                               name="min_bid_price"--}}
{{--                                               value="{{ old('min_bid_price') }}" required>--}}
{{--                                        <div class="input-group-append">--}}
{{--                                            <div class="input-group-text">{{ $general->cur_text }}</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('Shipping Cost')</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input type="text" class="form-control" placeholder="@lang('Shipping')"--}}
{{--                                               name="shipping_cost"--}}
{{--                                               value="{{ old('shipping_cost') }}" required>--}}
{{--                                        <div class="input-group-append">--}}
{{--                                            <div class="input-group-text">{{ $general->cur_text }}</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('Delivery Time')</label>--}}
{{--                                    <input type="text" class="form-control" name="delivery_time"--}}
{{--                                           value="{{ old('delivery_time') }}" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>@lang('URL')</label>
                                    <input type="text" class="form-control" name="URL"
                                           value="{{ old('URL') }}" placeholder="www.amazon.com/XXXXXXX" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>@lang('Keywords')</label>
                                    <small class="ml-2 mt-2 text-facebook">@lang('Separate multiple keywords by') <code>,</code>(comma)
                                        or <code>enter</code> key</small>
                                    <!-- Multiple select-2 with tokenize -->
                                    <select class="select2-auto-tokenize" name="keywords[]" multiple="multiple">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >@lang('Description')</label>
                                    <textarea rows="10" name="description" class="form-control "
                                              >{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nicEditor0">@lang('About this item')</label>
                                    <textarea rows="10" name="About_this_item" class="form-control nicEdit"
                                              id="nicEditor0">{{ old('About_this_item') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >@lang('Note')</label>
                                    <textarea rows="10" name="Note" class="form-control "
                                              >{{ old('Note') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Images')</h5>
                                        <button type="button" class="btn btn-sm btn-outline-light addBtn"><i
                                                class="fa fa-fw fa-plus"></i>@lang('Add New')
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <p><small class="text-facebook">@lang('Images will be resize into')
                                                800x800px</small></p>
                                        <div class="row element">

                                            <div class="col-md-2 imageItem">
                                                <div class="payment-method-item">
                                                    <div class="payment-method-header d-flex flex-wrap">
                                                        <div class="thumb" style="position: relative;">
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview"
                                                                     style="background-image: url('{{asset('assets/images/default.png')}}')">

                                                                </div>
                                                            </div>
                                                            <div class="avatar-edit">
                                                                <input type="file" name="images[]"
                                                                       class="profilePicUpload" id="0"
                                                                       accept=".png, .jpg, .jpeg" required>
                                                                <label for="0" class="bg-primary">
                                                                    <i class="la la-pencil"></i>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card border--dark">
                                    <h5 class="card-header bg--dark">@lang('Other Information')
                                        <button type="button"
                                                class="btn btn-sm btn-outline-light float-right addNewInformation">
                                            <i class="la la-fw la-plus"></i>@lang('Add New')
                                        </button>
                                    </h5>

                                    <div class="card-body">
                                        <div class="row addedField">


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang('Create')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('admin.products.all') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>
@endpush

@push('script-lib')
    <script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>
@endpush
@push('style')
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .avatar-remove {
            position: absolute;
            bottom: 180px;
            right: 0;
        }

        .avatar-remove label {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-size: 15px;
            cursor: pointer;
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).ready(function(){

            $('#name').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({

                        method:"POST",
                        url:"{{ route('admin.products.fetch') }}",

                        data:{query:query, _token:_token},
                        success:function(data){
                            $('#productList').fadeIn();
                            $('#productList').html(data);

                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                $('#name').val($(this).text());
                $('#productList').fadeOut();
                window.location.href = $(this).data('href');
            });

        });
        $(document).on('click', 'li', function(){
            $('#name').val($(this).text());
            $('#productList').fadeOut();
        });
        (function ($) {
            "use strict";

            //Status
            $('.statusBtn').on('click', function () {
                var modal = $('#statusModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });

            // js for Multiple select-2 with tokenize
            $(".select2-auto-tokenize").select2({
                tags: true,
                tokenSeparators: [',']
            });

            // Date time picker
            var start = new Date(),
                prevDay,
                startHours = 12;

            // 12:00 AM
            start.setHours(12);
            start.setMinutes(0);

            // If today is Saturday or Sunday set 10:00 AM
            if ([6, 0].indexOf(start.getDay()) != -1) {
                start.setHours(12);
                startHours = 12
            }
            // date and time picker
            $('.timepicker').datepicker({
                timepicker: true,
                language: 'en',
                dateFormat: 'yyyy-mm-dd',
                startDate: start,
                minHours: startHours,
                maxHours: 24,
                onSelect: function (fd, d, picker) {
                    // Do nothing if selection was cleared
                    if (!d) return;

                    var day = d.getDay();

                    // Trigger only if date is changed
                    if (prevDay != undefined && prevDay == day) return;
                    prevDay = day;

                    // If chosen day is Saturday or Sunday when set
                    // hour value for weekends, else restore defaults
                    if (day == 6 || day == 0) {
                        picker.update({
                            minHours: 24,
                            maxHours: 24
                        })
                    } else {
                        picker.update({
                            minHours: 24,
                            maxHours: 24
                        })
                    }
                }
            });

            var counter = 0;
            $('.addBtn').click(function () {
                counter++;
                $('.element').append(`<div class="col-md-2 imageItem"><div class="payment-method-item"><div class="payment-method-header d-flex flex-wrap"><div class="thumb" style="position: relative;"><div class="avatar-preview"><div class="profilePicPreview" style="background-image: url('{{asset('assets/images/default.png')}}')"></div></div><div class="avatar-edit"><input type="file" name="images[]" class="profilePicUpload" required id="image${counter}" accept=".png, .jpg, .jpeg" /><label for="image${counter}" class="bg-primary"><i class="la la-pencil"></i></label></div>
                <div class="avatar-remove">
                    <label class="bg-danger removeBtn">
                        <i class="la la-close"></i>
                    </label>
                </div>
                </div></div></div></div>`);
                remove()
                upload()
            });

            function scrol() {
                var bottom = $(document).height() - $(window).height();
                $('html, body').animate({
                    scrollTop: bottom
                }, 200);
            }

            function remove() {
                $('.removeBtn').on('click', function () {
                    $(this).parents('.imageItem').remove();
                });
            }

            function upload() {
                function proPicURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var preview = $(input).parents('.thumb').find('.profilePicPreview');
                            $(preview).css('background-image', 'url(' + e.target.result + ')');
                            $(preview).addClass('has-image');
                            $(preview).hide();
                            $(preview).fadeIn(65);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(".profilePicUpload").on('change', function () {
                    proPicURL(this);
                });

                $(".remove-image").on('click', function () {
                    $(this).parents(".profilePicPreview").css('background-image', 'none');
                    $(this).parents(".profilePicPreview").removeClass('has-image');
                    $(this).parents(".thumb").find('input[type=file]').val('');
                });
            }

            //----- Add Information fields-------//
            $('.addNewInformation').on('click', function () {
                var html = `
                <div class="col-md-12 other-info-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="title[]" class="form-control" type="text" required placeholder="@lang('Title')">
                            </div>
                            <div class="col-md-6 mt-md-0 mt-2">
                                <input name="content[]" class="form-control" type="text" required placeholder="@lang('Content')">
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeInfoBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;

                $('.addedField').append(html);
            });

            $(document).on('click', '.removeInfoBtn', function () {
                $(this).closest('.other-info-data').remove();
            });


            $('select[name=category_id]').val('{{old('category_id')}}');
            $('select[name=status_id]').val('{{old('status_id')}}');

        })(jQuery);
    </script>
@endpush
