@extends('layouts.front_master')

@section('page_title', $product->product_name)

@section('content')
    <div id="main" class="single-product entry-content body-bg">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-4">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item">
                        <a href="#">
                            {{ $product->category->category_name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $product->product_name }}
                    </li>
                </ol>
            </nav>
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="content mb-4 mb-lg-0">
                        <h1>
                            {{ $product->product_name }}
                        </h1>
                        <p class="price">{{ $product->price }} $</p>
                        <p>
                            {{ $product->description }}
                        </p>
                        <a data-bs-toggle="modal" href="#staticBackdrop" class="btn btn-primary">Sales Inquiry</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex gallery">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <figure>
                                            <img src="{{ asset('storage') . '/' . $image }}" />
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <figure>
                                            <img src="{{ asset('storage') . '/' . $image }}" />
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <h2>Description</h2>
                <p>
                    {!! \Illuminate\Support\Str::words($product->long_description, -1, '...') !!}
                </p>
            </div>
            <div class="box products mb-0">
                <h2>Related Product</h2>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="item mb-4">
                                    <div class="item">
                                        <figure>
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                                <img src="{{ asset('storage') . '/' . $product->cover_image }}"
                                                    alt="">
                                            </a>
                                        </figure>
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

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="staticBackdropLabel">Sales Inquiry</h5>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input class="form-control" type="text" placeholder="Enter your Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control" type="text" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile Number</label>
                            <div class="d-flex align-items-center">
                                <div>
                                    <input id="selector" class="form-control" type="text" placeholder="972" />

                                    <div id="dropdownbox" style="display: none;">
                                        <div id="test1" class="dropitem" onclick="onclickdropitem(this.id)">
                                            <img src="assets/images/Flag_of_Palestine.png" />
                                            <p class="droptext">972</p>
                                        </div>

                                        <div id="test2" class="dropitem" onclick="onclickdropitem(this.id)">
                                            <img src="assets/images/Flag_of_Palestine.png" />
                                            <p class="droptext">972</p>
                                        </div>

                                        <div id="test3" class="dropitem" onclick="onclickdropitem(this.id)">
                                            <img src="assets/images/Flag_of_Palestine.png" />
                                            <p class="droptext">972</p>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control" type="text" placeholder="Enter your Mobile Number">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control" name="" id="" placeholder="Enter message"></textarea>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
