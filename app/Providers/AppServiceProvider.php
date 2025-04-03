<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use App\View\Composers\PageSettingComposer;
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
        View::composer(['components.header','components.footer'], MenuComposer::class);
        View::composer(['layouts.main-layout', 'components.header','components.footer'], PageSettingComposer::class);
    }
}
