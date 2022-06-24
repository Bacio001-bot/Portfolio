@extends('layouts.app')
@section('title', 'Company')
@section('subtitle', 'Create')

@section('content')
<a href="{{route('company.index')}}">
    <h1 class="text-sm mb-5 text-indigo-500 cursor-pointer"><i class="fa-solid fa-arrow-left-long"></i> Back</h1>
</a>
<div class=" w-full bg-white shadow rounded-lg p-[2rem] px-[5rem] grid gap-y-4">
    <h1 class="text-2xl font-semibold text-gray-300 mb-8 border-b pb-4">Create a company</h1>
    
    <form action="{{route('company.store')}}" method="POST">
        @csrf
        <div class=" grid gap-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Company Name">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="email" name="email" id="email"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Company Email">
                </div>
            </div>
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo URL</label>
                <div class="mt-1">
                    <input type="url" name="logo" id="logo"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Company Logo">
                </div>
            </div>
            <div>
                <label for="website" class="block text-sm font-medium text-gray-700">Website URL</label>
                <div class="mt-1">
                    <input type="url" name="website" id="website"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Company Website">
                </div>
            </div>
            <button type="submit" class=" py-2 w-[8rem] text-center px-6 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 gap-x-5">Create</button>
        </div>
        
    </form>

</div>
@endsection