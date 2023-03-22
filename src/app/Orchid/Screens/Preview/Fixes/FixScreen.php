<?php

namespace App\Orchid\Screens\Preview\Fixes;

use App\Models\Cars\Brand;
use App\Models\Customers\Car;
use App\Models\Fixes\Fix;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FixScreen extends Screen
{
    public Fix $fix;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Fix $fix): iterable
    {
        return [
            'fix' => $fix
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Ремонт';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Детальна інформація про ремонт';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::legend('fix.customer', [
                Sight::make('first_name', "Ім'я"),
                Sight::make('last_name', 'Прізвище'),
                Sight::make('phone_number', 'Телефон'),
            ]),
            Layout::legend('fix.car', [
                Sight::make('vin', 'VIN')->render(fn(Car $car) => $car->vin_number),
                Sight::make('brand', 'Бренд')->render(fn(Car $car) => $car->brand->title),
                Sight::make('model', 'Модель')->render(fn(Car $car) => $car->model->title),
                Sight::make('year', 'Рік випуску')->render(fn(Car $car) => $car->year),
                Sight::make('engine_capacity', "Об'єм двигуна")->render(fn(Car $car) => $car->engine_capacity),
                Sight::make('fuel_type', 'Тип палива')->render(fn(Car $car) => $car->fuelType->title),
                Sight::make('drive_type', 'Тип приводу')->render(fn(Car $car) => $car->driveType->title),
                Sight::make('gearbox_type', 'Тип коробки передач')->render(fn(Car $car) => $car->gearboxType->title),
            ]),
            Layout::table('fix.prices', [
                TD::make('title', 'Назва'),
                TD::make('price', 'Ціна')
            ]),
            Layout::legend('fix', [
                Sight::make('total', 'Сума')
            ]),
        ];
    }
}
