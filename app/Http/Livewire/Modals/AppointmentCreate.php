<?php

namespace App\Http\Livewire\Modals;

use App\Models\Agenda;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Treatment;
use LivewireUI\Modal\ModalComponent;

class AppointmentCreate extends ModalComponent
{

    public $agendaItem;
    public $clients;
    public $treatments;
    public $client_id;
    public $treatment_id;

    protected $rules = [
        'client' => ['required'],
        'treatment' => ['required']
    ];

    public function mount() {
        $this->clients = Client::all();
        $this->treatments = Treatment::all();

    }

    public function render()
    {
        $this->agendaItem = Agenda::where('id', '=', $this->agendaItem['id'])->first();
        return view('livewire.modals.appointment-create');
    }

    public function createAppointment() {
        Appointment::create(['agenda_id' => (int) $this->agendaItem['id'], 
        'client_id' => (int) $this->client_id, 
        'treatment_id' => (int) $this->treatment_id]);

        $this->closeModal();

        $this->emit('renderAppointments');
    }
    

}
