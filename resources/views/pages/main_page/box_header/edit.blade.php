@extends('layouts.master')

@section('page_title', 'Box Header Edit')

@section('css')
@endsection

@section('nav_title', 'Box Header Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Box Header Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            {{--            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">--}}
            {{--                <a href="#" class="btn btn-success">Add</a>--}}
            {{--            </div>--}}
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('box_header.update', ['id' => $box_header->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $box_header->title }}"/>
                    @error('title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Title --}}

                {{-- Start Sub_Title --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic" class="required form-label">Sub Title</label>
                    <textarea name="sub_title" id="kt_docs_ckeditor_classic" class="@error('sub_title') is-invalid @enderror">
                        {{ $box_header->sub_title }}
                    </textarea>
                    @error('sub_title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Sub_Title --}}

                <div class="row mb-10" style="display: flex">

                    {{-- Start Button Text --}}
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="required form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control @error('button_text') is-invalid @enderror" placeholder="Here Is The Button Text"
                               value="{{ $box_header->button_text }}"/>
                        @error('button_text')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- End Button Text --}}

                    {{-- Start Button Active --}}
                    <div class="col-md-6">
                        <label class="required form-label">Button Active</label>
                        <select class="form-select" aria-label="Select example" name="button_active">
                            <option value="0" @if( $box_header->button_active == 0 ) selected @endif>Inactive</option>
                            <option value="1" @if( $box_header->button_active == 1 ) selected @endif>Active</option>
                        </select>
                    </div>
                    {{-- Start Button Active --}}
                </div>


                {{-- Start Button Action --}}
                <div class="mb-10">
                    <label for="basic-url" class="form-label">Button Action URL</label>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon3">
                            {{ env('APP_URL') }}
                        </span>
                        <input type="text" name="button_action" class="form-control @error('button_action') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3"
                               value="{{ $box_header->button_action }}"/>
                    </div>
                    @error('button_action')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Button Action --}}

                <!--begin::Image input-->
                <div class="row mb-10">
                    <label class="col-md-12 form-check-label mb-5" style="font-weight: 500; color: #3f4254; font-size: 1.05rem">
                        Box Header Image
                    </label>
                    <div class="image-input image-input-empty" data-kt-image-input="true"
                         style="width: 250px; background-image: url({{ $box_header->box_header_image }})">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper w-160px h-125px" style="width: 250px;"></div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                               data-kt-image-input-action="change"
                               data-bs-toggle="tooltip"
                               data-bs-dismiss="click"
                               title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>

                            <!--begin::Inputs-->
                            <input type="file" class="@error('image') is-invalid @enderror" name="image" accept=".png, .jpg, .jpeg"/>
                            @error('image')
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
                <!--end::Image input-->
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
