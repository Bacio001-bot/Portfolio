<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CompanyTable extends Component
{

    public $category = 'name';
    public $search;
    public $sortAsc = false;
    public $sortField ='name';

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
        $companies = null;
        if($this->search) {
            $companies = Company::where($this->category, 'LIKE', '%' . $this->search .'%')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10);            
        } else {
            $companies = Company::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10); 
        }

        return view('livewire.company-table', ['companies' => $companies]);
    }

    public function sortCategory($categorySort) {
        $this->category = $categorySort;
    }

    public function delete($id) {
        $company = Company::find($id);
        $company->employees()->delete();
        $company->delete();
    }

}
