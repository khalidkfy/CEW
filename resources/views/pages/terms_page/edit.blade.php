@extends('layouts.master')

@section('page_title', 'Term Edit')

@section('css')
@endsection

@section('nav_title', 'Term Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Term Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->

            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('term.update', ['id' => $term->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $term->title }}"/>
                    @error('title')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Title --}}

                {{-- Start long_description --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic" class="required form-label">Description</label>
                    <textarea name="description" id="kt_docs_ckeditor_classic" class="@error('description') is-invalid @enderror">
                        {{ $term->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End long_description --}}

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
