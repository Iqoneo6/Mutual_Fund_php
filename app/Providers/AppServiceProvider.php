<?php

namespace App\Providers;
use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Setting;

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
        $general = \App\GeneralSetting::first();
        view()->share('general', $general);

        // Share categories globally
        $categories = Category::all();
        view()->share('category', $categories);

        // You can also share menu if needed
        $menu = \App\Menu::all();
        view()->share('menu', $menu);

        $logo = Setting::where('key', 'site_logo')->first();
        view()->share('site_logo', $logo ? $logo->value : null);
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
