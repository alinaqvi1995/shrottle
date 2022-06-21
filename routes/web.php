<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/composercommand',function(){

    shell_exec('composer update');
});

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about_us', [App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\FrontendController::class, 'service'])->name('service');
Route::get('/how_it_works', [App\Http\Controllers\FrontendController::class, 'howItWorks'])->name('howItWorks');
Route::get('/FAQs', [App\Http\Controllers\FrontendController::class, 'faqs'])->name('faqs');
Route::get('/testimonials', [App\Http\Controllers\FrontendController::class, 'testimonial'])->name('testimonial');
Route::get('/insurance_policy', [App\Http\Controllers\FrontendController::class, 'insurance'])->name('insurance');
Route::get('/contact_us', [App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('/become-host', [App\Http\Controllers\FrontendController::class, 'becomeHost'])->name('becomeHost');
Route::get('/bikes', [App\Http\Controllers\FrontendController::class, 'bikeList'])->name('bike.list');
Route::get('/bikes/details/{id}', [App\Http\Controllers\FrontendController::class, 'bikeDetails'])->name('bike.details');
Route::get('/destinations', [App\Http\Controllers\FrontendController::class, 'destinations'])->name('destinations');
Route::get('/brands', [App\Http\Controllers\FrontendController::class, 'brands'])->name('brands');

// Leads - contactUs
Route::post('/contact_us/submit', [App\Http\Controllers\LeadsController::class, 'contactLeads'])->name('lead.contact');
// Leads - bike
Route::post('/bikes/details/submit', [App\Http\Controllers\LeadsController::class, 'bikeLeads'])->name('lead.bike');
// Subscribe for NewsLetter
Route::post('/news_letter', [App\Http\Controllers\FrontendController::class, 'newsLetter'])->name('lead.newsletter');

// Admin
Route::prefix('/admin')->group(function () {
    Route::middleware(['checkadmin'])->group(function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.index');
        Route::get('/bike', [App\Http\Controllers\AdminController::class, 'bike'])->name('admin.bike');
        Route::get('/bike/{slug}', [App\Http\Controllers\AdminController::class, 'bikeDetails'])->name('admin.bike.details');
        Route::get('/bike/destroy/{id}', [App\Http\Controllers\AdminController::class, 'bikeDelete'])->name('admin.bike.delete');
        Route::get('/buyers', [App\Http\Controllers\AdminController::class, 'buyer'])->name('admin.buyer');
        Route::get('/buyers/{id}', [App\Http\Controllers\AdminController::class, 'buyerDetails'])->name('admin.buyer.details');
        Route::get('/sellers', [App\Http\Controllers\AdminController::class, 'seller'])->name('admin.seller');
        Route::get('/sellers/{id}', [App\Http\Controllers\AdminController::class, 'sellerDetail'])->name('admin.seller.details');
        Route::get('/contactUs-leads', [App\Http\Controllers\AdminController::class, 'leadContact'])->name('admin.leadContact');
        Route::get('/contactUs-leads/{id}', [App\Http\Controllers\AdminController::class, 'leadContactDetail'])->name('admin.leadContact.details');
        Route::get('/contactUs-leads/destroy/{id}', [App\Http\Controllers\AdminController::class, 'leadContactDelete'])->name('admin.leadContact.delete');
        Route::get('/bike_leads', [App\Http\Controllers\AdminController::class, 'leadBike'])->name('admin.leadBike');
        Route::get('/bike_leads/{id}', [App\Http\Controllers\AdminController::class, 'leadBikeDetail'])->name('admin.leadBike.details');
        Route::get('/bike_leads/destroy/{id}', [App\Http\Controllers\AdminController::class, 'leadBikeDelete'])->name('admin.leadBike.delete');
        Route::get('/bike_brands', [App\Http\Controllers\AdminController::class, 'indexBrands'])->name('admin.brands');
        Route::get('/bike_brands/add', [App\Http\Controllers\AdminController::class, 'addBrands'])->name('admin.brand.add');
        Route::post('/bike_brands/store', [App\Http\Controllers\AdminController::class, 'storeBrands'])->name('admin.brand.store');
        Route::get('/bike_brands/edit/{id}', [App\Http\Controllers\AdminController::class, 'editBrands'])->name('admin.brand.edit');
        Route::post('/bike_brands/update', [App\Http\Controllers\AdminController::class, 'updateBrands'])->name('admin.brand.update');
        // Bike Types
        Route::get('/bike_type', [App\Http\Controllers\AdminController::class, 'indexType'])->name('admin.type');
        Route::get('/bike_type/add', [App\Http\Controllers\AdminController::class, 'addType'])->name('admin.type.add');
        Route::post('/bike_type/store', [App\Http\Controllers\AdminController::class, 'storeType'])->name('admin.type.store');
        Route::get('/bike_type/edit/{id}', [App\Http\Controllers\AdminController::class, 'editType'])->name('admin.type.edit');
        Route::post('/bike_type/update', [App\Http\Controllers\AdminController::class, 'updateType'])->name('admin.type.update');
        // Subscribers
        Route::get('/subscribers', [App\Http\Controllers\AdminController::class, 'indexSubscribers'])->name('admin.subscribers');
        // FAQs
        Route::get('/faqs', [App\Http\Controllers\AdminController::class, 'indexFAQs'])->name('admin.faqs');
        Route::get('/faqs/add', [App\Http\Controllers\AdminController::class, 'addFAQs'])->name('admin.faqs.add');
        Route::post('/faqs/store', [App\Http\Controllers\AdminController::class, 'storeFAQs'])->name('admin.faqs.store');
        Route::get('/faqs/edit/{id}', [App\Http\Controllers\AdminController::class, 'editFAQs'])->name('admin.faqs.edit');
        Route::post('/faqs/update', [App\Http\Controllers\AdminController::class, 'updateFAQs'])->name('admin.faqs.update');
        // How it works
        Route::get('/how_it_works', [App\Http\Controllers\AdminController::class, 'indexHowitworks'])->name('admin.how');
        Route::get('/how_it_works/add', [App\Http\Controllers\AdminController::class, 'addHowitworks'])->name('admin.how.add');
        Route::post('/how_it_works/store', [App\Http\Controllers\AdminController::class, 'storeHowitworks'])->name('admin.how.store');
        Route::get('/how_it_works/edit/{id}', [App\Http\Controllers\AdminController::class, 'editHowitworks'])->name('admin.how.edit');
        Route::post('/how_it_works/update', [App\Http\Controllers\AdminController::class, 'updateHowitworks'])->name('admin.how.update');
        // Testimonials
        Route::get('/testimonials', [App\Http\Controllers\AdminController::class, 'indexTestimonials'])->name('admin.test');
        Route::get('/testimonials/add', [App\Http\Controllers\AdminController::class, 'addTestimonials'])->name('admin.test.add');
        Route::post('/testimonials/store', [App\Http\Controllers\AdminController::class, 'storeTestimonials'])->name('admin.test.store');
        Route::get('/testimonials/edit/{id}', [App\Http\Controllers\AdminController::class, 'editTestimonials'])->name('admin.test.edit');
        Route::post('/testimonials/update', [App\Http\Controllers\AdminController::class, 'updateTestimonials'])->name('admin.test.update');
    });
});

Route::prefix('/buyer')->group(function () {
    Route::middleware(['checkbuyer'])->group(function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('buyer.index');
        Route::get('/edit_profile', [App\Http\Controllers\BuyerController::class, 'create'])->name('buyer.create');
        Route::post('/update_profile', [App\Http\Controllers\BuyerController::class, 'update'])->name('buyer.store');
        Route::get('/myTrips', [App\Http\Controllers\BuyerController::class, 'myTrips'])->name('buyer.trips');
        Route::get('/myTrips/info/{id}', [App\Http\Controllers\BuyerController::class, 'myTripDetails'])->name('buyer.trips.details');
        Route::get('/booking-history', [App\Http\Controllers\BuyerController::class, 'bookingHistory'])->name('buyer.bookingHistory');
    });
});

Route::prefix('/seller')->group(function () {
    Route::middleware(['checkseller'])->group(function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('seller.index');
        // Route::get('/edit-profile', [App\Http\Controllers\SellerController::class, 'create'])->name('seller.create');
        Route::get('/edit_profile', [App\Http\Controllers\SellerController::class, 'create'])->name('seller.create');
        Route::post('/update_profile', [App\Http\Controllers\SellerController::class, 'update'])->name('seller.store');
        Route::get('/my_bikes', [App\Http\Controllers\SellerController::class, 'myBikes'])->name('seller.bikes');
        Route::get('/my_bikes/add', [App\Http\Controllers\SellerController::class, 'myBikesAdd'])->name('seller.bikes.add');
        Route::post('/my_bikes/store', [App\Http\Controllers\SellerController::class, 'bikeStore'])->name('seller.bikes.store');
        Route::get('/my_bikes/edit/{id}', [App\Http\Controllers\SellerController::class, 'myBikesEdit'])->name('seller.bikes.edit');
        Route::post('/my_bikes/update', [App\Http\Controllers\SellerController::class, 'bikeUpdate'])->name('seller.bikes.update');
        Route::get('/my_bikes/destroy/{id}', [App\Http\Controllers\SellerController::class, 'bikesDelete'])->name('seller.bikes.del');
        Route::get('/my_bikes/book/{id}', [App\Http\Controllers\SellerController::class, 'bikesBook'])->name('seller.bikes.book');
        Route::post('/my_bikes/status', [App\Http\Controllers\SellerController::class, 'vendorStatus'])->name('seller.vendor.status');
        // State City
        // Route::get('country-state-city',[App\Http\Controllers\SellerController::class, 'index']);
        Route::get('get-states-by-country/{id}',[App\Http\Controllers\SellerController::class, 'getState'])->name('cityState');
        Route::get('get-cities-by-state/{id}',[App\Http\Controllers\SellerController::class, 'getCity'])->name('cityGet');
        // Gallery
        Route::get('/my_gallery', [App\Http\Controllers\SellerController::class, 'myGallery'])->name('seller.gallery');
        Route::get('/my_gallery/add', [App\Http\Controllers\SellerController::class, 'myGalleryCreate'])->name('seller.gallery.create');
        Route::post('/my_gallery/store', [App\Http\Controllers\SellerController::class, 'myGalleryStore'])->name('seller.gallery.store');
        Route::get('/my_gallery/destroy/{id}', [App\Http\Controllers\SellerController::class, 'myGalleryDestroy'])->name('seller.gallery.destroy');
        // Bike Bookings
        Route::get('/bookings', [App\Http\Controllers\SellerController::class, 'bookings'])->name('seller.booking');
        Route::get('/bookings/{id}', [App\Http\Controllers\SellerController::class, 'bookingsDetail'])->name('seller.booking.details');
    
    });
});
