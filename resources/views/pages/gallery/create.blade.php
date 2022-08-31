@extends('layouts.master')

@section('page_title', 'Gallery Add')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Gallery Add')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Gallery Add
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           />
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

                    </textarea>
                    @error('description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Description --}}

                {{-- Start gallery_title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Gallery Title</label>
                    <input type="text" name="gallery_title" class="form-control @error('gallery_title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           "/>
                    @error('gallery_title')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End gallery_title --}}

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Header Image</label>
                    <input type="file" name="header_image" class="form-control" id="inputGroupFile01">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Galleries</label>
                    <input type="file" name="gallery[]" class="form-control" id="inputGroupFile01" multiple>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Cover Image</label>
                    <input type="file" name="cover_text" class="form-control" id="inputGroupFile01">
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
