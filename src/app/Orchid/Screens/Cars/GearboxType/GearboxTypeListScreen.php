<?php

namespace App\Orchid\Screens\Cars\GearboxType;

use App\Models\Cars\GearboxType;
use App\Orchid\Layouts\Cars\GearboxType\GearboxTypeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class GearboxTypeListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'gearboxTypes' => GearboxType::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Типи коробки передач';
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
                ->route('platform.gearbox_type.edit')
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
            GearboxTypeListLayout::class
        ];
    }
}
