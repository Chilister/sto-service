<?php

namespace App\Orchid\Screens\Calendar\Appointment;

use App\Models\Calendar\Appointment;
use App\Models\Customers\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class AppointmentEditScreen extends Screen
{

    public Appointment $appointment;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Appointment $appointment): iterable
    {
        return [
            'appointment' => $appointment
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->appointment->exists ? 'Редагувати запис' : 'Створити новий запис';
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
                ->canSee(!$this->appointment->exists),

            Button::make('Редагувати')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->appointment->exists),

            Button::make('Видалити')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->appointment->exists),
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
                Input::make('appointment.phone_number')
                    ->title('Номер телефону')
                    ->placeholder('Номер телефону')
                    ->required(),
                Relation::make('appointment.car_id')
                    ->title('Автомобіль')
                    ->fromModel(Car::class, 'id')
                    ->displayAppend('select_title')
                    ->required(),
                DateTimer::make('appointment.reserve_begin')
                    ->title('Дата початку')
                    ->format24hr(),
                DateTimer::make('appointment.reserve_end')
                    ->title('Дата закінчення')
                    ->format24hr(),
                TextArea::make('appointment.description')
                    ->title('Опис')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Опис'),
            ])
        ];
    }

    /**
     * @param Appointment $appointment
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Appointment $appointment, Request $request)
    {
        $data = $request->get('appointment');

        $appointment->fill($data)->save();

        Alert::info('Запис успішно збережений');

        return redirect()->route('platform.appointment.list');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Appointment $appointment)
    {
        $appointment->delete();

        Alert::info('Запис успішно видалений');

        return redirect()->route('platform.appointment.list');
    }
}
