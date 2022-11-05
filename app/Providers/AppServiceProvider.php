<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\TopicObserver;
use App\Observers\UserObserver;
use App\Models\Topic;
use App\Models\User;


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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
