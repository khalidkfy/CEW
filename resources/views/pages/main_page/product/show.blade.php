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
                            @if ($product->category)
                                {{ $product->category->category_name }}
                            @else
                                {{ 'Unknown Category' }}
                            @endif
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
                                @foreach ($product_images as $image)
                                    <div class="swiper-slide">
                                        <figure>
                                            <img src="{{ asset('storage') . '/' . $image->image }}" />
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper v-slider-single">
                            <div class="swiper-wrapper">
                                @foreach ($product_images as $image)
                                    <div class="swiper-slide">
                                        <figure>
                                            <img src="{{ asset('storage') . '/' . $image->image }}" />
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
                    <form action="{{ route('sales.store') }}" method="POST">
                        @csrf


                        <div class="alert alert-danger" id="errors" style="display: none">

                        </div>


                        <input type="hidden" value="{{ $product->id }}" name="product_id" id="product_id">

                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input class="form-control @error('full_name') is-invalid @enderror" id="full_name"
                                name="full_name" type="text" placeholder="Enter your Full Name">
                            @error('full_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                                name="email" placeholder="Enter your email">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile Number</label>
                            <div class="d-flex align-items-center">
                                <input class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    id="phone_number" type="text" placeholder="Enter your Mobile Number">
                            </div>
                            @error('phone_number')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message"
                                placeholder="Enter message"></textarea>
                            @error('message')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{ asset('front_assets/jquery.js') }}"></script>

    <script>
        $('#submit').click(function(e) {
            e.preventDefault();

            var token = "{{ csrf_token() }}";
            var product_id = $('#product_id').val();
            var full_name = $('#full_name').val();
            var email = $('#email').val();
            var phone_number = $('#phone_number').val();
            var message = $('#message').val();

            $.ajax({
                url: "{{ route('sales.store') }}",
                type: 'post',
                data: {
                    _token: token,
                    product_id: product_id,
                    full_name: full_name,
                    email: email,
                    phone_number: phone_number,
                    message: message,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(data) {
                    if (data.errors) {
                        $.each(data.errors, function(key, value) {
                            $('#errors').show();
                            $('#errors').append('<p>' + value + '</p>');
                        });
                    }
                },
                error: function(data) {
                    alert('Fill The Form')
                }
            })
        })
    </script>
@endpush
