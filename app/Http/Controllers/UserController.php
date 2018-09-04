<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function get(User $user)
    {
        return view('admin.user', compact('user'));
    }

    public function updateWebhook(Request $request)
    {
    	$this->validate($request, [
    		'user' => 'required',
    		'webhook_url' => 'required|url'
    	]);

    	$user = User::find($request->user);

    	$user->webhook_url = $request->webhook_url;
    	$user->save();
    	
    	return back();
    }
}
