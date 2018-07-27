<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;

class AdminComposer
{

    protected $users = User::all();

    /**
     * Create a new Admin composer.
     * 
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('users', $this->users);
    }
}