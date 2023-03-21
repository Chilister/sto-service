<?php

namespace App\Orchid\Screens\Cars\DriveType;

use App\Models\Cars\DriveType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class DriveTypeEditScreen extends Screen
{

    public DriveType $driveType;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(DriveType $driveType): iterable
    {
        return [
            'driveType' => $driveType
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->driveType->exists ? 'Редагувати тип приводу' : 'Створити новий тип приводу';
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
                ->canSee(!$this->driveType->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->driveType->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->driveType->exists),
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
                Input::make('driveType.title')
                    ->title('Назва')
                    ->placeholder('Назва'),
            ])
        ];
    }

    /**
     * @param DriveType $driveType
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(DriveType $driveType, Request $request)
    {
        $data = $request->get('driveType');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $driveType->fill($data)->save();

        Alert::info('Тип приводу успішно збережений');

        return redirect()->route('platform.drive_type.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(DriveType $driveType)
    {
        $brand->delete();

        Alert::info('Тип приводу успішно видалений');

        return redirect()->route('platform.drive_type.list');
    }
}
