<?php

namespace App\Orchid\Screens\Layout\Listeners;

use App\Models\Cars\CarModel;
use App\Models\Customers\Car;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Listener;
use Orchid\Support\Facades\Layout;

class CustomerCarSelectListener extends Listener
{
    protected $targets = [
        'fix.customer_id'
    ];
    protected $asyncMethod = 'asyncCar';

    /**
     * @inheritDoc
     */
    protected function layouts(): iterable
    {
        $customerId = $this->query->get('customer_id');

        return [
            Layout::rows([
                Relation::make('fix.car_id')
                    ->title('Авто')
                    ->fromModel(Car::class, 'id')
                    ->applyScope('byCustomer', $customerId)
                    ->displayAppend('select_title')
            ])
        ];
    }
}
