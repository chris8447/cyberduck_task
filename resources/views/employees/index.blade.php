@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
<h1>Overview of employees</h1>
@stop

@section('content')
@if (session('status'))
<x-adminlte-callout theme="success" title="Success">
    {{ session('status') }}
</x-adminlte-callout>
@endif
<p>Click <a href="{{ route('employees.create') }}">here</a> to add a new employee.</p>
<x-adminlte-datatable id="employees_table" :heads="['First Name', 'Last Name','Company','Email','Phone', 'Actions']">
    @foreach ($employees as $employee)
    <tr>
        <td>{{ $employee->first_name }}</td>
        <td>{{ $employee->last_name }}</td>
        <td>{{ isset($employee->company) ? $employee->company->name : 'n/a'}}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->phone }}</td>
        <td style="display: inline-flex">
            <form method="get" action="{{ route('employees.edit', $employee->id) }}">
                @csrf
                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>
            </form>
            <form method="post" action="{{ route('employees.destroy', $employee->id) }}">
                @method('delete')
                @csrf
                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</x-adminlte-datatable>
<p>{{ $employees->links() }}</p>
@stop