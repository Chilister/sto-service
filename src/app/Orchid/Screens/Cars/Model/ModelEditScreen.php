<?php

namespace App\Orchid\Screens\Cars\Model;

use App\Models\Cars\Brand;
use App\Models\Cars\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ModelEditScreen extends Screen
{

    public CarModel $model;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(CarModel $model): iterable
    {
        return [
            'model' => $model
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->model->exists ? 'Редагувати модель' : 'Створити нову модель';
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
                ->canSee(!$this->model->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->model->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->model->exists),
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
                Select::make('model.brand_id')
                    ->title('Бренд')
                    ->empty('Виберіть значення')
                    ->fromModel(Brand::class, 'title'),
                Input::make('model.title')
                    ->title('Назва')
                    ->placeholder('Назва'),
                Input::make('model.priority')
                    ->title('Приоритет')
                    ->type('number')
                    ->placeholder('0'),
            ])
        ];
    }

    /**
     * @param CarModel $model
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(CarModel $model, Request $request)
    {
        $data = $request->get('model');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $model->fill($data)->save();

        Alert::info('Модель успішно збережена');

        return redirect()->route('platform.model.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(CarModel $model)
    {
        $model->delete();

        Alert::info('Модель успішно видален');

        return redirect()->route('platform.model.list');
    }
}
