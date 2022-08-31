@extends('layouts.master')

@section('page_title', 'Testimonial Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Testimonial Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Testimonial Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        <div class="card-body mb-5">
            <form action="{{ route('testimonial.update', ['id' => $testimonial->id]) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Start name --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $testimonial->name }}"/>
                    @error('name')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End category_name --}}

                {{-- Start Sub_Title --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic" class="required form-label">Content</label>
                    <textarea name="t_content" id="kt_docs_ckeditor_classic" class="@error('t_content') is-invalid @enderror">
                        {{ $testimonial->content }}
                    </textarea>
                    @error('t_content')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Sub_Title --}}

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
