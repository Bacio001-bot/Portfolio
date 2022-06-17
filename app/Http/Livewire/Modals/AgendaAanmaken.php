<?php

namespace App\Http\Livewire\Modals;

use App\Models\Agenda;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Treatment;
use LivewireUI\Modal\ModalComponent;

class AgendaAanmaken extends ModalComponent
{

    public $clients;
    public $treatments;
    public $client_id;
    public $treatment_id;
    public $date;
    public $notes;
    public $time;

    protected $rules = [
        'client' => ['required'],
        'treatment' => ['required']
    ];

    public function mount() {
        $this->clients = Client::all();
        $this->treatments = Treatment::all();
        $this->treatment_id = $this->treatments[0]->id;
        $this->client_id = $this->clients[0]->id;

    }

    public function render()
    {
        return view('livewire.modals.agenda-aanmaken');
    }

    public function createAgenda() {
        $agenda = Agenda::create(['notes' => $this->notes, 'date' => $this->date, 'time' => $this->time]);
        $agendaId = $agenda->id;
        Appointment::create(['agenda_id' => (int) $agendaId, 
        'client_id' => (int) $this->client_id, 
        'treatment_id' => (int) $this->treatment_id]);

        $this->closeModal();
        $this->emit('renderAppointments');
    }
}
