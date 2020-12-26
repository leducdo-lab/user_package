<?php
namespace TDP\User;

use App\User;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadRoutesFrom(__DIR__ ."/routes/web.php");
        $this->loadViewsFrom(__DIR__."/view","user");
    }
}
