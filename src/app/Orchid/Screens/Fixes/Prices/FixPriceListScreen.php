<?php

namespace App\Orchid\Screens\Fixes\Prices;

use App\Models\Fixes\Price;
use App\Orchid\Layouts\Fixes\Price\FixPriceListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class FixPriceListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'prices' => Price::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Ціни ремонту';
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
                ->route('platform.fix_price.edit')
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
            FixPriceListLayout::class
        ];
    }
}
