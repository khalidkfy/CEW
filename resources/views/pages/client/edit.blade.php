@extends('layouts.master')

@section('page_title', 'Client Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Client Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Client Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->

            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('client.update', ['id' => $client->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $client->title }}"/>
                    @error('title')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Title --}}

                {{-- Start long_description --}}
                <div class="row">
                    <div class="col-md-6  mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupFile01">Header Image</label>
                            <input type="file" name="header_image" class="form-control" id="inputGroupFile01">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('storage') . '/' . $client->header_image }}" width="150" height="150">
                    </div>
                </div>
                {{-- End long_description --}}

                <div class="row">
                    <div class="col-md-6 input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Images</label>
                        <input type="file" name="images[]" class="form-control" id="inputGroupFile01" multiple>
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


@endsection
