<?php

namespace App\Providers;

use App\Models\Item;
use App\Models\ItemUser;
use App\Observers\ItemObserver;
use App\Observers\ItemUserObserver;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\LayoutComposer;
use App\Http\ViewComposers\CreateItemComposer;

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
        view()->composer(['items.create'], CreateItemComposer::class);

        Item::observe(ItemObserver::class);
        ItemUser::observe(ItemUserObserver::class);
    }
}
