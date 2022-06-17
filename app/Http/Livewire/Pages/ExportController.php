<?php

namespace App\Http\Livewire\Pages;

use App\Exports\AppointmentExport;
use App\Exports\ClientExport;
use App\Exports\TreatmentExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Component
{
    public function render()
    {
        return view('livewire.pages.export')
        ->extends('layouts.app')
        ->section('content');   
    }

    public function exportAgenda() {
        return Excel::download(new AppointmentExport, 'Kasmutaties.xlsx');
    }

    public function exportClient() {
        return Excel::download(new ClientExport, 'Klantenbestand.xlsx');
    }

    public function exportTreatment() {
        return Excel::download(new TreatmentExport, 'Prijslijst.xlsx');
    }
}
