@extends('admin.layouts.app')
@section('panel')
    <div class="content-wrapper" style="padding: 30px">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$page_title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title AR</label>
                            <input value="{{$article->title_ar}}" type="text" class="form-control" id="title_ar" name="title_ar" placeholder="Enter Title">
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title EN</label>
                            <input value="{{$article->title_en}}" type="text" class="form-control" id="title_en" name="title_en" placeholder="Enter Title">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description AR</label>
                                <textarea  type="text" class="form-control" id="description_ar" name="description_ar" placeholder="Enter Description">{{$article->description_ar}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Description EN</label>
                                <textarea  type="text" class="form-control" id="description_en" name="description_en" placeholder="Enter Description">{{$article->description_en}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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

        .avatar-remove button {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            text-align: center;
            line-height: 15px;
            font-size: 15px;
            cursor: pointer;
            padding-left: 6px;
        }
    </style>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";

            //Delete Old Image
            $('.deleteOldImage').on('click', function () {
                var url = $(this).data('deletelink');
                var removeindex =  $(this).data('removeindex');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        if (data.success){
                            $('#' + removeindex).remove();
                            notify('success', data.message);
                        }else{
                            notify('error','Failed to delete the image!')
                        }
                    }
                });
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

        })(jQuery);
    </script>
@endpush
