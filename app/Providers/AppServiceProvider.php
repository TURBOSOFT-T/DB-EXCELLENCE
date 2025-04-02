<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{Menu, Setting, Shop};
use Illuminate\Support\Facades\{Blade, View};
use App\Http\ViewComposers\HomeComposer;
//use Illuminate\View\View;

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
        if (app()->runningInConsole()) {
            return;
        }

        View::share('shop', Shop::first() ?? null);

        Blade::directive('langL', function ($expression) {
            return "<?php echo transL({$expression}); ?>";
        });

        $settings = Setting::all();
        foreach ($settings as $setting) {
            config(['app.' . $setting->key => $setting->value]);
        }

        View::composer(['components.layouts.app'], function ($view)  {
            $view->with(
                'menus',
                Menu::with(['submenus' => fn($query) => $query->orderBy('order')])
                    ->orderBy('order')
                    ->get()
            );
        });

        View::composer(['front.fixe', 'front.index', 'front.shop.index'], HomeComposer::class);
        setlocale(LC_TIME, config('app.locale'));
    }
}
