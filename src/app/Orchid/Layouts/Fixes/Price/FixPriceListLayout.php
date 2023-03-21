<?php

namespace App\Orchid\Layouts\Fixes\Price;

use App\Models\Fixes\Category;
use App\Models\Fixes\Price;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FixPriceListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'prices';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Price $price) {
                    return Link::make($price->title)
                        ->route('platform.fix_price.edit', $price);
                }),
            TD::make('category_name', 'Категорія')
                ->render(function (Price $price) {
                    return $price->category->title;
                }),

            TD::make('description', 'Опис'),
        ];
    }
}
