<?php

namespace App\Http\Controllers\main_page;

use App\Models\Certification;
use App\Models\Image;
use App\Models\MPWhoWeAre;
use App\Models\MPWhyChooseUs;
use App\Models\Product;
use App\Models\Service;
use App\Models\MPBoxHeader;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\MPOurPartners;
use App\Http\Controllers\Controller;

class MainPageController extends Controller
{
    public function index()
    {
        $data['box_header'] = MPBoxHeader::query()->first();

        $data['our_partner'] = MPOurPartners::query()->first();

        $data['partners_slider_image'] = Image::query()->where('imageable_type', 'App/Models/MPOurPartners')->get();

        $data['services'] = Service::query()->get();

        $data['products'] = Product::query()->get();

        $data['why_choose_us'] = MPWhyChooseUs::query()->first();

        $data['who_are_we'] = MPWhoWeAre::query()->first();

        $data['testimonials'] = Testimonial::query()->limit(3)->get();

        $data['setting'] = Setting::query()->first();

        $data['certifications'] = Certification::query()->where('type', 'Footer')->get();

        return view('pages.main_page.index', $data);
    }
}
