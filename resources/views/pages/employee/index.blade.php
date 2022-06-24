@extends('layouts.app')
@section('title', 'Employee')
@section('subtitle', 'Index')

@section('content')
<div class=" w-full  ">
    <livewire:employee-table />
</div>

@endsection