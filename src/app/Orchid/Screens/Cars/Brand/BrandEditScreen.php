<?php

namespace App\Orchid\Screens\Cars\Brand;

use App\Models\Cars\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class BrandEditScreen extends Screen
{

    public Brand $brand;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Brand $brand): iterable
    {
        return [
            'brand' => $brand
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->brand->exists ? 'Редагувати бренд' : 'Створити новий бренд';
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
                ->canSee(!$this->brand->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->brand->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->brand->exists),
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
                Input::make('brand.title')
                    ->title('Назва')
                    ->placeholder('Назва')
                    ->required(),
                Input::make('brand.priority')
                    ->title('Приоритет')
                    ->type('number')
                    ->placeholder('0')
                    ->required(),
            ])
        ];
    }

    /**
     * @param Brand $brand
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Brand $brand, Request $request)
    {
        $data = $request->get('brand');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $brand->fill($data)->save();

        Alert::info('Бренд успішно збережений');

        return redirect()->route('platform.brand.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Brand $brand)
    {
        $brand->delete();

        Alert::info('Бренд успішно видалений');

        return redirect()->route('platform.brand.list');
    }
}
