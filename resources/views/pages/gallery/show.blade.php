@extends('layouts.front_master')

@section('page_title', 'Gallery Single')

@section('content')
    <div id="main" class="gallery">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-4">
                    <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $gallery->gallery_title }}
                    </li>
                </ol>
            </nav>
            <div class="content-gallery">
                <div class="row">
                    @foreach($gallery->galleries as $image)
                        <div class="col-lg-3 col-md-4 ">
                            <div class="item mb-4">
                                <a href="#" data-fancybox>
                                    <img src="{{ asset('storage') . '/' . $image }}" alt=""></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
