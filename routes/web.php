<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageVilleController;
use App\Http\Controllers\ArchitecteController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;


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

/* Sitemap Route */
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.en');
Route::redirect('/', '/fr/')->name('home.fr.redirect');

/* Redirections explicites pour ajouter le slash final */
Route::redirect('/fr', '/fr/')->name('home.fr.redirect');
Route::redirect('/en', '/en/')->name('home.en.redirect');

Route::get('{locale}', function ($locale) {
    if (in_array($locale, ['fr', 'en'])) {
        return redirect($locale . '/');
    }
    abort(404); // Si la locale n'est pas prise en charge
})->where('locale', '[a-z]{2}');



Route::post('/contact/send', [ContactController::class, 'sendContactMail'])->name('contact.send');

/* French Routes */
Route::group(['prefix' => 'fr/', 'middleware' => 'setlocale:fr'], function () {
    Route::get('/', function () { return view('home'); })->name('home.fr');

    Route::get('nos-services', function () { return view('page.nos-services'); })->name('services.fr');
    Route::get('contact', function () { return view('page.contact'); })->name('contact.fr');

    Route::get('cookies', function () { return view('legals.cookies'); })->name('cookies.fr');
    Route::get('confidentialite', function () { return view('legals.politiques'); })->name('policies.fr');
    Route::get('mentions-legales', function () { return view('legals.mentions'); })->name('mentions.fr');
    Route::get('faq', function () { return view('legals.faq'); })->name('faq.fr');

    Route::get('condition-utilisation', function () { return view('legals.terms_of_service'); })->name('terms.fr');
});

/* English Routes */
Route::group(['prefix' => 'en/', 'middleware' => 'setlocale:en'], function () {
    Route::get('/', function () { return view('home'); })->name('home.en');

    Route::get('our-services', function () { return view('page.nos-services'); })->name('services.en');
    Route::get('contact', function () { return view('page.contact'); })->name('contact.en');

    Route::get('cookies', function () { return view('legals.cookies'); })->name('cookies.en');
    Route::get('legal-notice', function () { return view('legals.legal-notice'); })->name('mentions.en');
    Route::get('faq', function () { return view('legals.faq'); })->name('faq.en');

    Route::get('privacy', function () { return view('legals.privacy'); })->name('policies.en');
    Route::get('terms-of-service', function () { return view('legals.terms-of-service'); })->name('terms.en');
});



Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings/calculate-price', [BookingController::class, 'calculatePrice'])->name('bookings.calculate-price');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}/confirmation', [BookingController::class, 'confirmation'])->name('bookings.confirmation');
