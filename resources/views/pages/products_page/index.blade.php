@extends('layouts.front_master')

@section('page_title', 'Products')

@section('content')
    <div id="main" class="products entry-content body-bg">
        <div class="p-3">
            <div class="image-head">
                <img src="{{ asset('storage') . '/' . 'product_page/product_page.png' }}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar">
                        <h2>All Catogare</h2>
                        <ul>
                            @foreach($categoriesWithParents as $category)
                                <li class="drop-menu">
                                    <a class="link-item" href="javascript:void(0)">
                                        {{ $category->category_name }}
                                    </a>
                                    <ul class="sub-menu">
                                        @foreach($category->children as $children)
                                            <li>
                                                <a href="">
                                                    {{ $children->category_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            @foreach($categories as $category)
                                <li><a href="">{{ $category->category_name }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 col-6">
                                <div class="item mb-4">
                                    <div class="item">
                                        <figure><a href="">
                                                <img src="{{ asset('storage') . '/' . $product->cover_image }}"
                                                    alt=""></a></figure>
                                        <div>
                                            <a href="" class="title-c">{{ $product->category->category_name }}</a>
                                            <a href="" class="title-p">{{ $product->product_name }}</a>
                                            <span class="price"><strong>{{ $product->price }} $</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
