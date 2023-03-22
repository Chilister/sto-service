<?php

namespace App\Orchid\Screens\Preview\Calendar;

use App\Models\Calendar\Appointment;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class CalendarScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $events = [];

        $appointments = Appointment::with(['customer', 'car'])->get();

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => ($appointment->customer?->select_title ?? $appointment->phone_number) . "\n" . $appointment->description,
                'start' => $appointment->reserve_begin,
                'end' => $appointment->reserve_end,
            ];
        }

        return [
            'events' => $events
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Записи на ремонт';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return null;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Записати на ремонт')
                ->icon('calendar')
                ->route('platform.appointment.edit'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('orchid.preview.calendar.calendar')
        ];
    }
}
