<?php

namespace App\Providers;

use App\Models\SocialLink;
use Illuminate\Support\Facades\Schema;
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
        $socialLinks = collect();

        if (Schema::hasTable('social_links')) {
            $socialLinks = SocialLink::orderBy('platform')->get();
        }

        View::share('socialLinks', $socialLinks);
    }
}
