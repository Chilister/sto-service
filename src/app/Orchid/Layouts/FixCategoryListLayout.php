<?php

namespace App\Orchid\Layouts;

use App\Models\Fixes\Category;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FixCategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Category $category) {
                    return Link::make($category->title)
                        ->route('platform.fix_category.edit', $category);
                }),

            TD::make('description', 'Опис'),
        ];
    }
}
