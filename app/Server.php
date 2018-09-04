<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Server extends Model
{
	protected $fillable = [
		'user_id', 'server_provider', 'root_password', 'database_password'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
