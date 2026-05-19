<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $socialLinks = collect();
        $settings = collect();

        if (Schema::hasTable('social_links')) {
            $socialLinks = SocialLink::orderBy('platform')->get();
        }

        if (Schema::hasTable('settings')) {
            $settings = Setting::pluck('value', 'key');
        }

        View::share('socialLinks', $socialLinks);
        View::share('settings', $settings);
    }
}
