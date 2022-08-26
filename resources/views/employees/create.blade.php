@extends('adminlte::page')

@section('title', 'New Employee')

@section('content_header')
@isset($employee)
<h1>Edit an existing employee</h1>
@else
<h1>Add a new employee</h1>
@endisset
@stop

@section('content')
@if ($errors->any())
<x-adminlte-callout theme="warning" title="Warning">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</x-adminlte-callout>
@endif
<form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}"
    method="post">
    @method(isset($employee) ? 'PUT' : 'POST')
    @csrf
    <x-adminlte-input name="first_name" placeholder="First name" required
        value="{{ isset($employee) ? $employee->first_name : '' }}" />
    <x-adminlte-input name="last_name" placeholder="Last name" required
        value="{{ isset($employee) ? $employee->last_name: '' }}" />
    <x-adminlte-select name="company_id">
        <option selected value="">Choose company</option>
        @foreach ($listedCompanies as $company)
        <option value="{{ $company->id }}" {{ (isset($employee) && isset($employee->company) && $company->id ==
            $employee->company->id) ? 'selected':
            ''}}>{{
            $company->name }}</option>
        @endforeach
    </x-adminlte-select>
    <x-adminlte-input name="email" type="email" placeholder="Email"
        value="{{ isset($employee) ? $employee->email : '' }}" />
    <x-adminlte-input name="phone" placeholder="Phone" value="{{ isset($employee) ? $employee->phone : '' }}" />
    <x-adminlte-button label="Submit" type="submit" theme="success" icon="fas fa-lg fa-save" />
</form>
@stop