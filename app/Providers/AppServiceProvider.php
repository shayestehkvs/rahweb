<?php

namespace App\Providers;

use App\Events\TicketStatusChanged;
use App\Listeners\LogTicketStatusChange;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $listen = [
        TicketStatusChanged::class => [
            LogTicketStatusChange::class,
        ],

    ];
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
        Vite::prefetch(concurrency: 3);
    }
}
