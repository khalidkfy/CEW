@extends('layouts.master')

@section('page_title', 'Why Choose Us Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Why Choose Us Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Why Choose Us Edit
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
            <form action="{{ route('why_choose_us.update', ['id' => $why_choose_us->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Text --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Text</label>
                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $why_choose_us->text }}"/>
                    @error('text')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Text --}}

                {{-- Start Sub_Title --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic" class="required form-label">Description</label>
                    <textarea name="description" id="kt_docs_ckeditor_classic" class="@error('description') is-invalid @enderror">
                        {{ $why_choose_us->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- End Sub_Title --}}


                <!--begin::Image input-->
                <div class="row mb-10">
                    <label class="col-md-12 form-check-label mb-5" style="font-weight: 500; color: #3f4254; font-size: 1.05rem">
                        Box Header Image
                    </label>
                    <div class="image-input image-input-empty" data-kt-image-input="true"
                         style="width: 250px; background-image: url({{ $why_choose_us->image }})">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper w-160px h-125px" style="width: 250px; background-image: url({{ asset('storage') . '/' . $why_choose_us->image }})"></div>
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


@endsection
