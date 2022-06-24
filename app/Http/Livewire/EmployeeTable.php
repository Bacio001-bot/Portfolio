<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeTable extends Component
{

    public $category = 'firstname';
    public $search;
    public $sortAsc = false;
    public $sortField ='firstname';

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
        $employees = null;
        if($this->search) {
            $employees = Employee::where($this->category, 'LIKE', '%' . $this->search .'%')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10);            
        } else {
            $employees = Employee::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10); 
        }

        return view('livewire.employee-table', ['employees' => $employees]);
    }

    public function sortCategory($categorySort) {
        $this->category = $categorySort;
    }

    public function delete($id) {
        Employee::find($id)->delete();
    }

}
