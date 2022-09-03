<?php

use App\Http\Controllers\main_page\BoxHeaderController;
use App\Http\Controllers\main_page\CategoryController;
use App\Http\Controllers\main_page\MainPageController;
use App\Http\Controllers\main_page\OurPartnersController;
use App\Http\Controllers\main_page\ProductController;
use App\Http\Controllers\main_page\ServiceController;
use App\Http\Controllers\main_page\TestimonialController;
use App\Http\Controllers\main_page\WhoAreWeController;
use App\Http\Controllers\main_page\WhyChooseUsController;
use App\Http\Controllers\pages\AboutUsController;
use App\Http\Controllers\pages\CertificationsController;
use App\Http\Controllers\pages\ClientsController;
use App\Http\Controllers\pages\ContactUsController;
use App\Http\Controllers\pages\FaqsController;
use App\Http\Controllers\pages\GalleryController;
use App\Http\Controllers\pages\PrivacyController;
use App\Http\Controllers\pages\ProductsPageController;
use App\Http\Controllers\pages\SalesController;
use App\Http\Controllers\pages\ServicesPageController;
use App\Http\Controllers\pages\SettingController;
use App\Http\Controllers\pages\TermsController;
use App\Http\Controllers\setting\AccountSettingsController;
use App\Models\MPBoxHeader;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainPageController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Start Account Setting
Route::namespace('/box_header')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/account_setting'),
            'as' => 'account_setting.',
        ], function () {
            Route::get('/{id}/edit', [AccountSettingsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AccountSettingsController::class, 'update'])->name('update');
        });
    });
// End Account Setting

// Start box_header Controller
Route::namespace('/box_header')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/box_header'),
            'as' => 'box_header.',
        ], function () {
            Route::get('/', [BoxHeaderController::class, 'index'])->name('index');
            Route::get('/{id}/edit', [BoxHeaderController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BoxHeaderController::class, 'update'])->name('update');
        });
    });
// End box_header Controller

// Start box_header Controller
Route::namespace('/our_partners')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/our_partners'),
            'as' => 'our_partners.',
        ], function () {
            Route::get('/', [OurPartnersController::class, 'index'])->name('index');
            Route::get('/{id}/edit', [OurPartnersController::class, 'edit'])->name('edit');
            Route::put('/{id}', [OurPartnersController::class, 'update'])->name('update');

            // Slider
            Route::get('/slider', [OurPartnersController::class, 'sliderImage'])->name('sliderImage');
            Route::post('/slider', [OurPartnersController::class, 'addSliderImage'])->name('addSliderImage');
            Route::delete('/{id}', [OurPartnersController::class, 'deleteSliderImage'])->name('deleteSliderImage');
        });
    });
// End box_header Controller

// Start Services Controller
Route::namespace('/services')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/services'),
            'as' => 'service.',
        ], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::post('/', [ServiceController::class, 'store'])->name('store');
            Route::get('/{id}/show', [ServiceController::class, 'show'])->name('show')->withoutMiddleware(['auth']);
            Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
            Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('delete');

            // Slider
            Route::get('/slider', [ServiceController::class, 'sliderImage'])->name('sliderImage');
        });
    });
// End Services Controller

// Start Category Controller
Route::namespace('/category')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/categories'),
            'as' => 'category.',
        ], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{id}/show', [CategoryController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('delete');
        });
    });
// End Category Controller

// Start Product Controller
Route::namespace('/product')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/products'),
            'as' => 'product.',
        ], function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/', [ProductController::class, 'store'])->name('store');
            Route::get('/{id}/show', [ProductController::class, 'show'])->name('show')->withoutMiddleware(['auth']);
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('delete');

            // Ajax For Sub Category
            Route::get('/sub_category', [ProductController::class, 'getSubCategory'])->name('getSubCategory');
        });
    });
// End Product Controller

// Start Product Controller
Route::namespace('/why_choose_us')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/why_choose_us'),
            'as' => 'why_choose_us.',
        ], function () {
            Route::get('/{id}/edit', [WhyChooseUsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [WhyChooseUsController::class, 'update'])->name('update');
        });
    });
// End Product Controller

// Start who_are_we Controller
Route::namespace('/who_are_we')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/who_are_we'),
            'as' => 'who_are_we.',
        ], function () {
            Route::get('/{id}/edit', [WhoAreWeController::class, 'edit'])->name('edit');
            Route::put('/{id}', [WhoAreWeController::class, 'update'])->name('update');
        });
    });
// End who_are_we Controller

// Start who_are_we Controller
Route::namespace('/Testimonial')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/Testimonial'),
            'as' => 'testimonial.',
        ], function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('index');
            Route::get('/create', [TestimonialController::class, 'create'])->name('create');
            Route::post('/', [TestimonialController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [TestimonialController::class, 'edit'])->name('edit');
            Route::put('/{id}', [TestimonialController::class, 'update'])->name('update');
        });
    });
// End who_are_we Controller

/**
 * Start Pages
 */

// Start services_page Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/services_page'),
            'as' => 'services_page.',
        ], function () {
            Route::get('/', [ServicesPageController::class, 'index'])->name('index')->withoutMiddleware('auth');
            Route::get('/{id}/edit', [ServicesPageController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ServicesPageController::class, 'update'])->name('update');
        });

        Route::group([
            'prefix' => ('/certifications'),
            'as' => 'certification.',
        ], function () {
            Route::get('/', [CertificationsController::class, 'index'])->name('index');
            Route::get('/create', [CertificationsController::class, 'create'])->name('create');
            Route::post('/', [CertificationsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [CertificationsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [CertificationsController::class, 'update'])->name('update');
        });
    });
// End services_page Controller

// Start products_page Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/products_page'),
            'as' => 'products_page.',
        ], function () {
            Route::get('/', [ProductsPageController::class, 'index'])->name('index')->withoutMiddleware('auth');
            Route::get('/{id}/edit', [ProductsPageController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductsPageController::class, 'update'])->name('update');
        });
    });
// End products_page Controller

// Start About Us Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/about'),
            'as' => 'about.',
        ], function () {
            Route::get('/', [AboutUsController::class, 'index'])->name('index')->withoutMiddleware('auth');
            Route::get('/{id}/edit', [AboutUsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AboutUsController::class, 'update'])->name('update');
        });
    });
// End About Us Controller

// Start About Us Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/faqs'),
            'as' => 'faqs.',
        ], function () {
            Route::get('/faqs', [FaqsController::class, 'faqs'])->name('faqs');
            Route::get('/', [FaqsController::class, 'index'])->name('index')->withoutMiddleware('auth');
            Route::get('/create', [FaqsController::class, 'create'])->name('create');
            Route::post('/', [FaqsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [FaqsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [FaqsController::class, 'update'])->name('update');
        });
    });
// End About Us Controller

// End Terms Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/term'),
            'as' => 'term.',
        ], function () {
            Route::get('/', [TermsController::class, 'terms'])->name('terms')->withoutMiddleware('auth');
            Route::get('/index', [TermsController::class, 'index'])->name('index');
            Route::get('/create', [TermsController::class, 'create'])->name('create');
            Route::post('/', [TermsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [TermsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [TermsController::class, 'update'])->name('update');
        });
    });
// End About Us Controller

// End Terms Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/privacy'),
            'as' => 'privacy.',
        ], function () {
            Route::get('/', [PrivacyController::class, 'privacy'])->name('privacy')->withoutMiddleware('auth');
            Route::get('/index', [PrivacyController::class, 'index'])->name('index');
            Route::get('/create', [PrivacyController::class, 'create'])->name('create');
            Route::post('/', [PrivacyController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PrivacyController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PrivacyController::class, 'update'])->name('update');
        });
    });
// End About Us Controller

// End Terms Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/gallery'),
            'as' => 'gallery.',
        ], function () {
            Route::get('/', [GalleryController::class, 'gallery'])->name('gallery')->withoutMiddleware('auth');
            Route::get('/index', [GalleryController::class, 'index'])->name('index');
            Route::get('/create', [GalleryController::class, 'create'])->name('create');
            Route::post('/', [GalleryController::class, 'store'])->name('store');
            Route::get('/{id}', [GalleryController::class, 'show'])->name('show')->withoutMiddleware(['auth']);
            Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
            Route::put('/{id}', [GalleryController::class, 'update'])->name('update');
        });
    });
// End About Us Controller

// End setting Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/settings'),
            'as' => 'setting.',
        ], function () {
            Route::get('/{id}/edit', [SettingController::class, 'edit'])->name('edit');
            Route::put('/{id}', [SettingController::class, 'update'])->name('update');
        });
    });
// End setting Controller


// End setting Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/client'),
            'as' => 'client.',
        ], function () {
            Route::get('/', [ClientsController::class, 'index'])->name('index')->withoutMiddleware('auth');
            Route::get('/{id}/edit', [ClientsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ClientsController::class, 'update'])->name('update');
        });
    });
// End setting Controller

// End contact_us Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/contact_us'),
            'as' => 'contact_us.',
        ], function () {
            Route::get('/', [ContactUsController::class, 'contact_us'])->name('contact')->withoutMiddleware('auth');
            Route::get('/index', [ContactUsController::class, 'index'])->name('index');
            Route::post('/', [ContactUsController::class, 'store'])->name('store')->withoutMiddleware('auth');;
            Route::delete('/{id}', [ContactUsController::class, 'destroy'])->name('delete');
        });
    });
// End contact_us Controller


// End contact_us Controller
Route::namespace('/pages')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => ('/sales_inquiry'),
            'as' => 'sales.',
        ], function () {
            Route::get('/', [SalesController::class, 'index'])->name('index');
            Route::post('/', [SalesController::class, 'store'])->name('store')->withoutMiddleware('auth');
            Route::delete('/{id}', [SalesController::class, 'destroy'])->name('delete');
        });
    });
// End contact_us Controller
