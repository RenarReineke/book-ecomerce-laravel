<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
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
        View::share('title', 'Панель администратора');
        // dump('Запроооос!');
        // DB::listen(function ($query) {
        //     $location = collect(debug_backtrace())->filter(function ($trace) {
        //         return !str_contains($trace['file'], 'vendor/');
        //     })->first();

        //     $bindings = implode(", ", $query->bindings);

        //     Log::info("
        //     --------------------
        //     Sql: $query->sql
        //     Bindings: $bindings
        //     Time: $query->time
        //     File: {$location['file']}
        //     Line: {$location['line']}
        //     --------------------
        //     ");

        // });
    }
}
