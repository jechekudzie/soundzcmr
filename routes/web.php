<?php

use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\StripeController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/check', 'AdminController@index');
Route::get('/logs', 'LoginController@logs');



//Payments
Route::get('/select_plan', 'FlutterwaveController@select_plan');
Route::get('/checkout/{package}', 'FlutterwaveController@checkout');

/*Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
//Webhook for updates
Route::post('/webhook/flutterwave', [FlutterwaveController::class, 'webhook'])->name('webhook');*/


Route::post('stripe/create', [StripeController::class, 'create'])->name('stripe.create');


Route::get('/login/{provider}', 'LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'LoginController@handleProviderCallback');


Route::get('/dashboard', 'SiteController@index')->middleware('auth');
Route::get('/update_role', 'SiteController@update_role')->middleware('auth');
Route::get('/profile', 'SiteController@profile')->middleware('auth');
Route::post('/profile/update/{user}', 'SiteController@profile_update')->middleware('auth');
Route::get('/update_role', 'SiteController@update_role')->middleware('auth');
Route::post('/store_role', 'SiteController@store_role')->middleware('auth');


Route::get('/events', 'SiteController@events')->middleware('auth');
Route::get('/events/{event}', 'SiteController@event')->middleware('auth');
Route::get('/event_episode/{episode}', 'SiteController@event_episode')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:Admin']], function () {

        Route::get('/admin', 'Admin\EventsController@index');
        Route::resource('/admin/event_types', 'Admin\EventTypesController');
        Route::resource('/admin/events', 'Admin\EventsController');

        Route::get('/admin/{event}/episodes', 'Admin\EpisodesController@index');
        Route::post('/admin/{event}/episodes', 'Admin\EpisodesController@store');

//add event contestants
        Route::get('/admin/{event}/contestant', 'Admin\EventParticipantsController@index');
        Route::post('/admin/{event}/contestant', 'Admin\EventParticipantsController@store');

        Route::get('/admin/{eventParticipant}/contestant/edit', 'Admin\EventParticipantsController@edit');
        Route::patch('/admin/{eventParticipant}/contestant/update', 'Admin\EventParticipantsController@update');
        Route::get('/admin/{eventParticipant}/contestant/show', 'Admin\EventParticipantsController@show');
        Route::delete('/admin/{eventParticipant}/contestant/destroy', 'Admin\EventParticipantsController@destroy');


//add episode contestants
        Route::get('/admin/{episode}/contestants', 'Admin\EpisodesController@show');
        Route::post('/admin/{episode}/store_contestants', 'Admin\EpisodesController@store_contestants');

        Route::get('/admin/{episode}/episode/edit', 'Admin\EpisodesController@edit_episode');
        Route::patch('/admin/{episode}/episode/update', 'Admin\EpisodesController@update_episode');

        Route::resource('/admin/streaming_platforms', 'Admin\StreamingPlatformController');
        Route::resource('/admin/ticket_types', 'Admin\TicketTypesController');
        Route::resource('/admin/items', 'Admin\ItemsController');
        Route::resource('/admin/packages', 'Admin\PackagesController');

        Route::resource('/admin/artists', 'Admin\ArtistsController');
        Route::resource('/admin/users', 'Admin\UsersController');
        Route::resource('/admin/roles', 'Admin\RolesController');
        Route::resource('/admin/permissions', 'Admin\PermissionsController');

        Route::post('/admin/{role}/role_permissions', 'Admin\RolePermissionsController@store');

        Route::resource('/admin/subscriptions', 'Admin\SubscriptionsController');

    });
});

require __DIR__ . '/auth.php';
