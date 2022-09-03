<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#">
            <img alt="Logo" src="{{ asset('front_assets/images/CEW_LOGO1.png') }}" class="h-25px logo" style="height: 40px !important;"/>
            <span style="    font-size: 16px;
    margin-left: 20px;
    color: #FFFFFF;
    font-weight: 500;">
                CEW
            </span>
        </a>
        <!--end::Logo-->

        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="black" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->


    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">

        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1"
                            style="margin-left: -12px">Dashborad</span>
                    </div>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('dashboard') }}" title="Dashboard" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fonticon-home fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Dashboard</span>
                        </a>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                            Users
                        </span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="" title="Users Lists" data-bs-toggle="tooltip"
                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <i class="fa-solid fa-users fs-2"></i>
                        <span class="menu-title ml-5" style="margin-left: 17px;">Users</span>
                    </a>
                </div>


                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                            Main Page
                        </span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('box_header.edit', ['id' => 1]) }}" title="Main Page - Box Header"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                            data-bs-placement="right">
                            <i class="fa-solid fa-box fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Box Header</span>
                        </a>
                    </div>

                    {{-- Start Our Partners Dropdown --}}
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-handshake fs-2 mr-5" style="margin-top: -7px; color:#a6a6a9"></i>
                        </span>
                        <span class="menu-title">Our Partners</span>
                        <span class="menu-arrow"></span>
                    </span>
                    {{-- End Our Partners Dropdown --}}

                    {{-- Start Our Partners Links --}}
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('our_partners.edit', ['id' => 1]) }}" title="Our Partners Table">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Table</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('our_partners.sliderImage') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Slider Image</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('service.index') }}" title="Main Page - Our Services"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                            data-bs-placement="right">
                            <i class="fa-brands fa-stripe-s fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Our Services</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('category.index') }}" title="Categories"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                            data-bs-placement="right">
                            <i class="fa-solid fa-list fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Categories</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('product.index') }}" title="Main Page - Products"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                            data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Our Products</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('why_choose_us.edit', ['id' => 1]) }}" title="Main Page - Products" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Why Choose Us</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('who_are_we.edit', ['id' => 1]) }}" title="Main Page - Products" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Who Are We</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('testimonial.index') }}" title="Main Page - Products" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Testimonials</span>
                        </a>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                            Pages
                        </span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ route('services_page.edit', ['id' => 1]) }}" title="Main Page - Products" data-bs-toggle="tooltip"
                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <i class="fa-brands fa-product-hunt fs-2"></i>
                        <span class="menu-title ml-5" style="margin-left: 17px;">Service Page</span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">


                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('about.edit', ['id' => 1]) }}" title="About Us" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">About Us Page</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('faqs.index') }}" title="Faqs" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Faqs</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('term.index') }}" title="Term" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Term</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('privacy.index') }}" title="Privacy" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Privacy</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('gallery.index') }}" title="Privacy" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Gallery</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('client.edit', ['id' => 1]) }}" title="Privacy" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Client Page</span>
                        </a>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                                    Certifications
                                </span>
                            </div>
                        </div>

                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-handshake fs-2 mr-5" style="margin-top: -7px; color:#a6a6a9"></i>
                            </span>
                            <span class="menu-title">Certifications</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">

                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('certification.index') }}" title="Service Certifications">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Services Certification</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('certification.aboutCertification') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">About Us Certification</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('certification.footerCertification') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Footer Certification</span>
                                </a>
                            </div>
                        </div>
                    </div>




                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                                Settings
                            </span>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('setting.edit', ['id' => 1]) }}" title="Privacy" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Setting</span>
                        </a>
                    </div>


                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                                Contact Box
                            </span>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('contact_us.index')}}" title="Privacy" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Contact Us</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1" style="margin-left: -12px">
                                Sales Inquiry Box
                            </span>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('sales.index')}}" title="Privacy" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <i class="fa-brands fa-product-hunt fs-2"></i>
                            <span class="menu-title ml-5" style="margin-left: 17px;">Sales Inquiry</span>
                        </a>
                    </div>



{{--                    --}}{{-- Start Our Partners Dropdown --}}
{{--                    <span class="menu-link">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <i class="fa-solid fa-handshake fs-2 mr-5" style="margin-top: -7px; color:#a6a6a9"></i>--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Our Partners</span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </span>--}}
{{--                    --}}{{-- End Our Partners Dropdown --}}

{{--                    --}}{{-- Start Our Partners Links --}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}

{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{ route('our_partners.index') }}" title="Our Partners Table">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                                <span class="menu-title">Table</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="#">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                                <span class="menu-title">Slider Image</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link" href="{{ route('service.index') }}" title="Main Page - Our Services"--}}
{{--                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"--}}
{{--                           data-bs-placement="right">--}}
{{--                            <i class="fa-brands fa-stripe-s fs-2"></i>--}}
{{--                            <span class="menu-title ml-5" style="margin-left: 17px;">Our Services</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link" href="{{ route('category.index') }}" title="Categories"--}}
{{--                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"--}}
{{--                           data-bs-placement="right">--}}
{{--                            <i class="fa-solid fa-list fs-2"></i>--}}
{{--                            <span class="menu-title ml-5" style="margin-left: 17px;">Categories</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link" href="{{ route('product.index') }}" title="Main Page - Products"--}}
{{--                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"--}}
{{--                           data-bs-placement="right">--}}
{{--                            <i class="fa-brands fa-product-hunt fs-2"></i>--}}
{{--                            <span class="menu-title ml-5" style="margin-left: 17px;">Our Products</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link" href="{{ route('why_choose_us.edit', ['id' => 1]) }}" title="Main Page - Products" data-bs-toggle="tooltip"--}}
{{--                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--                            <i class="fa-brands fa-product-hunt fs-2"></i>--}}
{{--                            <span class="menu-title ml-5" style="margin-left: 17px;">Why Choose Us</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link" href="{{ route('who_are_we.edit', ['id' => 1]) }}" title="Main Page - Products" data-bs-toggle="tooltip"--}}
{{--                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--                            <i class="fa-brands fa-product-hunt fs-2"></i>--}}
{{--                            <span class="menu-title ml-5" style="margin-left: 17px;">Who Are We</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link" href="{{ route('testimonial.index') }}" title="Main Page - Products" data-bs-toggle="tooltip"--}}
{{--                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--                            <i class="fa-brands fa-product-hunt fs-2"></i>--}}
{{--                            <span class="menu-title ml-5" style="margin-left: 17px;">Testimonials</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->

    </div>
    <!--end::Aside menu-->
</div>
<!--end::Aside-->
