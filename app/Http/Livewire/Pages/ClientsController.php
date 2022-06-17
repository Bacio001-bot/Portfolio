<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use Livewire\Component;

class ClientsController extends Component
{

    public $clients;
    public $sortField ='firstname';
    public $category = 'firstname';
    public $search;
    public $sortAsc = false;
    
    public $firstname;
    public $infix;
    public $lastname;
    public $email;
    public $phonenumber;
    public $address;
    public $postcode;

    public $updateFirstname;
    public $updateInfix;
    public $updateLastname;
    public $updateEmail;
    public $updatePhonenumber;
    public $updateAddress;
    public $updatePostcode;
    public $clientId;
    
    protected $rules = [
        'firstname' => ['required'],
        'lastname' => ['required'],
        'postcode' => ['required'],
    ];

    public function sortBy($field)
    {
        if($this->sortField === $field)
        {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {

        if($this->search) {
            $this->clients = Client::where($this->category, 'LIKE', '%' . $this->search .'%')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->get();            
        } else {
            $this->clients = Client::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->get(); 
        }

        return view('livewire.pages.clients')
        ->extends('layouts.app')
        ->section('content');
    }

    public function search($value) {
        $this->category = $value;
    }

    public function addClient() {

        $this->validate();

        Client::create(['firstname' => $this->firstname, 'infix' => $this->infix, 'lastname' => $this->lastname, 'email' => $this->email, 'phonenumber' => $this->phonenumber, 'address' => $this->address, 'postcode' => $this->postcode]);
        
        $this->firstname = null;
        $this->infix = null;
        $this->lastname = null;
        $this->email = null;
        $this->phonenumber = null;
        $this->address = null;
        $this->postcode = null;

        session()->flash('success', 'Klant aangemaakt');

    }

    public function selectClient($id) {

        $client = Client::where('id', '=', $id)->first();
        $this->updateFirstname = $client->firstname;
        $this->updateInfix = $client->infix;
        $this->updateLastname = $client->lastname;
        $this->updateEmail = $client->email;
        $this->updatePhonenumber = $client->phonenumber;
        $this->updateAddress = $client->address;
        $this->updatePostcode = $client->postcode;
        $this->clientId = $client->id;
    }

    public function updateClient() {


        $this->validate();


        if($this->clientId) {

            $client = Client::where('id', '=', $this->clientId)->first();
            $client->update(['firstname' => $this->updateFirstname, 'infix' => $this->updateInfix, 'lastname' => $this->updateLastname, 'email' => $this->updateEmail, 'phonenumber' => $this->updatePhonenumber, 'address' => $this->updateAddress, 'postcode' => $this->updatePostcode]);
            
            $this->updateFirstname = null;
            $this->updateInfix = null;
            $this->updateLastname = null;
            $this->updateEmail = null;
            $this->updatePhonenumber = null;
            $this->updateAddress = null;
            $this->updatePostcode = null;
            $this->clientId = null;

            session()->flash('success', 'Klant aangepast');
            
        } else {

            session()->flash('error', 'Selecteer een klant eerst');

        }

    }

}
