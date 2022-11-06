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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
		\App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \Illuminate\Pagination\Paginator::useBootstrap();
    }

    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
}
