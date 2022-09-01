@extends('layouts.front_master')

@section('page_title', $service->service_name)

@section('content')
    <div id="main" class="service-single entry-content body-bg">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-4">
                    <li class="breadcrumb-item">
                        <a href="#">
                            Services
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $service->service_name }}
                    </li>
                </ol>
            </nav>
            <div class="content">
                <div class="row align-items-center intro-service">
                    <div class="col-md-6">
                        <div class="head">
                            <h2>
                                {{ $service->title }}
                            </h2>
                        </div>
                        <div class="caption">
                            <p>
                                {!! \Illuminate\Support\Str::words($service->description, -1, '...') !!}
                            </p>
                            <a data-bs-toggle="modal" href="#staticBackdrop" class="btn btn-primary">
                                Sales Inquiry
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <figure class="mb-0">
                            <img src="{{ asset('storage') . '/' . $service->header_image }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="mt-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Description</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <p>
                                {!! \Illuminate\Support\Str::words($service->long_description, -1, '...') !!}
                            </p>
                        </div>

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

                        <input type="hidden" value="{{ $service->id }}" name="service_id">
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input class="form-control @error('full_name') is-invalid @enderror" name="full_name" type="text" placeholder="Enter your Full Name">
                            @error('full_name')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Enter your email">
                            @error('email')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile Number</label>
                            <div class="d-flex align-items-center">
                                <div>
                                    <input id="selector" class="form-control @error('prefix_number') is-invalid @enderror" name="prefix_number" type="text" placeholder="972" />

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
                                <input class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" type="text" placeholder="Enter your Mobile Number">
                            </div>
                            @error('prefix_number')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            @error('phone_number')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="" placeholder="Enter message"></textarea>
                            @error('message')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
