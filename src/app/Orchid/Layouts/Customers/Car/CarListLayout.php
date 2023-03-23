<?php

namespace App\Orchid\Layouts\Customers\Car;

use App\Models\Customers\Car;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CarListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'cars';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('vin_number', 'VIN')
                ->render(function (Car $car) {
                    return Link::make($car->vin_number)
                        ->route('platform.car.edit', $car);
                }),
            TD::make('customer', 'Власник')
                ->render(function (Car $car) {
                    return $car->customer->full_name;
                }),
            TD::make('brand', 'Бренд')
                ->render(function (Car $car) {
                    return $car->brand->title;
                }),
            TD::make('model', 'Модель')
                ->render(function (Car $car) {
                    return $car->model->title;
                }),

            TD::make('year', 'Рік'),
            TD::make('engine_capacity', "Об'єм"),

            TD::make('fuel_type', 'Паливо')
                ->render(function (Car $car) {
                    return $car->fuelType?->title;
                }),
            TD::make('drive_type', 'Привід')
                ->render(function (Car $car) {
                    return $car->driveType?->title;
                }),
            TD::make('gearbox_type', 'Коробка передач')
                ->render(function (Car $car) {
                    return $car->gearboxType?->title;
                }),
        ];
    }
}
