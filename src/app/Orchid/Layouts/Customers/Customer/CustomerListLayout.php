<?php

namespace App\Orchid\Layouts\Customers\Customer;

use App\Models\Customers\Customer;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CustomerListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'customers';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('first_name', 'Ім\'я')
                ->render(function (Customer $customer) {
                    return Link::make($customer->first_name)
                        ->route('platform.customer.edit', $customer);
                }),

            TD::make('last_name', 'Прізвище'),
            TD::make('phone_number', 'Телефон'),
        ];
    }
}
