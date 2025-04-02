<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

use App\Services\OrderService;

class VoltServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

     

        $this->app->bind(OrderService::class, function ($app) {
			return new OrderService();
		});
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Volt::mount([
            config('livewire.view_path', resource_path('views/livewire')),
            resource_path('views/pages'),
        ]);

      
    }
}
