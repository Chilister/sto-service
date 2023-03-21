<?php

namespace App\Orchid\Screens\Cars\FuelType;

use App\Models\Cars\FuelType;
use App\Orchid\Layouts\Cars\FuelType\FuelTypeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class FuelTypeListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'fuelTypes' => FuelType::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Типи палива';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Створити')
                ->icon('pencil')
                ->route('platform.fuel_type.edit')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            FuelTypeListLayout::class
        ];
    }
}
