<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Facades\Module;

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
        View::composer('layout.sidebar', function ($view) {
            $additionalLinks = [];

            foreach (Module::allEnabled() as $module) {
                $configPath = $module->getPath() . '/Config/sidebar_links.php';

                if (file_exists($configPath)) {
                    $moduleLinks = require $configPath;

                    foreach ($moduleLinks as $link) {
                        // Check if it is a grouped link or a single link
                        if (isset($link['group'])) {
                            $links = [];

                            foreach ($link['links'] as $groupedLink) {
                                $links[] = [
                                    'name' => $groupedLink['name'],
                                    'route' => route($groupedLink['route']),
                                    'active' => request()->routeIs($groupedLink['route']),
                                ];
                            }

                            $additionalLinks[] = [
                                'group' => $link['group'],
                                'links' => $links,
                            ];
                        } else {
                            $additionalLinks[] = [
                                'name' => $link['name'],
                                'route' => route($link['route']),
                                'active' => request()->routeIs($link['route']),
                            ];
                        }
                    }
                }
            }

            $view->with('additionalLinks', $additionalLinks);
        });
    }
}
