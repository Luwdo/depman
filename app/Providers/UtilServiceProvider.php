<?php

namespace App\Providers;

use App\Util\FlashMessage;
use Illuminate\Support\ServiceProvider;

class UtilServiceProvider extends ServiceProvider
{

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        FlashMessage::class => FlashMessage::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
