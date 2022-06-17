<?php

namespace App\Http\Livewire\Pages;

use App\Models\Agenda;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Support\Facades\Session;

class CheckController extends Component
{

    public $clients;
    public $treatments;
    public $agendaItem;
    public $treatment_id;
    public $client_id;

    public function mount() {
        $this->clients = Client::all();
        $this->treatments = Treatment::all();
        $this->treatment_id = $this->treatments[0]->id;
        $this->client_id = $this->clients[0]->id;

    }

    public function render()
    {
        return view('livewire.pages.check')
        ->extends('layouts.app')
        ->section('content');
    }

    public function search() {
        if($this->treatment_id && $this->client_id) {

            $this->agendaItem = Appointment::where('treatment_id', '=', $this->treatment_id)->where('client_id', '=', $this->client_id)->get();
            if($this->agendaItem->count() != 0) {
                $agendaArray = [];
                foreach($this->agendaItem as $item) {
                    $agendaArray[] = Agenda::where('id', '=', $item['agenda_id'])->first();
                }
                $this->agendaItem = collect($agendaArray)->sortByDesc('date')->first();
                session()->flash('success', 'Afspraak gevonden');

            } else {
                session()->flash('error', 'Afspraak niet gevonden');
            }

        } else {
            session()->flash('error', 'Afspraak niet gevonden');
        }
    }
}
