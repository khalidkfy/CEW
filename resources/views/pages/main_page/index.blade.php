@extends('layouts.front_master')

@section('page_title', 'Home Page')

@section('content')
    <div class="intro">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="caption">
                        <h1>
                            {{ $box_header->title }}
                        </h1>
                        <p>
                            {!! \Illuminate\Support\Str::words($box_header->sub_title, -1, '...') !!}
                        </p>
                        <a class="btn btn-primary @if ($box_header->button_active == 0) disabled-link @endif"
                            href="{{ env('APP_URL') . $box_header->button_action }}">
                            {{ $box_header->button_text }}
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image position-relative">
                        <span class="img01">
                            <img src="{{ asset('front_assets/images/5a28b4aa188ca31.png') }}" alt="Logo">
                        </span>
                        <span class="position-absolute dco01 rt"></span>
                        <span class="position-absolute dco01 cr"></span>
                        <span class="position-absolute dco01 bl"></span>
                        <span class="position-absolute dco02 t"></span>
                        <span class="position-absolute dco02 b"></span>
                        <figure>
                            <img src="{{ $box_header->box_header_image }}" alt="">
                        </figure>
                        <span class="position-absolute dco03 t"></span>
                        <span class="position-absolute dco03 b"></span>
                        <span class="position-absolute dco04 t"></span>
                        <span class="position-absolute dco04 b"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="partners">
        <div class="container">
            <div class="head">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>Our Partners</h2>
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0">
                                {{ $our_partner->text }}
                            </p>
                            <a href="">
                                {{ $our_partner->link_text }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($partners_slider_image as $slider_image)
                            <div class="swiper-slide">
                                <figure class="mb-0">
                                    <img src="{{ asset('storage') . '/' . $slider_image->body }}" alt="">
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="head">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>Our Services</h2>
                    <a href="{{ route('services_page.index') }}">View all</a>
                </div>
            </div>
            <div class="position-relative">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($services as $service)
                            <div class="swiper-slide">
                                <div class="item">
                                    <figure>
                                        <img src="{{ asset('storage') . '/' . $service->icon }}" alt="">
                                    </figure>
                                    <h2>
                                        {{ $service->service_name }}
                                    </h2>
                                    <p>
                                        {{ Str::limit($service->short_description, 60) }}
                                    </p>
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('service.show', ['id' => $service->id]) }}">
                                        {{ $service->button_text }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="head">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>Our Products</h2>
                    <a href="">View all</a>
                </div>
            </div>
            <div class="position-relative">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="item">
                                    <figure>
                                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                            <img src="{{ asset('storage') . '/' . $product->cover_image }}" alt="">
                                        </a>
                                    </figure>
                                    <div>
                                        @if($product->category)
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="title-c">
                                                {{ $product->category->category_name }}
                                            </a>
                                        @endif
                                        <a href="{{ route('product.show', ['id' => $product->id]) }}" class="title-p">
                                            {{ $product->product_name }}
                                        </a>
                                        <span class="price">
                                            <strong>
                                                {{ $product->price }} $
                                            </strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div class="whychooseus">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="head">
                        <h2>
                            {{ $why_choose_us->text }}
                        </h2>
                    </div>
                    <div class="content">
                        <p>
                            {!! \Illuminate\Support\Str::words($why_choose_us->description, -1, '...') !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <figure>
                        <img src="{{ asset('storage') . '/' . $why_choose_us->image }}"
                            alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="whoweare">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="head">
                        <h2>
                            {{ $who_are_we->title }}
                        </h2>
                    </div>
                    <div class="content">
                        <p>
                            {!! \Illuminate\Support\Str::words($who_are_we->description , -1, '...') !!}
                        </p>
                        <a href="{{ $who_are_we->button_action }}" class="btn btn-outline-primary @if( $who_are_we->button_active == 0 ) disabled-link @endif ">
                            {{ $who_are_we->button_text }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <figure>
                        <img src="{{ asset('storage') . '/' . $who_are_we->image }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="head text-center">
                <h2>TESTIMONIALS </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="position-relative">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="item text-center">
                                            <p>
                                                {!! \Illuminate\Support\Str::words($testimonial->content , -1, '...') !!}
                                            </p>
                                            <h4>
                                                {{ $testimonial->name }}
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
