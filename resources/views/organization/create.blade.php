@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
    <h1>Create Organization</h1>
    </div>
@stop

@section('content')
    <div class="card col-6">
        <div class="card-body">
            <form action="{{route('organizations.store')}}" method="post">
                @csrf
                <x-adminlte-input label="Name" name="name" type="text" placeholder="Enter Organization Name" value="{{old('name')}}" required/>
                <x-adminlte-button label="Create" type="submit" theme="primary"/>
                <a href="{{ route('organizations.index') }}" class="btn btn-secondary ml-3">Cancel</a>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
