<?php

namespace App\Orchid\Screens\Cars\GearboxType;

use App\Models\Cars\GearboxType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class GearboxTypeEditScreen extends Screen
{

    public GearboxType $gearboxType;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(GearboxType $gearboxType): iterable
    {
        return [
            'gearboxType' => $gearboxType
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->gearboxType->exists ? 'Редагувати коробки передач' : 'Створити новий коробки передач';
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
                ->canSee(!$this->gearboxType->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->gearboxType->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->gearboxType->exists),
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
                Input::make('gearboxType.title')
                    ->title('Назва')
                    ->placeholder('Назва'),
            ])
        ];
    }

    /**
     * @param GearboxType $gearboxType
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(GearboxType $gearboxType, Request $request)
    {
        $data = $request->get('gearboxType');
        $data['slug'] = Str::slug(Str::transliterate($data['title']));

        $gearboxType->fill($data)->save();

        Alert::info('Тип коробки передач успішно збережений');

        return redirect()->route('platform.gearbox_type.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(GearboxType $gearboxType)
    {
        $gearboxType->delete();

        Alert::info('Тип коробки передач успішно видалений');

        return redirect()->route('platform.gearbox_type.list');
    }
}
