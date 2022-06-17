<?php

namespace App\Exports;

use App\Models\Treatment;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TreatmentExport implements FromCollection, WithHeadings, WithMapping
{

    /**
    * @var Invoice $invoice
    */
    public function map($treatment): array
    {
        return [
            $treatment->id,
            $treatment->name,
            $treatment->price,

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Treatment::orderBy('id')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Naam',
            'Prijs',
        ];
    }
}
