@extends('layouts.front_master')

@section('page_title', 'Partners')

@section('content')
    <div id="main" class="client pt-5 entry-content body-bg">
        <div class="container">
            <div class="head">
                <div class="row">

                    <div class="col-md-8 intro-client d-flex justify-content-between align-items-center">
                        <h2>
                            {{ $client->title }}
                        </h2>
                    </div>
                    <div class="col-md-4">
                        <figure class="mb-0">
                            <img src="{{ asset('storage') . '/' . $client->header_image }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="row items">
                @foreach ($images as $image)
                    <div class="col-md-4 col-lg-3">
                        <div class="item mb-4">
                            <figure class="mb-0">
                                <img src="{{ asset('storage') . '/' . $image->image }}" alt="">
                            </figure>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
