@extends('layouts.front_master')

@section('page_title', 'About Us')

@section('content')
    <div id="main" class="about pt-5 entry-content body-bg">
        <div class="container">
            <div class="head">
                <h2>
                    {{ $about_us->title }}
                </h2>
            </div>
            <div class="content-about">
                <p>
                    {!! \Illuminate\Support\Str::words($about_us->long_description, -1, '...') !!}
                </p>

            </div>
            <div class="certificates mt-5">
                <div class="head">
                    <h2>Accreditation certificates</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach($certifications as $certification)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="item mb-4">
                                <figure><img src="{{ asset('storage') . '/' . $certification->image }}" alt=""></figure>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
