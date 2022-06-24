@extends('layouts.app')
@section('title', 'Employee')
@section('subtitle', 'Edit')

@section('content')
<a href="{{route('employee.index')}}">
    <h1 class="text-sm mb-5 text-indigo-500 cursor-pointer"><i class="fa-solid fa-arrow-left-long"></i> Back</h1>
</a>
<div class=" w-full bg-white shadow rounded-lg p-[2rem] px-[5rem] grid gap-y-4">
    <h1 class="text-2xl font-semibold text-gray-300 mb-8 border-b pb-4">Update a employee</h1>
    
    <form action="{{route('employee.update', ['employee' => $employee])}}" method="POST">
        @method('PATCH')
        @csrf
        <div class=" grid gap-y-4">
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname</label>
                <div class="mt-1">
                    <input type="text" name="firstname" id="firstname"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Employee Firstname"
                        value="@if($employee->firstname){{$employee->firstname}}@endif">
                </div>
            </div>
            <div>
                <label for="infix" class="block text-sm font-medium text-gray-700">Infix</label>
                <div class="mt-1">
                    <input type="text" name="infix" id="infix"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Employee Infix"
                        value="@if($employee->infix){{$employee->infix}}@endif">
                </div>
            </div>
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Lastname</label>
                <div class="mt-1">
                    <input type="text" name="lastname" id="lastname"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Employee Lastname"
                        value="@if($employee->lastname){{$employee->lastname}}@endif">
                </div>
            </div>
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <div class="mt-1">
                    <select name="company_id" id="company_id"class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        @foreach ($companies as $company)
                            @if($company->id == $employee->company?->id)
                                <option value="{{$company->id}}" selected>{{$company->name}}</option>
                            @else
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="email" name="email" id="email"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Employee Email"
                        value="@if($employee->email){{$employee->email}}@endif">
                </div>
            </div>
            <div>
                <label for="phonenumber" class="block text-sm font-medium text-gray-700">Phonenumber</label>
                <div class="mt-1">
                    <input type="text" name="phonenumber" id="phonenumber"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Employee Phonenumber"
                        value="@if($employee->phonenumber){{$employee->phonenumber}}@endif">
                </div>
            </div>
            <button type="submit" class=" py-2 w-[8rem] text-center px-6 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 gap-x-5">Create</button>
        </div>
        
    </form>

</div>
@endsection