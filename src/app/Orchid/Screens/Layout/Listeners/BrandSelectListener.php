<?php

namespace App\Orchid\Screens\Layout\Listeners;

use App\Models\Cars\CarModel;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Listener;
use Orchid\Support\Facades\Layout;

class BrandSelectListener extends Listener
{
    protected $targets = [
        'car.brand_id'
    ];
    protected $asyncMethod = 'asyncBrand';

    /**
     * @inheritDoc
     */
    protected function layouts(): iterable
    {
        $brandId = $this->query->get('brand_id');

        return [
            Layout::rows([
                Relation::make('car.model_id')
                    ->title('Модель')
                    ->fromModel(CarModel::class, 'title')
                    ->applyScope('byBrand', $brandId)
            ])
        ];
    }
}
