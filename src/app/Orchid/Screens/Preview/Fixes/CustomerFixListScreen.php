<?php

namespace App\Orchid\Screens\Preview\Fixes;

use App\Models\Cars\Brand;
use App\Models\Customers\Car;
use App\Models\Customers\Customer;
use App\Models\Fixes\Fix;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CustomerFixListScreen extends Screen
{
    public Customer $customer;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Customer $customer): iterable
    {
        $customer->load([
            'fixes',
            'fixes.car.brand',
            'fixes.car.model',
        ]);

        return [
            'customer' => $customer
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список ремонтів користувача ' . $this->customer->full_name;
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return null;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('customer.fixes', [
                TD::make('car', 'Авто')->render(function (Fix $fix) {
                    return $fix->car->select_title;
                }),
                TD::make('total', 'Ціна'),
                TD::make('created_at', 'Дата')
                    ->render(function (Fix $fix) {
                        return $fix->created_at->toDateString();
                    }),
                TD::make()
                    ->align(TD::ALIGN_RIGHT)
                    ->render(function (Fix $fix) {
                        return Link::make()->icon('eye')->route('platform.fix.preview', $fix);
                    }),
            ]),
        ];
    }
}
