@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
<h1>Overview of companies</h1>
@stop

@section('content')
@if (session('status'))
<x-adminlte-callout theme="success" title="Success">
    {{ session('status') }}
</x-adminlte-callout>
@endif
<p>Click <a href="{{ route('companies.create') }}">here</a> to create a new company.</p>
<x-adminlte-datatable id="companies_table" :heads="['Logo', 'Name','Email','Website','Actions']">
    @foreach ($companies as $company)
    <tr>
        <td>
            @isset($company->logo)
            <img src="{{ asset($company->logo) }}" width="30" height="30" alt="company logo">
            @endisset
        </td>
        <td>{{ $company->name }}</td>
        <td>{{ $company->email }}</td>
        <td>{{ $company->website }}</td>
        <td style="display: inline-flex">
            <form method="get" action="{{ route('companies.edit', $company->id) }}">
                @csrf
                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>
            </form>
            <form method="post" action="{{ route('companies.destroy', $company->id) }}">
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
<p>{{ $companies->links() }}</p>
@stop