<?php

namespace App\Orchid\Screens\Fixes\Category;

use App\Models\Fixes\Category;
use App\Orchid\Layouts\Fixes\Category\FixCategoryListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class FixCategoryListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => Category::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Категорії ремонту';
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
                ->route('platform.fix_category.edit')
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
            FixCategoryListLayout::class
        ];
    }
}
