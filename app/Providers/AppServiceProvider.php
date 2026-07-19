<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\AssdtSidebar;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.sidebar', function ($view) {

            $menus = AssdtSidebar::where('parent_id', 0)
                ->where('is_active', 1)
                ->with('children')
                ->orderBy('tab_order')
                ->get();

            $view->with('menus', $menus);
        });
    }
}