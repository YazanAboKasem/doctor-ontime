@extends('admin.layouts.app')
@section('panel')
    <div class="content-wrapper" style="padding: 30px">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add New Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.doctors.Store') }}" method="post" enctype="multipart/form-data" >
                @csrf



                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Education</label>
                                <input type="text" class="form-control" id="education" name="education" placeholder="Enter experience">
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Experience</label>
                                <input type="text" class="form-control" id="experience" name="experience" placeholder="Enter experience">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="card-body">
                        <div class="form-group">
                            <label>Date of birth</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="date_of_birth" name="date_of_birth">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="specialtyId">Gender <code></code></label>
                                <select class="custom-select rounded-0" id="gender" name="gender">
                                    <option value="">-- @lang('Select One') --</option>
                                    <option value=0>Male</option>
                                    <option value=1>Fmale</option>


                                </select>
                            </div>


                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="card-body">
                            <div class="form-group" data-select2-id="38">
                                <label for="selectLanguage">Languages</label>
                                <select id="selectLanguage" name="lans[]" class="selectLanguage" multiple data-placeholder="Select a State" style="width: 100%;">
                                    @forelse($languages as $language)
                                        <option value="{{ $language->id }}">{{$language->name }}</option>

                                    @empty
                                    @endforelse

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                        </div>

                    </div>
                </div>

                <div class="card-body">
                <div class="form-group">
                    <label for="specialtyId">Specialty <code></code></label>
                    <select class="custom-select rounded-0" id="specialty_id" name="specialty_id">
                        <option value="">-- @lang('Select One') --</option>
                        @forelse($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{$specialty->name }}</option>

                        @empty
                        @endforelse

                    </select>
                </div>
                </div>


                <!-- /.card-body -->
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#my-dropzone", {
            url: "{{ route('admin.doctors.Store') }}",
            paramName: "file",
            maxFilesize: 5,
            maxFiles: 5,
            acceptedFiles: ".jpg, .jpeg, .png",
            addRemoveLinks: true,
            dictDefaultMessage: "Add Files",
            dictRemoveFile: "Delete File",
            init: function() {
                this.on("success", function(file, response) {
                    console.log("تم رفع الملف: " + file.name);
                    console.log("الاستجابة: " + response);
                    // يمكنك تنفيذ الإجراءات اللازمة بعد رفع الملف هنا
                });

                this.on("removedfile", function(file) {
                    console.log("تم إزالة الملف: " + file.name);
                    // يمكنك تنفيذ الإجراءات اللازمة بعد إزالة الملف هنا
                });
            }
        });
    </script>
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
