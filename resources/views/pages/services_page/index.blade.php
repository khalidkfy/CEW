@extends('layouts.front_master')

@section('page_title', 'Services')

@section('content')

    <div id="main" class="services pt-5 entry-content body-bg">
    <div class="container">
        <div class="row align-items-md-center intro-service">
            <div class="col-md-6">
                <div class="head">
                    <h2>
                        {{ $services_page->title }}
                    </h2>
                </div>
                <div class="content">
                    <p>
                        {!! \Illuminate\Support\Str::words($services_page->description, -1, '...') !!}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <figure class="mb-0">
                    <img src="{{ asset('storage') . '/' . $services_page->image }}" alt="">
                </figure>
            </div>
        </div>

        <div class="section-01">
            <div class="head">
                <h3>Our Services</h3>
            </div>
            <div class="row items">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-4">
                        <div class="item mb-4">
                            <figure>
                                <img src="{{ asset('storage') . '/' . $service->icon }}" alt="">
                            </figure>
                            <h2>
                                {{ $service->service_name }}
                            </h2>
                            <p>
                                {{ Str::limit($service->short_description, 60) }}
                            </p>
                            <a class="btn btn-outline-primary" href="{{ route('service.show', ['id' => $service->id]) }}">Read more</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="section-02 certifications">
            <div class="head">
                <h3>Certifications and licenses</h3>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach($services_certifications as $certification)
                        <div class="swiper-slide">
                            <div class="item-sy1 mb-4">
                                <figure>
                                    <a href="">
                                        <img src="{{ asset('storage') . '/' . $certification->image }}" alt="">
                                    </a>
                                </figure>
                                <div class="caption">
                                    <a href="" class="title">
                                        {{ $certification->title }}
                                    </a>
                                    <p>
                                        {!! \Illuminate\Support\Str::words($certification->description, -1, '...') !!}

                                    </p>
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
