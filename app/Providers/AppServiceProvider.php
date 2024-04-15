<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
{
    Validator::extend('hash', function ($attribute, $value, $parameters, $validator) {
        // Memeriksa apakah nilai adalah hash
        return preg_match('/^[a-f0-9]{32,}$/i', $value);
    });
}


}
