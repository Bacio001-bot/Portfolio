@extends('layouts.app')
@section('title', 'Dashboard')
@section('subtitle', 'Index')

@section('content')
<div class=" w-full bg-white shadow rounded-lg">
    <img class="m-auto py-10" src="{{asset('img/undraw_photograph_re_up3b.svg')}}" alt="">
    <div class="grid grid-cols-2 mx-auto gap-x-20 w-[50rem] pb-10">
        <button type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 gap-x-5"><i class="fa-solid fa-building"></i> Company Panel</button>
        <button type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 gap-x-5"><i class="fa-solid fa-user"></i> Employee Panel</button>

    </div>
</div>

@endsection