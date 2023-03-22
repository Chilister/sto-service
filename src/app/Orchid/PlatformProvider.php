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
            Menu::make('Персональні дані')
                ->title('Робота')
                ->icon('code')
                ->list([
                    Menu::make('Клієнти')
                        ->icon('bag')
                        ->route('platform.customer.list'),
                    Menu::make('Авто')
                        ->icon('bag')
                        ->route('platform.car.list'),
                    Menu::make('Ремонти')
                        ->icon('bag')
                        ->route('platform.fix.list'),
                ]),

            Menu::make('Ціни')
                ->title('Налаштування')
                ->icon('code')
                ->list([
                    Menu::make('Категорії ремонту')
                        ->icon('bag')
                        ->route('platform.fix_category.list'),
                    Menu::make('Ціни ремонту')
                        ->icon('bag')
                        ->route('platform.fix_price.list'),
                ]),
            Menu::make('Авто')
                ->icon('code')
                ->list([
                    Menu::make('Бренди')
                        ->icon('bag')
                        ->route('platform.brand.list'),
                    Menu::make('Моделі')
                        ->icon('bag')
                        ->route('platform.model.list'),
                    Menu::make('Типи приводу')
                        ->icon('bag')
                        ->route('platform.drive_type.list'),
                    Menu::make('Типи палива')
                        ->icon('bag')
                        ->route('platform.fuel_type.list'),
                    Menu::make('Типи коробки передач')
                        ->icon('bag')
                        ->route('platform.gearbox_type.list'),
                ]),
            Menu::make('Користувачі')
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
