<?php

namespace App\Orchid\Screens\Cars\Brand;

use App\Models\Cars\Brand;
use App\Orchid\Layouts\Cars\Brand\BrandListLayout;
use App\Orchid\Layouts\Fixes\Category\FixCategoryListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class BrandListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'brands' => Brand::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Бренди';
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
                ->route('platform.brand.edit')
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
            BrandListLayout::class
        ];
    }
}
