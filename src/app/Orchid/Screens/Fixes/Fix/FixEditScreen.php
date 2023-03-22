<?php

namespace App\Orchid\Screens\Fixes\Fix;

use App\Models\Customers\Car;
use App\Models\Customers\Customer;
use App\Models\Fixes\Fix;
use App\Models\Fixes\Price;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FixEditScreen extends Screen
{

    public Fix $fix;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Fix $fix): iterable
    {
        return [
            'fix' => $fix
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->fix->exists ? 'Редагувати ремонт' : 'Створити новий ремонт';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Створити')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->fix->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->fix->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->fix->exists),
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
                Relation::make('fix.customer_id')
                    ->title('Клієнт')
                    ->fromModel(Customer::class, 'first_name')
                    ->searchColumns('first_name', 'last_name', 'phone_number')
                    ->displayAppend('select_title'),

                Relation::make('fix.car_id')
                    ->title('Авто')
                    ->fromModel(Car::class, 'id')
                    ->displayAppend('select_title'),

                Relation::make('fix.prices.')
                    ->title('Виконані роботи')
                    ->fromModel(Price::class, 'title')
                    ->displayAppend('select_title')
                    ->multiple(),


            ])
        ];
    }

    /**
     * @param Fix $fix
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Fix $fix, Request $request)
    {
        $fixData = $request->get('fix');
        $fixData['total'] = Price::whereIn('id', $fixData['prices'])->sum('price');

        $fix->fill($fixData)->save();
        $fix->prices()->sync($fixData['prices']);

        Alert::info('Ремонт успішно збережений');

        return redirect()->route('platform.fix.list');
    }

    /**
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function remove(Fix $fix)
    {
        $fix->delete();

        Alert::info('Ремонт успішно видалений');

        return redirect()->route('platform.fix.list');
    }
}
