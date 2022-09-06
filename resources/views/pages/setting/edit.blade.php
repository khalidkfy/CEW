@extends('layouts.master')

@section('page_title', 'Setting Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Setting Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Setting Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('setting.update', ['id' => $setting->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Start email_address --}}
                    <div class="col-md-4 mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Email Address</label>
                        <input type="text" name="email_address" class="form-control @error('email_address') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                               value="{{ $setting->email_address }}"/>
                        @error('email_address')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End email_address --}}

                    {{-- Start fax_address --}}
                    <div class="col-md-4 mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Fax Address</label>
                        <input type="text" name="fax_address" class="form-control @error('fax_address') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                               value="{{ $setting->fax_address }}"/>
                        @error('fax_address')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End email_address --}}

                    {{-- Start phone_number --}}
                    <div class="col-md-4 mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Phone number</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                               value="{{ $setting->phone_number }}"/>
                        @error('phone_number')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End phone_number --}}

                </div>

                <div class="row">
                    {{-- Start facebook_address --}}
                    <div class="col-md-6 mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Facebook Address</label>
                        <input type="text" name="facebook_address" class="form-control @error('facebook_address') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                               value="{{ $setting->facebook_address }}"/>
                        @error('facebook_address')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End email_address --}}

                    {{-- Start twitter_address --}}
                    <div class="col-md-6 mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Twitter Address</label>
                        <input type="text" name="twitter_address" class="form-control @error('twitter_address') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                               value="{{ $setting->twitter_address }}"/>
                        @error('twitter_address')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End email_address --}}

                </div>

                {{-- Start facebook_address --}}
                <div class="col-md-6 mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Contact Us Title</label>
                    <input type="text" name="contact_us_title" class="form-control @error('contact_us_title') is-invalid @enderror" placeholder="Put Some Words For a Here"
                           value="{{ $setting->contact_us_title }}"/>
                    @error('contact_us_title')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End email_address --}}

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Contact Us Description</label>
                    <textarea class="form-control @error('contact_us_description') is-invalid @enderror" name="contact_us_description" id="exampleFormControlTextarea1" rows="3">
                        {{ $setting->contact_us_description}}
                    </textarea>
                    @error('contact_us_description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    {{-- Start Product Enable --}}
                    <div class="col-md-6">
                        <label class="required form-label">Product Enable</label>
                        <select class="form-select" aria-label="Select example" name="product_enable">
                            <option value="0" @if( $setting->product_enable == 0 ) selected @endif>Inactive</option>
                            <option value="1" @if( $setting->product_enable == 1 ) selected @endif>Active</option>
                        </select>
                    </div>
                    {{-- Start Button Active --}}
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Footer Description</label>
                    <input type="text" class="form-control" name="footer_description" id="exampleFormControlInput1" value="{{ $setting->footer_description }}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Header Image</label>
                            <input class="form-control" name="header_image" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ $setting->header_image }}" width="40" height="40">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Footer Image</label>
                            <input class="form-control" name="header_image" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ $setting->footer_image }}" width="40" height="40">
                    </div>
                </div>

                <div class="mb-10 justify-content-center" style="display: flex">
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function () {
            $('#MPheader_button_action').change(function () {
                if ($(this).val() == 1) {

                    $.ajax({
                        type: 'put',
                        url: 'box_header/updateButtonActive',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {
                            action: 0,
                        },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data.action)
                        },
                        error: function (data) {
                            console.log(data)
                        },
                    })

                } else if ($(this).val() == 0) {

                    $.ajax({
                        type: 'put',
                        url: 'box_header/updateButtonActive',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {
                            action: 1,
                        },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data.action)
                        },
                        error: function (data) {
                            console.log(data)
                        },
                    })
                }
                ;
            })
        })

    </script>

@endsection
