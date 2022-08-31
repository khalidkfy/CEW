@extends('layouts.master')

@section('page_title', 'Our Partners Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Our Partners Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Our Partners Edit
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
            <form action="{{ route('our_partners.update', ['id' => $our_partner->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Title --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Text</label>
                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $our_partner->text }}"/>
                    @error('text')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Title --}}

                {{-- Start Button Action --}}
                <div class="mb-10">
                    <label for="basic-url" class="form-label">Link Action URL</label>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon3">
                            {{ env('APP_URL') }}
                        </span>
                        <input type="text" name="link_action" class="form-control @error('link_action') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3"
                               value="{{ $our_partner->link_action }}"/>
                    </div>
                    @error('link_action')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Button Action --}}

                <div class="row mb-10" style="display: flex">

                    {{-- Start Button Text --}}
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="required form-label">Link Text</label>
                        <input type="text" name="link_text" class="form-control @error('link_text') is-invalid @enderror" placeholder="Here Is The Button Text"
                               value="{{ $our_partner->link_text }}"/>
                        @error('link_text')
                        <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- End Button Text --}}

                    {{-- Start Button Active --}}
                    <div class="col-md-6">
                        <label class="required form-label">Link Active</label>
                        <select class="form-select" aria-label="Select example" name="link_active">
                            <option value="0" @if( $our_partner->link_active == 0 ) selected @endif>Inactive</option>
                            <option value="1" @if( $our_partner->link_active == 1 ) selected @endif>Active</option>
                        </select>
                    </div>
                    {{-- Start Button Active --}}
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
