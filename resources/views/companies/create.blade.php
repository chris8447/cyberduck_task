@extends('adminlte::page')

@section('title', 'New Company')

@section('content_header')
@isset($company)
<h1>Edit an existing company</h1>
@else
<h1>Create a new company</h1>
@endisset
@stop

@section('plugins.BsCustomFileInput', true)

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
<form action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}" method="post"
    enctype="multipart/form-data">
    @method(isset($company) ? 'PUT' : 'POST')
    @csrf
    <x-adminlte-input name="name" placeholder="Name" required value="{{ isset($company) ? $company->name : '' }}" />
    <x-adminlte-input name="email" type="email" placeholder="Email"
        value="{{ isset($company) ? $company->email: '' }}" />
    <x-adminlte-input-file type=" file" name="logo" placeholder="Upload logo" accept="image/*" />
    <x-adminlte-input name=" website" placeholder="Website" value="{{ isset($company) ? $company->website : '' }}" />
    <x-adminlte-button label="Submit" type="submit" theme="success" icon="fas fa-lg fa-save" />
</form>
@stop