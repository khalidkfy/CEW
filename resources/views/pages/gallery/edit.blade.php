@extends('layouts.master')

@section('page_title', 'Gallery Edit')

@section('css')
@endsection

@section('nav_title', 'Gallery Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Gallery Edit
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
            <form action="{{ route('gallery.update', ['id' => $gallery->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $gallery->title }}"/>
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
                        {{ $gallery->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Description --}}

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Header Image</label>
                    <input type="file" name="header_image" class="form-control" id="inputGroupFile01">
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
