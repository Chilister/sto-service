<?php

namespace App\Orchid\Layouts\Fixes\Fix;

use App\Models\Fixes\Fix;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FixListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'fixes';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('customer', 'Елієнт')
                ->render(function (Fix $fix) {
                    return Link::make($fix->customer->full_name)
                        ->route('platform.fix.edit', $fix);
                }),
            TD::make('car', 'Авто')
                ->render(function (Fix $fix) {
                    return $fix->car->brand->title . ' ' . $fix->car->model->title . ' ' . $fix->car->year;
                }),

            TD::make('total', 'Сума'),
        ];
    }
}
