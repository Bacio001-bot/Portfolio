<?php

namespace App\Exports;

use App\Models\Agenda;
use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppointmentExport implements FromCollection, WithHeadings, WithMapping
{

    /**
    * @var Invoice $invoice
    */
    public function map($appointment): array
    {
        if($appointment->client) {
            return [
                $appointment->id,
                $appointment->agenda?->date ?? 'Agenda Verwijderd',
                $appointment->client?->id ?? 'Klant Verwijderd',
                $appointment->client?->firstname.' '.$appointment->client->infix.' '.$appointment->client->lastname ?? 'Klant Verwijderd',
                $appointment->treatment?->id ?? 'Behandeling Verwijderd',
                $appointment->treatment?->name ?? 'Behandeling Verwijderd',
                $appointment->treatment?->price ?? 'Behandeling Verwijderd',
                $appointment->agenda?->finished?->distance ?? 'Niet Voltooid',

            ];
        } else {
            return [];
        }

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Appointment::orderBy('id')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Datum',
            'Klant_ID',
            'Klant',
            'Behandeling_ID',
            'Behandeling',
            'Bedrag',
            'KM'
        ];
    }
}
