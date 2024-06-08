<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        // Compartir las categorías en todas las vistas
        View::composer('*', function ($view) {
            $categories = Category::select('id', 'title')->get();
            $view->with('categories', $categories);
        });
    }
}
