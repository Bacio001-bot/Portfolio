<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientExport implements FromCollection, WithHeadings, WithMapping
{

    /**
    * @var Invoice $invoice
    */
    public function map($client): array
    {
        return [
            $client->id,
            $client->firstname,
            $client->infix,
            $client->lastname,
            $client->phonenumber,
            $client->email,
            $client->address,
            $client->postcode,

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::orderBy('id')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Voornaam',
            'Tussenvoegsel',
            'Achternaam',
            'Telefoonnummer',
            'Email',
            'Address',
            'Postcode',
        ];
    }
}
