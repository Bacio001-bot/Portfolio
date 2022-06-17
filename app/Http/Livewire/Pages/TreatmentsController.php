<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use App\Models\Treatment;
use Livewire\Component;

class TreatmentsController extends Component
{

    public $treatments;
    public $sortField ='name';
    public $category = 'name';
    public $search;
    public $sortAsc = false;

    public $name;
    public $price;

    public $updateName;
    public $updatePrice;
    public $treatmentId;

    protected $rules = [
        'price' => ['required'],
        'name' => ['required']
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
            $this->treatments = Treatment::where($this->category, 'LIKE', '%' . $this->search .'%')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->get();            
        } else {
            $this->treatments = Treatment::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->get(); 
        }

        return view('livewire.pages.treatments')
        ->extends('layouts.app')
        ->section('content');
    }

    public function search($value) {
        $this->category = $value;
    }

    
    public function addTreatment() {

        $this->validate();

        $this->price = str_replace(",", ".", $this->price);
        Treatment::create(['name' => $this->name, 'price' => $this->price]);
        $this->price = null;
        $this->name = null;

        session()->flash('success', 'Behandeling aangemaakt');

    }

    public function selectTreatment($id) {

        $treatment = Treatment::where('id', '=', $id)->first();
        $this->updatePrice = $treatment->price;
        $this->updateName = $treatment->name;
        $this->treatmentId = $treatment->id;
    }

    public function updateTreatment() {

        $this->validate();

        
        if($this->treatmentId) {
            
            $this->updatePrice = str_replace(",", ".", $this->updatePrice);
            $treatment = Treatment::where('id', '=', $this->treatmentId)->first();
            $treatment->update(['name' => $this->updateName,'price' => $this->updatePrice]);
            
            $this->updatePrice = null;
            $this->updateName = null;
            $this->treatmentId = null;

            session()->flash('success', 'Behandeling aangepast');

        } else {

            session()->flash('error', 'Selecteer een behandeling');

        }

    }
}
