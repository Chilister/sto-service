<?php

namespace App\Orchid\Layouts\Cars\DriveType;

use App\Models\Cars\DriveType;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DriveTypeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'driveTypes';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (DriveType $driveType) {
                    return Link::make($driveType->title)
                        ->route('platform.drive_type.edit', $driveType);
                }),
        ];
    }
}
