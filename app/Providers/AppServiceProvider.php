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
        \App\Models\Application::observe(\App\Observers\ApplicationObserver::class);
        \App\Models\FunnelLog::observe(\App\Observers\FunnelLogObserver::class);
        \App\Models\RecruitmentFunnelStage::observe(\App\Observers\RecruitmentFunnelStageObserver::class);
        \App\Models\Report::observe(\App\Observers\ReportObserver::class);
        \App\Models\Finance::observe(\App\Observers\FinanceObserver::class);
        \App\Models\Task::observe(\App\Observers\TaskObserver::class);
        \App\Models\KpiRecord::observe(\App\Observers\KpiRecordObserver::class);
    }
}
