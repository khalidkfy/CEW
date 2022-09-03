@extends('layouts.master')

@section('page_title', 'Product Edit')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('nav_title', 'Product Edit')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Product Edit
                    </h4>
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        </div>
        <div class="card-body mb-5">
            <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Start Service Name --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Put Some Words For Product Name Here"
                           value="{{ $product->product_name }}"/>
                    @error('product_name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- End Service Name --}}

                {{-- Start Short Description --}}
                <div class="form-floating mb-10">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                        {{ $product->description }}
                    </textarea>
                    <label for="floatingTextarea2">Description</label>
                    @error('description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Short Description --}}

                {{-- Start Price --}}
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Price</label>
                    <input type="text" name="price" class="form-control @error('title') is-invalid @enderror" placeholder="Put Some Words For Title Here"
                           value="{{ $product->price }}"/>
                    @error('price')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- End Price --}}


                {{-- Start Long Description --}}
                <div class="mb-10">
                    <label for="kt_docs_ckeditor_classic_2" class="required form-label">Long Description</label>
                    <textarea name="long_description" id="kt_docs_ckeditor_classic_2" class="@error('long_description') is-invalid @enderror">
                        {{ $product->long_description }}
                    </textarea>
                    @error('long_description')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- End Long Description --}}

                <div class="row mb-10" style="display: flex">


                    {{-- Start category_name  --}}
                    <div class="col-md-6">
                        <label class="required form-label">Category</label>
                        <select class="form-select" aria-label="Select example" name="category_id" id="product_category">
                            @foreach( $categories as $category )
                                <option value="{{ $category->id }}" @if( $category->id == $product->category->id ) selected @endif>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Start category_name --}}

                    <div class="col-md-6">
                        <label class="required form-label">Sub Category</label>
                        <select class="form-select" aria-label="Select example" name="sub_category_id" id="product_category">

                        </select>
                    </div>
                </div>

                <div class="row">
                    <!--begin::Cover Image-->
                    <div class="col-md-4 mb-10">
                        <label class="col-md-12 form-check-label mb-5" style="font-weight: 500; color: #3f4254; font-size: 1.05rem">
                            Cover Image
                        </label>
                        <div class="image-input image-input-empty" data-kt-image-input="true"
                             style="width: 250px; background-image: url({{ $product->cover_image }})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-160px h-125px" style="width: 250px; background-image: url({{ $product->cover_image }})"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                   data-kt-image-input-action="change"
                                   data-bs-toggle="tooltip"
                                   data-bs-dismiss="click"
                                   title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" class="@error('cover_image') is-invalid @enderror" name="cover_image" accept=".png, .jpg, .jpeg .svg"/>
                                @error('cover_image')
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
                    <!--end::Icon-->
               </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <input type="file" class="form-control" name="images[]" id="inputGroupFile01" multiple>
                </div>

                {{-- Slider --}}
                <div class="tns">
                    <div data-tns="true" data-tns-nav-position="bottom" data-tns-controls="false">
                        @foreach( $product->images as $image )
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="{{ $image }}" class="card-rounded shadow mw-100" alt="" />
                            </div>
                        @endforeach
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

    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').change(function (){
                var category_id = $(this).val();

                $.ajax({
                    url: '/ces/public/products/sub_category',
                    type: 'get',
                    data: {
                        category_id: category_id,
                    },
                    dataType: 'json',
                    success: function(data){
                        $('select[name="sub_category_id"]').empty();
                        $.each(data.data, function(key, value) {
                            $('select[name="sub_category_id"]').append(
                                '<option value="' + value.id + '">' + value.category_name +'</option>'
                            );
                        });
                    },
                    error: function(data){
                        console.log(data)
                    },
                })

            })
        })
    </script>

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
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic_2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection
