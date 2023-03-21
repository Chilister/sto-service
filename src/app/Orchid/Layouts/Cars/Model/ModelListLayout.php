<?php

namespace App\Orchid\Layouts\Cars\Model;

use App\Models\Cars\CarModel;
use App\Models\Fixes\Category;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ModelListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'models';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (CarModel $model) {
                    return Link::make($model->title)
                        ->route('platform.model.edit', $model);
                }),
            TD::make('brand', 'Бренд')
                ->render(function (CarModel $model) {
                    return $model->brand->title;
                }),

            TD::make('priority', 'Приоритет'),
        ];
    }
}
