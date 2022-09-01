@extends('layouts.front_master')

@section('page_title', 'Contact Us')

@section('content')
    <div id="main" class="contact page entry-content body-bg pt-5 pb-5">
        <div class="container">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57712.18652329482!2d51.1725904329679!3d25.30381239428109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45c534ffdce87f%3A0x1cfa88cf812b4032!2sQatar!5e0!3m2!1sen!2s!4v1661420167385!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="box">
                        <div class="head">
                            <h2>Contact information</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ac, mi in ut quam Lorem ipsum dolor
                            sit amet, consectLorem ipsum dolor sit amet, consectetur adipiscing elit. Ac, mi in ut quam
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ac, mi in ut quam etur adipiscing
                            elit. Ac, mi in ut quam </p>
                        <ul>
                            <li><span class="mobile"></span> {{ $setting->phone_number }}</li>
                            <li><span class="email"></span> {{ $setting->email_address }}</li>
                            <li>FAX : {{ $setting->fax_address }}</li>
                        </ul>
                        <div class="d-flex socail">
                            <a href="{{ $setting->facebook_address }}" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $setting->twitter_address }}" class="twitter"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="head">
                        <h2 class="mb-2">Contact us</h2>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                    <form action="{{ route('contact_us.store') }}" method="POST">
                        @csrf

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
                            <label for="" class="form-label">Subject</label>
                            <input class="form-control @error('subject') is-invalid @enderror" name="subject" type="text" placeholder="Enter your subject">
                            @error('subject')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="Enter your email">
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
                                            <img src="{{ asset('assets/images/Flag_of_Palestine.png') }}" />
                                            <p class="droptext">972</p>
                                        </div>

                                        <div id="test2" class="dropitem" onclick="onclickdropitem(this.id)">
                                            <img src="{{ asset('assets/images/Flag_of_Palestine.png') }}" />
                                            <p class="droptext">972</p>
                                        </div>

                                        <div id="test3" class="dropitem" onclick="onclickdropitem(this.id)">
                                            <img src="{{ asset('assets/images/Flag_of_Palestine.png') }}" />
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
                        <button type="submit" value="Submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
