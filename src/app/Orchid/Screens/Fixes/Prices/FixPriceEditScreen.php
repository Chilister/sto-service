<?php

namespace App\Orchid\Screens\Fixes\Prices;

use App\Models\Fixes\Category;
use App\Models\Fixes\Price;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FixPriceEditScreen extends Screen
{

    public Price $price;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Price $price): iterable
    {
        return [
            'price' => $price
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->price->exists ? 'Редагувати ціну' : 'Створити нову ціну';
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
                ->canSee(!$this->price->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->price->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->price->exists),
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
                Select::make('price.category_id')
                    ->title('Категорія')
                    ->empty('Виберіть значення')
                    ->fromQuery(Category::whereNotNull('parent_id'), 'title'),

                Input::make('price.title')
                    ->title('Назва')
                    ->placeholder('Назва'),

                Input::make('price.price')
                    ->title('Ціна')
                    ->type('number')
                    ->placeholder('100'),

                TextArea::make('price.description')
                    ->title('Опис')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Опис'),



            ])
        ];
    }

    /**
     * @param Price $price
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Price $price, Request $request)
    {
        $data = $request->get('price');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $price->fill($data)->save();

        Alert::info('Ціна успішно збережена');

        return redirect()->route('platform.fix_price.list');
    }

    /**
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function remove(Price $price)
    {
        $price->delete();

        Alert::info('Ціна успішно видалена');

        return redirect()->route('platform.fix_price.list');
    }
}
