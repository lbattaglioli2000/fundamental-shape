<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function post(Request $request)
    {
    	$this->validate($request, [
    		'user_id' => 'required|integer',
    		'server_provider' => 'required|string',
    		'root_password' => 'required|string',
    		'database_password' => 'required|string'
    	]);

    	Server::create([
    		'user_id' => $request->user_id,
    		'server_provider' => $request->server_provider,
    		'root_password' => $request->root_password,
    		'database_password' => $request->database_password
    	]);

    	return back();
    }

    public function delete(Server $server)
    {
    	$server->delete();
    	return back();
    }
}
