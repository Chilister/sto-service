<?php

namespace App\Orchid\Layouts\Calendar\Appointment;

use App\Models\Calendar\Appointment;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AppointmentListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'appointments';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('customer', 'Клієнт')
                ->render(function (Appointment $appointment) {
                    return Link::make($appointment->customer?->select_title ?? $appointment->phone_number)
                        ->route('platform.appointment.edit', $appointment);
                }),
            TD::make('description', 'Опис'),
            TD::make('reserve_begin', 'Час початку')
                ->render(function (Appointment $appointment) {
                    return $appointment->reserve_begin->toDateTimeString();
                }),
            TD::make('reserve_end', 'Час Закінчення')
                ->render(function (Appointment $appointment) {
                    return $appointment->reserve_end->toDateTimeString();
                }),
        ];
    }
}
