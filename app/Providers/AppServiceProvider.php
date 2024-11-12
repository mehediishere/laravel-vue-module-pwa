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
                                    'icon' => $groupedLink['icon'] ?? '',
                                    'order' => $groupedLink['order'] ?? 1000,  // Default high order if not set
                                    'active' => request()->routeIs($groupedLink['route']),
                                ];
                            }

                            // Sort the grouped links by order
                            usort($links, fn($a, $b) => $a['order'] <=> $b['order']);

                            $additionalLinks[] = [
                                'group' => $link['group'],
                                'icon' => $link['icon'] ?? '',
                                'order' => $link['order'] ?? 100,
                                'links' => $links,
                            ];
                        } else {
                            $additionalLinks[] = [
                                'name' => $link['name'],
                                'route' => route($link['route']),
                                'icon' => $link['icon'] ?? '',
                                'order' => $link['order'] ?? 1000,
                                'active' => request()->routeIs($link['route']),
                            ];
                        }
                    }
                }
            }

            // Sort main links by order
            usort($additionalLinks, fn($a, $b) => $a['order'] <=> $b['order']);

            $view->with('additionalLinks', $additionalLinks);
        });
    }
}
