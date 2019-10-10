<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Discussion;
use App\Channel;
use View;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('channels', Channel::all());
        View::share('discussions', Discussion::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
