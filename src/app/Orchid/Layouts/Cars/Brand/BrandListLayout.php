<?php

namespace App\Orchid\Layouts\Cars\Brand;

use App\Models\Cars\Brand;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BrandListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'brands';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Brand $brand) {
                    return Link::make($brand->title)
                        ->route('platform.brand.edit', $brand);
                }),
            TD::make('priority', 'Приоритет'),
        ];
    }
}
