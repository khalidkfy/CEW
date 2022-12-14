@extends('layouts.master')

@section('page_title', 'Service Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Service Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Service Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('service.update', ['id' => $service->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Service Name --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Service Name</label>
                    <input type="text" name="service_name" class="form-control @error('service_name') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $service->service_name }}"/>
                    @error('service_name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- End Service Name --}}

                {{-- Start Short Description --}}
                <div class="form-floating mb-10">
                    <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                        {{ $service->short_description }}
                    </textarea>
                    <label for="floatingTextarea2">Short Description</label>
                    @error('short_description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Short Description --}}

                <div class="row mb-10" style="display: flex">

                    {{-- Start Button Text --}}
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control @error('button_text') is-invalid @enderror" placeholder="Here Is The Button Text"
                               value="{{ $service->button_text }}"/>
                        @error('button_text')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End Button Text --}}

                    {{-- Start Button Active --}}
                    <div class="col-md-4">
                        <label class="required form-label">Button Active</label>
                        <select class="form-select" aria-label="Select example" name="button_active">
                            <option value="0" @if( $service->button_active == 0 ) selected @endif>Inactive</option>
                            <option value="1" @if( $service->button_active == 1 ) selected @endif>Active</option>
                        </select>
                    </div>
                    {{-- Start Button Active --}}

                    <div class="col-md-4">
                        <label for="exampleColorInput" class="form-label">Color picker</label>
                        <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="{{ $service->color }}" title="Choose your color">
                    </div>
                </div>

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $service->title }}"/>
                    @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- End Title --}}

                {{-- Start Description --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic" class="required form-label">Description</label>
                    <textarea name="description" id="kt_docs_ckeditor_classic" class="@error('description') is-invalid @enderror">
                        {{ $service->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Description --}}

                {{-- Start Long Description --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic_2" class="required form-label">Long Description</label>
                    <textarea name="long_description" id="kt_docs_ckeditor_classic_2" class="@error('long_description') is-invalid @enderror">
                        {{ $service->long_description }}
                    </textarea>
                    @error('long_description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Long Description --}}

                <div class="row mb-10" style="display: flex">

                    {{-- Start Single Button Text --}}
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="required form-label">Single Button Text</label>
                        <input type="text" name="s_button_text" class="form-control @error('s_button_text') is-invalid @enderror" placeholder="Here Is The Button Text"
                               value="{{ $service->s_button_text }}"/>
                        @error('s_button_text')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- End Single Button Text --}}

                    {{-- Start Button Active --}}
                    <div class="col-md-6">
                        <label class="required form-label">Single Button Active</label>
                        <select class="form-select" aria-label="Select example" name="s_button_active">
                            <option value="0" @if( $service->s_button_active == 0 ) selected @endif>Inactive</option>
                            <option value="1" @if( $service->s_button_active == 1 ) selected @endif>Active</option>
                        </select>
                    </div>
                    {{-- Start Button Active --}}
                </div>

                <div class="row">
                    <!--begin::Icon-->
                    <div class="col-md-4 mb-10">
                        <label class="col-md-12 form-check-label mb-5" style="font-weight: 500; color: #3f4254; font-size: 1.05rem">
                            Icon
                        </label>
                        <div class="image-input image-input-empty" data-kt-image-input="true"
                             style="width: 250px; background-image: url({{ $service->icon }})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-160px h-125px" style="width: 250px; background-image: url({{ asset('storage') . '/' . $service->icon }})"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                   data-kt-image-input-action="change"
                                   data-bs-toggle="tooltip"
                                   data-bs-dismiss="click"
                                   title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" class="@error('icon') is-invalid @enderror" name="icon" accept=".png, .jpg, .jpeg .svg"/>
                                @error('icon')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror

                                <input type="hidden" name="avatar_remove"/>
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="cancel"
                                  data-bs-toggle="tooltip"
                                  data-bs-dismiss="click"
                                  title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="remove"
                                  data-bs-toggle="tooltip"
                                  data-bs-dismiss="click"
                                  title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                            <!--end::Remove button-->
                        </div>
                    </div>
                    <!--end::Icon-->

                    <!--begin::Header Image-->
                    <div class="col-md-4 mb-10">
                        <label class="col-md-12 form-check-label mb-5" style="font-weight: 500; color: #3f4254; font-size: 1.05rem">
                            Header Image
                        </label>
                        <div class="image-input image-input-empty" data-kt-image-input="true"
                             style="width: 250px; background-image: url({{ $service->header_image }})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-160px h-125px" style="width: 250px; background-image: url({{ asset('storage') . '/' . $service->header_image }}"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                   data-kt-image-input-action="change"
                                   data-bs-toggle="tooltip"
                                   data-bs-dismiss="click"
                                   title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" class="@error('header_image') is-invalid @enderror" name="header_image" accept=".png, .jpg, .jpeg .svg"/>
                                @error('header_image')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <input type="hidden" name="avatar_remove"/>
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="cancel"
                                  data-bs-toggle="tooltip"
                                  data-bs-dismiss="click"
                                  title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="remove"
                                  data-bs-toggle="tooltip"
                                  data-bs-dismiss="click"
                                  title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                            <!--end::Remove button-->
                        </div>
                    </div>
                    <!--end::Header Image-->

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
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic_2'))
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
