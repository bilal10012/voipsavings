<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

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

Route::get('/', 'web\HomeController@index')->name('webIndexPage');
Route::any('/contact-us', 'web\HomeController@contactUsPage')->name('contactUsPage');
Route::any('/about', 'web\HomeController@about')->name('about');
Route::any('/gallery', 'web\HomeController@Gallery')->name('gallery');
Route::any('/service', 'web\HomeController@Service')->name('service');
Route::any('/pricing', 'web\HomeController@pricing')->name('pricing');
// Route::any('/service', 'web\HomeController@fulfilment')->name('fulfilment');
Route::get('/account/login', 'web\HomeController@accountLoginPage')->name('accountLoginPage');
Route::post('newsletter', 'web\HomeController@newsletter')->name('newsletter');
Route::get('logout', 'Auth\LoginController@logout')->name('accountLogout');
Route::any('/freeInquiry', 'web\HomeController@freeInquiry')->name('freeInquiry');
Route::any('/supplier', 'web\HomeController@supplier')->name('supplier');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('panel')->name('admin.')->group(function () {
    Route::get('/', 'Admin\HomeController@index')->name('panel');
    Route::get('inquiries', 'Admin\HomeController@showInquiries')->name('showInquiries');
    Route::get('free-estimate-inquiries', 'Admin\HomeController@showfreeinquiry')->name('showfreeinquiry');
    Route::get('free-estimate-inquiry/{id}', 'Admin\HomeController@displayfreeinquiry')->name('displayfreeinquiry');
    Route::delete('free-estimate-inquiry/delete/{id}', 'Admin\HomeController@destroyfreeinquiry')->name('destroyfreeinquiry');
    Route::get('inquiry/{id}', 'Admin\HomeController@displayInquiry')->name('displayInquiry');
    Route::delete('inquiry/delete/{id}', 'Admin\HomeController@destroy')->name('deleteInquiry');
    Route::get('profile', 'User\ProfileController@index')->name('profile');
    Route::get('userprofile', 'User\ProfileController@User')->name('userprofile');
    Route::get('subscription/cancel', 'User\ProfileController@cancelSubscription')->name('endSubscription');
    Route::post('profile/{user}', 'User\ProfileController@update')->name('profileUpdate');
    Route::post('change/{user}', 'User\ProfileController@updatePassword')->name('updatePassword');
    Route::get('/mark-all-read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    });
    Route::group(['middleware' => 'role:Administrator'], function () {
        Route::post('/mark-as-read', 'Admin\HomeController@markAsNotification')->name('markAsNotification');
        Route::get('content', 'Admin\CmsController@index')->name('content');
        Route::get('banner', 'Admin\BannerController@index')->name('banner');
        Route::get('banner/{banner}', 'Admin\BannerController@edit')->name('banner.edit');
        Route::post('banner', 'Admin\BannerController@update')->name('banner.update');
        Route::post('image/{id}', 'Admin\BannerController@updateImage')->name('banner.updatePrimaryImage');
        Route::get('content/{content}', 'Admin\CmsController@edit')->name('content.edit');
        Route::post('content', 'Admin\CmsController@update')->name('content.update');
        Route::post('image/{id}', 'Admin\CmsController@updateImage')->name('content.updatePrimaryImage');
        Route::get('config', 'Admin\CmsController@config')->name('siteIdentity');
        Route::post('config', 'Admin\CmsController@updateConfig')->name('updateConfig');
        Route::post('logo', 'Admin\CmsController@updateLogo')->name('updateLogo');
        Route::post('logo-video', 'Admin\CmsController@updateLogoVideo')->name('updateLogoVideo');
        Route::post('banner/upload/{id}', 'Admin\BannerController@uploadBanner')->name('banner.upload');
        Route::get('newsletters', 'Admin\HomeController@showSubscriptions')->name('showSubscriptions');
        Route::delete('newsletter/{id}', 'Admin\HomeController@deleteSubscriptions')->name('deleteSubscriptions');
        Route::get('inquiries', 'Admin\HomeController@showInquiries')->name('showInquiries');
        Route::get('inquiry/{id}', 'Admin\HomeController@displayInquiry')->name('displayInquiry');
        Route::delete('inquiry/delete/{id}', 'Admin\HomeController@destroy')->name('deleteInquiry');
        Route::get('subscriptions', 'Admin\FinanceController@subscriptions')->name('subscriptions');
        Route::get('service/{id}/feature', 'Admin\ServiceController@feature')->name('service.feature');
        Route::get('fulfilment/{id}/feature', 'Admin\FulfilmentController@feature')->name('fulfilment.feature');
        Route::get('pricing/{id}/feature', 'Admin\FulfilmentController@feature')->name('pricing.feature');
        Route::get('feature/{id}/feature', 'Admin\TestimonialController@feature')->name('testimonial.feature');
        Route::resource('gallery', 'Admin\GalleryController');
        Route::post('gallery/upload/{id}', 'Admin\GalleryController@uploadGallery')->name('gallery.upload');
        Route::resource('our-work', 'Admin\WorkController');
        Route::post('our-work/upload/{id}', 'Admin\WorkController@uploadWork')->name('our-work.upload');
        // EXTRA ROUTES
        Route::resource('user', 'Admin\UserController');
        Route::any('users/distance/{id}', 'Admin\UserController@distance');
        Route::any('users/graph/{id}', 'Admin\UserController@graph');
        // EXTRA ROUTES
        Route::resource('banners', 'Admin\BannerController');
        Route::resource('user', 'Admin\UserController');
        Route::resource('supplier', 'Admin\SupplierController');
        Route::resource('service', 'Admin\ServiceController');
        Route::resource('city', 'Admin\CityController');
        Route::resource('fulfilment', 'Admin\FulfilmentController');
        Route::resource('testimonial', 'Admin\TestimonialController');
        Route::resource('pricing', 'Admin\PricingController');
    });
    Route::group(['middleware' => 'role:Administrator,Seller'], function () {
        Route::resource('product', 'Admin\ProductController');
        Route::post('product-image', 'Admin\ProductController@descriptionImage')->name('product.descriptionImage');
    });
});
Route::prefix('user')->name('user.')->group(function () {
    Route::group(['middleware' => 'role:Customer'], function () {
        Route::get('/', 'User\ProfileController@userDashboard')->name('userDashboard');
        Route::get('order/index', 'User\ProfileController@orderPage')->name('userOrderPage');
        Route::get('order/invoice/{id}', 'User\ProfileController@Invoice');
        Route::get('order/{id}', 'User\ProfileController@orderDetailPage');
        Route::get('user/{id}', 'User\ProfileController@orderDetailPage');
        Route::resource('vehicle', 'Admin\ProductController');
        Route::post('product-image', 'Admin\ProductController@descriptionImage')->name('product.descriptionImage');
        Route::get('vehicle-inquiries', 'Admin\HomeController@showproductinquiry')->name('showproductinquiry');

        Route::get('vehicle-inquiry/{id}', 'Admin\HomeController@displayproductinquiry')->name('displayproductinquiry');
        Route::delete('vehicle-inquiry/delete/{id}', 'Admin\HomeController@destroyproductinquiry')->name('destroyproductinquiry');
    });
});
Route::group(['middleware' => 'auth'], function () {
    Route::post('/addtocart', 'web\CartController@AddToCart')->name('addtocart');
    Route::get('/addtocart', 'web\CartController@AddToCart')->name('addtocart');
});

//BilalProject
Route::get('/bilal-home', 'bilal\HomeController@index');
