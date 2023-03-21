<?php

namespace App\Orchid\Layouts\Cars\FuelType;

use App\Models\Cars\Brand;
use App\Models\Cars\FuelType;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FuelTypeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'fuelTypes';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (FuelType $fuelType) {
                    return Link::make($fuelType->title)
                        ->route('platform.fuel_type.edit', $fuelType);
                }),
        ];
    }
}
