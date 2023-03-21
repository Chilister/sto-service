<?php

namespace App\Orchid\Screens\Cars\DriveType;

use App\Models\Cars\DriveType;
use App\Orchid\Layouts\Cars\DriveType\DriveTypeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class DriveTypeListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'driveTypes' => DriveType::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Типи приводу';
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
                ->route('platform.drive_type.edit')
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
            DriveTypeListLayout::class
        ];
    }
}
