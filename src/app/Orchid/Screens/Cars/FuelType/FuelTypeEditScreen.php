<?php

namespace App\Orchid\Screens\Cars\FuelType;

use App\Models\Cars\FuelType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FuelTypeEditScreen extends Screen
{

    public FuelType $fuelType;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(FuelType $fuelType): iterable
    {
        return [
            'fuelType' => $fuelType
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->fuelType->exists ? 'Редагувати тип палива' : 'Створити новий тип палива';
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
                ->canSee(!$this->fuelType->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->fuelType->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->fuelType->exists),
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
                Input::make('fuelType.title')
                    ->title('Назва')
                    ->placeholder('Назва'),
            ])
        ];
    }

    /**
     * @param FuelType $fuelType
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(FuelType $fuelType, Request $request)
    {
        $data = $request->get('fuelType');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $fuelType->fill($data)->save();

        Alert::info('Тип палива успішно збережений');

        return redirect()->route('platform.fuel_type.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(FuelType $fuelType)
    {
        $fuelType->delete();

        Alert::info('Тип палива успішно видалений');

        return redirect()->route('platform.fuel_type.list');
    }
}
