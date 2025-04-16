<?php

namespace App\Providers;

use App\Http\Resources;
use Streams\Ui\Panels\Panel;
use Streams\Api\ApiInterface;
use Streams\Ui\Menu\MenuItem;
use Streams\Ui\Support\Facades\UI;
use App\Components\Admin\Dashboard;
use Illuminate\Support\Facades\View;
use Streams\Api\Support\Facades\API;
use Streams\Ui\Support\Facades\Colors;
use Illuminate\Support\ServiceProvider;
use Streams\Ui\Navigation\NavigationItem;
use Streams\Ui\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        API::routeStreams();
        API::routeEntries();

        // API::interface(
        //     ApiInterface::make('api')
        //         ->endpoints([
        //             'todos' => Resources\Todos::class,
        //         ])
        // );
    }

    public function boot()
    {
        Colors::register([
            'black' => '#000000',
            'danger' => '#FF0000',
        ]);

        foreach (Colors::getColors() as $name => $shades) {
            foreach ($shades as $shade => $color) {
                $variables["{$name}-{$shade}"] = $color;
            }
        }

        View::share('cssVariables', $variables);

        UI::panel(
            Panel::make()
                ->id('admin')
                ->path('admin')
                ->default()
                ->pages([
                    Dashboard::class,
                ])
                // ->resources([
                //     People::class,
                //     Variables::class,
                // ])
                ->userMenuItems([
                    MenuItem::make()
                        ->label('View Website')
                        ->url('/', true)
                        ->icon('heroicon-o-eye'),
                    MenuItem::make()
                        ->label('Logout')
                        ->url('/admin/logout')
                        ->icon('heroicon-o-arrow-left-on-rectangle'),
                ])
                ->navigationGroups([
                    NavigationGroup::make()
                        ->label('Support')
                ])
                ->navigationItems([
                    NavigationItem::make()
                        ->label('Documentation')
                        ->group('Support')
                        ->url('https://streams.dev/docs')
                        ->openInNewTab(true)
                        ->icon('heroicon-o-book-open'),
                    NavigationItem::make()
                        ->label('Repository')
                        ->group('Support')
                        ->url('https://github.com/laravel-streams/streams')
                        ->openInNewTab(true)
                        ->icon('heroicon-o-code-bracket'),
                ])
                ->middleware([
                    'web',
                    //'auth',
                ])
        );
    }
}
