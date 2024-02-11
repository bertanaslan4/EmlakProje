<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SetLanguageController;
use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AdvertTypeController;
use App\Http\Controllers\AdvertApplicationController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\PropertyDetailController;
use App\Http\Controllers\UserController as FrontUserController;
use App\Http\Controllers\AdvertController as FrontAdvertController;
use App\Http\Controllers\ContactController as FrontContactController;
use App\Http\Controllers\Admin\LanguageController as AdminLanguageController;

Route::prefix('admin')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [AdminAuthController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'store'])->name('admin.loginAction');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::delete('/logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard.dashboard');
        })->name('admin.dashboard');

        Route::controller(AdvertController::class)->group(function () {
            Route::get('/advert-list', 'index')->name('admin.advert-list');
            Route::get('/advert-detail/{id}', 'show')->name('admin.advert-detail');
            Route::get('/advert-create', 'showCreate')->name('admin.advert-create');
            Route::post('advert-store', 'store')->name('admin.advert-store');
            Route::post('advert-store/media', 'storeMedia')->name('admin.advert-storeMedia');
            Route::get('/advert-edit/{id}', 'edit')->name('admin.advert-edit');
            Route::put('/advert-update/{id}', 'update')->name('admin.advert-update');
            Route::get('/advert-destroy/{id}',  'destroy')->name('admin.advert-destroy');
            Route::get('/advert-facility-delete/{id}/{ad_id}',  'facilityDelete')->name('admin.advert-facility-delete');
            Route::get('/advert-property-delete/{id}/{ad_id}',  'propertyDelete')->name('admin.advert-property-delete');
            Route::get('/advert-remove-single-gallery/{id}/{ad_id}',  'removeSingleGallery')->name('admin.advert-remove-single-gallery');
            Route::get('/advert-applications', 'applicationIndex')->name('admin.advert-application-list');
            Route::post('/advert-applications-update', 'applicationUpdate')->name('admin.application-status-update');
        });

        Route::get('/feature-list', [FeatureController::class, 'index'])->name('admin.feature-list');
        Route::post('/feature-store', [FeatureController::class, 'store'])->name('admin.feature-store');
        Route::post('/feature-edit', [FeatureController::class, 'edit'])->name('admin.feature-edit');
        Route::get('/feature-destroy/{id}', [FeatureController::class, 'destroy'])->name('admin.feature-destroy');
        Route::get('/get-feature/{id}', [FeatureController::class, 'getFeatures'])->name('admin.get-feature');

        Route::get('/facility-list', [FacilityController::class, 'index'])->name('admin.facility-list');
        Route::post('/facility-store', [FacilityController::class, 'store'])->name('admin.facility-store');
        Route::post('/facility-edit', [FacilityController::class, 'edit'])->name('admin.facility-edit');
        Route::get('/facility-destroy/{id}', [FacilityController::class, 'destroy'])->name('admin.facility-destroy');
        Route::get('/get-facility/{id}', [FacilityController::class, 'getFacilities'])->name('admin.get-facility');

        Route::get('advert-type-list', [AdvertTypeController::class, 'index'])->name('admin.advert-type-list');
        Route::post('advert-type-store', [AdvertTypeController::class, 'store'])->name('admin.advert-type-store');
        Route::post('advert-type-edit', [AdvertTypeController::class, 'edit'])->name('admin.advert-type-edit');
        Route::get('/advert-type-destroy/{id}', [AdvertTypeController::class, 'destroy'])->name('admin.advert-type-destroy');
        Route::get('/get-advert-type/{id}', [AdvertTypeController::class, 'getAdvertTypes'])->name('admin.get-advert-type');

        Route::get('/property-list', [PropertyDetailController::class, 'index'])->name('admin.property-list');
        Route::post('/property-store', [PropertyDetailController::class, 'store'])->name('admin.property-store');
        Route::post('/property-edit', [PropertyDetailController::class, 'edit'])->name('admin.property-edit');
        Route::get('/property-destroy/{id}', [PropertyDetailController::class, 'destroy'])->name('admin.property-destroy');
        Route::get('/get-property/{id}', [PropertyDetailController::class, 'getProperties'])->name('admin.get-property');

        Route::get('/user-list', [UserController::class, 'index'])->name('admin.user-list');
        Route::post('/user-store', [UserController::class, 'store'])->name('admin.user-store');
        Route::post('/user-update', [UserController::class, 'update'])->name('admin.user-update');
        Route::get('/user-destroy/{id}', [UserController::class, 'destroy'])->name('admin.user-destroy');

        //Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
        Route::post('/settings-update', [SettingsController::class, 'update'])->name('admin.settings-update');
        Route::get('/language-list', [AdminLanguageController::class, 'index'])->name('admin.language-list');
        Route::post('/language-store', [AdminLanguageController::class, 'store'])->name('admin.language-store');
        Route::post('/language-update', [AdminLanguageController::class, 'update'])->name('admin.language-update');
        Route::get('/translation-list', [AdminLanguageController::class, 'translationList'])->name('admin.translation-list');
        Route::post('/translation-store', [AdminLanguageController::class, 'translationStore'])->name('admin.translation-store');
        Route::post('/translation-edit', [AdminLanguageController::class, 'translationEdit'])->name('admin.translation-edit');

        Route::get('/currency-list', [CurrencyController::class, 'index'])->name('admin.currency-list');
        Route::post('/currency-store', [CurrencyController::class, 'store'])->name('admin.currency-store');
        Route::post('/currency-update', [CurrencyController::class, 'update'])->name('admin.currency-update');
    });
});

Route::get('lang/{lang}', SetLanguageController::class)->name('lang');

Route::post('/login', [UserAuthController::class, 'store'])->name('user.loginAction')->middleware('guest');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.registerAction')->middleware('guest');
Route::delete('/logout', [UserAuthController::class, 'destroy'])->name('user.logout')->middleware('user');

//user-dashboard
Route::get('/dashboard', [FrontUserController::class, 'index'])->name('user.dashboard')->middleware(['user']);
Route::get('/dashboard/profile', [FrontUserController::class, 'profile'])->name('user.profile')->middleware('user');
Route::post('/dashboard/profile/profileUpdate', [FrontUserController::class, 'profileUpdate'])->name('user.dashboard.profileUpdate')->middleware('user');
Route::post('/dashboard/profile/passwordUpdate', [FrontUserController::class, 'passwordUpdate'])->name('user.dashboard.passwordUpdate')->middleware('user');

//Ajax
Route::get('/get-states/{id}', [LocationController::class, 'getStates'])->name('get-states');
Route::get('/get-cities-state/{id}', [LocationController::class, 'getCitiesWithStateId'])->name('get-cities-state');
Route::get('/get-cities-country/{id}', [LocationController::class, 'getCitiesWithCountryId'])->name('get-cities-country');
Route::get('/get-user/{id}', [UserController::class, 'getUser'])->name('get-user');
Route::get('/get-language/{id}', [AdminLanguageController::class, 'getLanguage'])->name('get-language');
Route::get('/get-translation/{id}', [AdminLanguageController::class, 'getTranslation'])->name('get-translation');
Route::get('/get-currency/{id}', [CurrencyController::class, 'getCurrency'])->name('get-currency');
Route::get('/get-application-status/{id}', [AdvertApplicationController::class, 'getApplicationStatus'])->name('get-application-status');
Route::get('/get-settings', [SettingsController::class, 'getSettings'])->name('get-settings');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detail/{advert}', [FrontAdvertController::class, 'index'])->name('detail');
Route::post('advert/store/media', [FrontAdvertController::class, 'storeMedia'])->name('advert-storeMedia');

Route::get('/apply/advert/{advert}', [AdvertApplicationController::class, 'index'])->name('apply.index')->middleware('auth');
Route::post('/apply/advert/{advert}', [AdvertApplicationController::class, 'store'])->name('apply.store')->middleware('auth');

Route::get('/apply/thank-you', [AdvertApplicationController::class, 'thanks'])->name('application.thanks');

Route::get('/adverts', [FrontAdvertController::class, 'adverts'])->name('adverts');
Route::get('/contact', [FrontContactController::class, 'index'])->name('contact-us');