<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

	protected $fillable = [
		'user_id', 'charge', 'description', 'paid'
	];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
