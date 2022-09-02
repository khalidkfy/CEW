@extends('layouts.master')

@section('page_title', 'Add Category')

@section('css')
@endsection

@section('nav_title', 'Add Category')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Add Category
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
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Start category_name --}}
                <div class="col-md-6 mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Category</label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           />
                    @error('category_name')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End category_name --}}

                <div class="col-md-6 mb-12">
                    <label class="required form-label">Type</label>
                    <select class="form-select col-md-6" aria-label="Select example" name="type">
                        <option value="Category">Category</option>
                        <option value="Sub_Category">Sub Category</option>
                    </select>
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

@endsection
