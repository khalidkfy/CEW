@extends('layouts.front_master')

@section('page_title', 'Products')

@section('content')
    <div id="main" class="products entry-content body-bg">
        <div class="p-3">
            <div class="image-head">
                <img src="{{ asset('front_assets/images/product-page.png') }}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar">
                        <h2>All Category</h2>
                        <ul>
                            @foreach($categories as $category)
                                <li class="drop-menu">
                                    <a class="link-item" href="javascript:;" onclick="getProductsByCategoryId({{ $category->id }})">>
                                        {{ $category->category_name }}
                                    </a>
                                    <ul class="sub-menu">
                                        @foreach($category->children as $children)
                                            <li>
                                                <a href="javascript:;" onclick="getProductsBySubCategoryId({{$children->id}})">
                                                    {{ $children->category_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8" >
                    <div class="row mb-5" id="product_space">
                        @foreach($products as $product)
                            <div class="col-md-4 col-6" >
                                <div class="item mb-4">
                                    <div class="item">
                                        <figure>
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                                <img src="{{ asset('storage') . '/' . $product->cover_image }}" alt="">
                                            </a>
                                        </figure>
                                        <div>
                                            @if($product->category)
                                                <span>{{ $product->category->category_name }}</span>
                                            @else
                                                {{ 'No Category' }}
                                            @endif
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="title-p">{{ $product->product_name }}</a>
                                            <span class="price"><strong>{{ $product->price }} $</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center" id="paginate">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('front_assets/jquery.js') }}"></script>
    <script>

    </script>
    <script>

        function getProductsBySubCategoryId(cateId) {

            $.ajax({
                url: "{{ route('products_page.subCategory') }}",
                method : 'get',
                data : {
                    category_id : cateId,
                },
                dataType:"json",
                success: function (data) {
                    $('#product_space').empty();
                    $('#paginate').empty();
                    $.each(data.data, function(key, value){
                        $('#product_space').append(`
                            <div class="col-md-4 col-6">
                                <div class="item mb-4">
                                    <div class="item">
                                        <figure>
                                            <a href="/products/`+ value.id +`/show">
                                                <img src="/storage/`+ value.cover_image + `" alt="">
                                            </a>
                                        </figure>
                                        <div>

                                            <span>`+ value.category.category_name +`</span>

                                            <a href="/products/`+ value.id +`/show" class="title-p">` + value.product_name +`</a>
                                            <span class="price"><strong> $`+value.price+`</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    })
                },
                error :function(data) {
                    alert(data);
                }
            })
        }
    </script>

    <script>

        function getProductsByCategoryId(cateId) {

            $.ajax({
                url: "{{ route('products_page.category') }}",
                method : 'get',
                data : {
                    category_id : cateId,
                },
                dataType:"json",
                success: function (data) {
                    $('#product_space').empty();
                    $('#paginate').empty();
                    $.each(data.data, function(key, value){
                        $('#product_space').append(`
                            <div class="col-md-4 col-6">
                                <div class="item mb-4">
                                    <div class="item">
                                        <figure>
                                            <a href="/products/`+ value.id +`/show">
                                                <img src="/storage/`+ value.cover_image + `" alt="">
                                            </a>
                                        </figure>
                                        <div>

                                            <span>`+ value.category.category_name +`</span>

                                            <a href="/products/`+ value.id +`/show" class="title-p">` + value.product_name +`</a>
                                            <span class="price"><strong> $`+ value.price +`</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    })
                },
                error :function(data) {
                    alert(data);
                }
            })
        }
    </script>

@endpush
