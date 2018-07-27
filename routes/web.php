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
		return redirect()->back()->with('success', "Payment sent!");
	}

	return redirect()->back()->with('error', "Payment not sent! An error occured.");})->name('charge');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
    	$users = User::all();
        return view('admin.home', compact('users'));
    });
    Route::post('/admin/job/new', 'JobController@post');
});