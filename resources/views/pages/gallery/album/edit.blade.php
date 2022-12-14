@extends('layouts.master')

@section('page_title', 'Edit Album')

@section('css')
@endsection

@section('nav_title', 'Edit Album')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Edit Album
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('album.update', ['id' => $album->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                        value="{{ $album->title }}"/>
                    @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- End Title --}}

                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" id="inputGroupFile01">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('storage') . '/' . $album->cover_image }}" width="100" height="100">
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
