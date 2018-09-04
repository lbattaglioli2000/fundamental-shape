<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Job;
use App\Notifications\NewBill;

use  \GuzzleHttp\Client;

class JobController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

	public function post(Request $request)
	{
		$this->validate($request, [
			'client' => 'required',
			'charge' => 'required|integer',
			'description' => 'required|string'
		]);

		if(Job::create([
			'user_id' => $request->client,
			'charge' => $request->charge,
			'description' => $request->description,
		])){

			$user = new User();
			$user = User::find($request->client);
			$user->balance += $request->charge;
			$user->save();

			$job = $user->jobs()->latest()->first();

			$user->notify(new NewBill($job));

			return redirect()->back()->with('success', 'The user has been billed!');
		}

		return redirect()->back()->with('error', 'The user was not billed. An error occured.');

	}
}
