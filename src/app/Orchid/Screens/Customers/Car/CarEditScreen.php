<?php

namespace App\Orchid\Screens\Customers\Car;

use App\Models\Cars\Brand;
use App\Models\Cars\CarModel;
use App\Models\Cars\DriveType;
use App\Models\Cars\FuelType;
use App\Models\Cars\GearboxType;
use App\Models\Customers\Car;
use App\Models\Customers\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CarEditScreen extends Screen
{

    public Car $car;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Car $car): iterable
    {
        return [
            'car' => $car
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->car->exists ? 'Редагувати авто' : 'Створити новий авто';
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
                ->canSee(!$this->car->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->car->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->car->exists),
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
                Relation::make('car.customer_id')
                    ->title('Клієнт')
                    ->fromModel(Customer::class, 'first_name')
                    ->searchColumns('first_name', 'last_name', 'phone_number')
                    ->displayAppend('select_title'),

                Relation::make('car.brand_id')
                    ->title('Бренд')
                    ->searchColumns('title')
                    ->fromModel(Brand::class, 'title'),

                Relation::make('car.model_id')
                    ->title('Модель')
                    ->searchColumns('title')
                    ->fromModel(CarModel::class, 'title'),

                Select::make('car.fuel_type_id')
                    ->title('Тип палива')
                    ->searchColumns('title')
                    ->fromModel(FuelType::class, 'title'),

                Select::make('car.drive_type_id')
                    ->title('Тип приводу')
                    ->fromModel(DriveType::class, 'title'),

                Select::make('car.gearbox_type_id')
                    ->title('Ти коробки передач')
                    ->fromModel(GearboxType::class, 'title'),

                Input::make('car.engine_capacity')
                    ->title('Об\'єм мотору')
                    ->placeholder('1.6'),

                Input::make('car.year')
                    ->title('Рік випуску')
                    ->placeholder('2000')
                    ->type('number'),

                Input::make('car.vin_number')
                    ->title('VIN номер')
                    ->placeholder('VIN номер'),

            ])
        ];
    }

    /**
     * @param Car $car
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Car $car, Request $request)
    {
        $car->fill($request->get('car'))->save();

        Alert::info('Авто успішно збережене');

        return redirect()->route('platform.car.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Car $car)
    {
        $car->delete();

        Alert::info('Авто успішно видалене');

        return redirect()->route('platform.car.list');
    }
}
