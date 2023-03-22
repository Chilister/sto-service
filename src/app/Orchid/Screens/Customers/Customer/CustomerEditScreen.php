<?php

namespace App\Orchid\Screens\Customers\Customer;

use App\Models\Customers\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CustomerEditScreen extends Screen
{

    public Customer $customer;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Customer $customer): iterable
    {
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
        return $this->customer->exists ? 'Редагувати клієнта' : 'Створити нового клієнта';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Створити')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->customer->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->customer->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->customer->exists),
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
            Layout::rows([
                Input::make('customer.first_name')
                    ->title('Ім\'я')
                    ->placeholder('Ім\'я'),
                Input::make('customer.last_name')
                    ->title('Прізвище')
                    ->placeholder('Прізвище'),
                Input::make('customer.phone_number')
                    ->mask('(999) 99-99-999')
                    ->title('Телефон')

            ])
        ];
    }

    /**
     * @param Customer $customer
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Customer $customer, Request $request)
    {
        $data = $request->get('customer');

        $customer->fill($data)->save();

        Alert::info('Клієнт успішно збережений');

        return redirect()->route('platform.customer.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Customer $customer)
    {
        $customer->delete();

        Alert::info('Клієнт успішно видалений');

        return redirect()->route('platform.customer.list');
    }
}
