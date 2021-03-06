<?php

namespace App\Providers;

use App\Http\ViewComposers\LayoutComposer;
use App\Models\Item;
use App\Observers\ItemObserver;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['layout'], LayoutComposer::class);

        Item::observe(ItemObserver::class);
    }
}
