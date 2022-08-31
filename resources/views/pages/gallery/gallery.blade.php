@extends('layouts.front_master')

@section('page_title', 'Gallery')

@section('content')
    <div id="main" class="gallery body-bg">
        <div class="container">
            <div class="section-01">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="head">
                            <h2>
                                {{ $gallery->title }}
                            </h2>
                        </div>
                        <div class="content">
                            <p>
                                {{ $gallery->description }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <figure>
                            <img src="{{ $gallery->header_image }}"
                                alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="section-02">
                <div class="head">
                    <h2>Occasions </h2>
                </div>
                <div class="row">
                    @foreach($galleries as $gallery)
                        <div class="col-lg-3 col-md-4 ">
                            <div class="item mb-4">
                                <figure>
                                    <a href="{{ route('gallery.show', ['id' => $gallery->id]) }}"><img src="{{ asset('storage') . '/' . $gallery->cover_text }}" alt=""></a>
                                </figure>
                                <a href="" class="title">
                                    {{ $gallery->gallery_text }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
