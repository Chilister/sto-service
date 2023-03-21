<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Example screen')
                ->icon('monitor')
                ->route('platform.example')
                ->title('Navigation')
                ->badge(fn () => 6),

            Menu::make('Ремонт')
                ->icon('code')
                ->list([
                    Menu::make('Категорії ремонту')
                        ->icon('bag')
                        ->route('platform.fix_category.list'),
                ]),

            Menu::make('Системні налаштування')
                ->title('Користувачі')
                ->icon('code')
                ->list([
                    Menu::make(__('Users'))
                        ->icon('user')
                        ->route('platform.systems.users')
                        ->permission('platform.systems.users'),
                    Menu::make(__('Roles'))
                        ->icon('lock')
                        ->route('platform.systems.roles')
                        ->permission('platform.systems.roles'),
                ]),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
