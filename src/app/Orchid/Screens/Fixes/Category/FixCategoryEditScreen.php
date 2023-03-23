<?php

namespace App\Orchid\Screens\Fixes\Category;

use App\Models\Fixes\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FixCategoryEditScreen extends Screen
{

    public Category $category;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Category $category): iterable
    {
        return [
            'category' => $category
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'Редагувати категорію' : 'Створити нову категорію';
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
                ->canSee(!$this->category->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->category->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->category->exists),
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
                Group::make([
                    Input::make('category.title')
                        ->title('Назва')
                        ->placeholder('Назва категорії'),
                    Switcher::make('category.is_published')
                        ->title('Опублікувати')
                        ->sendTrueOrFalse(),
                ]),
                TextArea::make('category.description')
                    ->title('Опис')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Опис категорії'),

                Select::make('category.parent_id')
                    ->title('Батьківська категорія')
                    ->empty('Виберіть значення')
                    ->fromQuery(Category::whereNull('parent_id'), 'title'),

            ])
        ];
    }

    /**
     * @param Category $category
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Category $category, Request $request)
    {
        $data = $request->get('category');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $category->fill($data)->save();

        Alert::info('Категорія успішно збережена');

        return redirect()->route('platform.fix_category.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Category $category)
    {
        $category->delete();

        Alert::info('Категорія успішно видалена');

        return redirect()->route('platform.fix_category.list');
    }
}
