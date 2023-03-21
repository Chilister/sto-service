<?php

namespace App\Orchid\Layouts\Cars\GearboxType;

use App\Models\Cars\GearboxType;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class GearboxTypeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'gearboxTypes';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (GearboxType $gearboxType) {
                    return Link::make($gearboxType->title)
                        ->route('platform.gearbox_type.edit', $gearboxType);
                }),
        ];
    }
}
