<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('front_assets/images/Cew-32x32.png') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <title>
        @yield('page_title')
    </title>
</head>

<body>

    {{-- Start Contacts & NavBar --}}
    <header>
        <div class="top">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="left">
                        <div class="d-flex">
                            <div><span class="email"></span> {{ $setting->email_address }}</div>
                            <div>FAX {{ $setting->fax_address }}</div>
                            <div><span class="mobile"></span> {{ $setting->phone_number }}</div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="d-flex">
                            <a href="{{ $setting->facebook_address }}"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $setting->twitter_address }}"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-container">
            <div class="container">
                <nav>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="left">
                            <div class="d-flex align-items-center">
                                <div class="mobile_menu_icon">
                                    <div class="mobile_menu_toggle"></div>
                                </div>
                                <a href="" class="logo"><img
                                        src="{{ asset('storage') . '/' . $setting->header_image }}" alt=""></a>
                                <ul id="primary-menu" class="menu">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>
                                        <a href="{{ route('services_page.index') }}">
                                            Services
                                        </a>
                                    </li>
                                    <li><a href="{{ route('products_page.index') }}">Product</a></li>
                                    <li><a href="{{ route('gallery.gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('about.index') }}">About us</a></li>
                                    <li><a href="">Client</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="link">
                            <a class="btn btn-primary" href="{{ route('contact_us.contact') }}">Contact us</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    {{-- End Contacts & NavBar --}}

    {{-- Start Content --}}
    @yield('content')
    {{-- end Content --}}

    <footer>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="item-footer mb-3 mb-md-0">
                            <figure><img src="{{ asset('storage') . '/' . $setting->footer_image }}" alt="">
                            </figure>
                            <p>
                                {{ $setting->footer_description }}
                            </p>
                            <div class="d-flex images">
                                @foreach ($setting->certifications as $cert)
                                    <a href="">
                                        <img src="{{ asset('storage') . '/' . $cert }}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-footer mb-3 mb-md-0">
                            <h2 class="title-footer">Usful link</h2>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('services_page.index') }}">Services</a></li>
                                <li class="@if ($setting->product_enable == 0) disabled-link @endif ">
                                    <a href="{{ route('products_page.index') }}">
                                        Products
                                    </a>
                                </li>
                                <li><a href="{{ route('gallery.gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('about.index') }}">About us</a></li>
                                <li><a href="{{ route('client.index') }}">Partners</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-footer mb-3 mb-md-0">
                            <h2 class="title-footer">Resources</h2>
                            <ul>
                                <li><a href="">Contact us</a></li>
                                <li><a href="{{ route('term.terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('privacy.privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('faqs.faqs') }}">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item-footer mb-3 mb-md-0">
                            <h2 class="title-footer">Contact</h2>
                            <ul>
                                <li><span class="mobile"></span> {{ $setting->phone_number }}</li>
                                <li><span class="mobile"></span> {{ $setting->fax_address }}</li>
                                <li><span class="mobile"></span> {{ $setting->email_address }}</li>
                            </ul>
                            <div class="d-flex socail">
                                <a href="" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <div class="text-center">
                    <p class="mb-0">EdPal ® All Rights are Reserved 2022 | Developed & Design with love By <img
                            src="{{ asset('front_assets/images/assets/images/TS2G-logo.png') }}" alt=""></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="{{ asset('front_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/script.js') }}"></script>
</body>

</html>
