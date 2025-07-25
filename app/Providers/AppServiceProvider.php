<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \App\Models\Client::observe(\App\Observers\ClientObserver::class);
        \App\Models\Deals::observe(\App\Observers\DealsObserver::class);
        \App\Models\Vacancy::observe(\App\Observers\VacancyObserver::class);
        \App\Models\Interaction::observe(\App\Observers\InteractionObserver::class);
        \App\Models\Project::observe(\App\Observers\ProjectObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Tag::observe(\App\Observers\TagObserver::class);
        \App\Models\File::observe(\App\Observers\FileObserver::class);
    }
}
