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
                ->icon('task')
                ->list([
                    Menu::make('Клієнти')
                        ->icon('user')
                        ->route('platform.customer.list'),
                    Menu::make('Авто')
                        ->icon('rocket')
                        ->route('platform.car.list'),
                    Menu::make('Ремонти')
                        ->icon('wrench')
                        ->route('platform.fix.list'),
                ]),
            Menu::make('Замовлення')
                ->icon('task')
                ->list([
                    Menu::make('Записи')
                        ->icon('user')
                        ->route('platform.appointment.list'),
                    Menu::make('Календар')
                        ->icon('user')
                        ->route('platform.calendar.preview'),
                ]),

            Menu::make('Ціни')
                ->title('Налаштування')
                ->icon('money')
                ->list([
                    Menu::make('Категорії ремонту')
                        ->icon('options-vertical')
                        ->route('platform.fix_category.list'),
                    Menu::make('Ціни ремонту')
                        ->icon('money')
                        ->route('platform.fix_price.list'),
                ]),
            Menu::make('Авто')
                ->icon('settings')
                ->list([
                    Menu::make('Бренди')
                        ->icon('task')
                        ->route('platform.brand.list'),
                    Menu::make('Моделі')
                        ->icon('task')
                        ->route('platform.model.list'),
                    Menu::make('Типи приводу')
                        ->icon('task')
                        ->route('platform.drive_type.list'),
                    Menu::make('Типи палива')
                        ->icon('task')
                        ->route('platform.fuel_type.list'),
                    Menu::make('Типи коробки передач')
                        ->icon('task')
                        ->route('platform.gearbox_type.list'),
                ]),
            Menu::make('Користувачі')
                ->icon('user')
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
