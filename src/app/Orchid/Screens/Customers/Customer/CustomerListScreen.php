<?php

namespace App\Orchid\Screens\Customers\Customer;

use App\Models\Customers\Customer;
use App\Orchid\Layouts\Customers\Customer\CustomerListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class CustomerListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'customers' => Customer::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Клієнти';
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
                ->route('platform.customer.edit')
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
            CustomerListLayout::class
        ];
    }
}
