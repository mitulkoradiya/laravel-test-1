@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
    <h1>Air Duct Cleaning</h1>
    <a href="{{ route('air-duct-cleaning.create') }}" class="btn btn-success">Add</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
{{--                <form action="{{ route("air-duct-cleaning.index") }}">--}}
{{--                    <x-adminlte-input name="search" type="text" placeholder="Search" value="{{ request()->search }}"/>--}}
{{--                </form>--}}
            </div>
            <table role="table" class="table table-bordered bg-white">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Job Name</th>
                    <th>No Of Furnace</th>
                    <th>Area In Sqft</th>
                    <th>Schedule Date</th>
                    <th>Time Frame</th>
                </tr>
                </thead>
                <tbody>
                @foreach($airDuctCleanings as $organization)
                    <tr>
                        <td>{{ $organization->id }}</td>
                        <td>{{ $organization->job_name }}</td>
                        <td>{{ $organization->furnace }}</td>
                        <td>{{ $organization->area }}</td>
                        <td>{{ $organization->schedule_date }}</td>
                        <td>{{ \App\Models\AirDuctCleaning::TIME_FRAME[$organization->time_frame] }}</td>

                    </tr>
                @endforeach
                @if(!$airDuctCleanings->count())
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            @if($airDuctCleanings->count())
            <div class="d-flex justify-content-end mt-3">
                {{ $airDuctCleanings->links() }}
            </div>
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

