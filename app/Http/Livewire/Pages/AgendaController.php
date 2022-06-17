<?php

namespace App\Http\Livewire\Pages;

use Carbon\Carbon;
use App\Models\Agenda;
use App\Models\Appointment;
use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
 
class AgendaController extends Component
{

    protected $listeners = ['renderAppointments' => 'render'];

    public $date;
    public $origin_formatted_address = '';
    public $origin_longitude = 0;
    public $origin_latitude = 0;
    public $destination_formatted_address = '';
    public $destination_longitude = 0;
    public $destination_latitude = 0;
    public $travel_distance_text = '';
    public $travel_distance_value = 0;
    public $travel_time_text = '';
    public $travel_time_value = 0;

    public $agendas = [];
    public $selectedAgenda;
    public $agendaSelectedItem;

    public function mount() {

        $this->date = Carbon::now()->format('m/d/Y');
        $client = new Client();

        $this->selectedAgenda = Agenda::where('date', '=', Carbon::parse($this->date)->format('Y-m-d'))->orderByRaw(' abs( timestampdiff(second, current_timestamp, time)) asc ')->first();

        // try {

        //     $result1 = (string) $client->post("https://maps.googleapis.com/maps/api/geocode/json?components=country:NL|postal_code:5066ML&sensor=false&key=".env('GOOGLE_MAP_KEY'))->getBody();
        //     $json =json_decode($result1);
        //     $this->origin_formatted_address = $json->results[0]->formatted_address;
        //     $this->origin_longitude = $json->results[0]->geometry->location->lng;
        //     $this->origin_latitude = $json->results[0]->geometry->location->lat;
        //     if($this->agendaSelectedItem) {
        //         $result2 = (string) $client->post("https://maps.googleapis.com/maps/api/geocode/json?components=country:NL|postal_code:".$this->agendaSelectedItem->appointments[0]->client['postcode']."&sensor=false&key=".env('GOOGLE_MAP_KEY'))->getBody();
        //         $json =json_decode($result2);
        //         $this->destination_longitude = $json->results[0]->formatted_address;
        //         $this->destination_longitude = $json->results[0]->geometry->location->lng;
        //         $this->destination_latitude = $json->results[0]->geometry->location->lat;
        //     } else {
        //         $result2 = (string) $client->post("https://maps.googleapis.com/maps/api/geocode/json?components=country:NL|postal_code:".$this->selectedAgenda->appointments[0]->client['postcode']."&sensor=false&key=".env('GOOGLE_MAP_KEY'))->getBody();
        //         $json =json_decode($result2);
        //         $this->destination_longitude = $json->results[0]->formatted_address;
        //         $this->destination_longitude = $json->results[0]->geometry->location->lng;
        //         $this->destination_latitude = $json->results[0]->geometry->location->lat;
        //     }

        //     $result3 = (string) $client->post("https://maps.googleapis.com/maps/api/distancematrix/json?destinations=".$this->destination_latitude."%2C".$this->destination_longitude."&origins=".$this->origin_latitude."%2C".$this->origin_longitude."&key=".env('GOOGLE_MAP_KEY'))->getBody();
        //     $json =json_decode($result3);
        //     if($json->rows) {
        //         $this->travel_distance_text = $json->rows[0]->elements[0]->distance->text;
        //         $this->travel_distance_value = $json->rows[0]->elements[0]->distance->value;
        //         $this->travel_time_text = $json->rows[0]->elements[0]->duration->text;
        //         $this->travel_time_value = $json->rows[0]->elements[0]->duration->value;
        //     } else {
        //         $this->travel_distance_text = 0;
        //         $this->travel_distance_value = 0;
        //         $this->travel_time_text = 0;
        //         $this->travel_time_value = 0;
        //     }

        // } catch (Exception $e) {
        //     session()->flash('error', 'Map kon niet geladen worden');
        // }
    

    }

    public function render(Request $request)
    {
        $this->agendas = Agenda::where('date', '=', Carbon::parse($this->date)->format('Y-m-d'))->orderBy('time', 'asc')->get();
        
        $this->selectedAgenda = Agenda::where('date', '=', Carbon::parse($this->date)->format('Y-m-d'))->orderByRaw(' abs( timestampdiff(second, current_timestamp, time)) asc ')->first();
        return view('livewire.pages.agenda')        
        ->extends('layouts.app')
        ->section('content');
    }
    
    public function addDay() {
        $this->date = Carbon::parse($this->date)->addDays(1)->format('m/d/Y');
    }

    public function removeDay() {
        $this->date = Carbon::parse($this->date)->subDays(1)->format('m/d/Y');
    }

    public function selectAgendaItem($agenda) {
        $this->agendaSelectedItem = Agenda::where('id', '=', $agenda['id'])->first();
    }   

    public function delete($agenda)
    {
        Agenda::where('id', '=', $agenda['id'])->delete();
        Appointment::where('agenda_id', '=', $agenda['id'])->delete();
        $this->agendaSelectedItem = null;
        $this->selectedAgenda = Agenda::where('date', '=', Carbon::parse($this->date)->format('Y-m-d'))->orderByRaw(' abs( timestampdiff(second, current_timestamp, time)) asc ')->first();


    }


}
