<?php

namespace App\Http\Livewire\Modals;

use App\Models\Agenda;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\FinishedAppointment;
use LivewireUI\Modal\ModalComponent;

class Afronden extends ModalComponent
{

    public $agendaItem;
    public $price;
    public $travel_distance_value;
    public $payment_methode = 'Contant';

    protected $listeners = ['renderAppointments' => 'render'];
    
    protected $rules = [
        'price' => ['required|regex:/^\d+(\.\d{1,2})?$/'],
        'travel_distance_value' => ['required']
    ];

    public function mount() {
        $this->agendaItem = Agenda::where('id', '=', $this->agendaItem['id'])->first();
        foreach ($this->agendaItem->appointments as $appointment ) {
            $this->price = $this->price += $appointment->treatment['price'];
        }
        $this->travel_distance_value = $this->travel_distance_value * 2;
    }

    public function render()
    {
        $this->agendaItem = Agenda::where('id', '=', $this->agendaItem['id'])->first();
        return view('livewire.modals.afronden');
    }

    public function deleteAppointment($appointment) {
        Appointment::where('id', '=', $appointment['id'])->delete();
    }

    public function finishAgenda() {

        $this->price = str_replace(",", ".", $this->price);

        $check = FinishedAppointment::where('agenda_id', '=', $this->agendaItem['id'])->first();
        if($check) {
            $check->update(['agenda_id' => $this->agendaItem['id'],'price' => $this->price, 'payment_method' => $this->payment_methode, 'distance' => $this->travel_distance_value]);
        } else {
            FinishedAppointment::create(['agenda_id' => $this->agendaItem['id'], 'price' => $this->price, 'payment_method' => $this->payment_methode, 'distance' => $this->travel_distance_value]);
        }

        $this->closeModal();

        $this->emit('renderAppointments');
    }

}
