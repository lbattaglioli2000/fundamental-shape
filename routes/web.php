<?php

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

use App\User;
use Stripe\Stripe;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/charge', function(){

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$token = $_POST['stripeToken'];

	if($charge = \Stripe\Charge::create([
	    'amount' => $_POST['amount'],
	    'currency' => 'usd',
	    'description' => "Plan: " . Auth::user()->plan,
	    'source' => $token,
	])){

		// clear outstanding balance
		$user = Auth::user();
		$user->balance = 0;
		$user->save();

		// redirect back to dashboard
		return redirect()->back()->with('pay-success', "Payment sent!");
	}

	return redirect()->back()->with('pay-error', "Payment not sent! An error occurred.");})->name('charge');
Route::post('/file/submit', 'FileController@post')->name('file.submit');

Route::get('/help', 'HelpController@index')->name('user.help');


// ADMIN 
// 
// 
// ----------------------------------------------
// This section of routes handles all of the admin
// controls.

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {return view('admin.home');});

    Route::post('/admin/job/new', 'JobController@post');
    Route::get('/admin/delete/job/{job}', 'JobController@delete');

    Route::get('/admin/client/{user}', 'UserController@get');
    
    Route::post('/admin/webhook/save', 'UserController@updateWebhook');

    Route::post('/admin/new/server', 'ServerController@post');
    Route::get('/admin/delete/server/{server}', 'ServerController@delete');

    Route::get('/admin/get/file/{file}', 'FileController@get')->name('admin.get.file');
});