<?php

namespace App;

use App\Job;
use App\Server;
use App\File;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'company', 'domain', 'plan', 'webhook_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function routeNotificationForSlack($notification)
    {
        return $this->webhook_url;
    }
}
