@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
    <h1>Organizations</h1>
    <a href="{{ route('organizations.create') }}" class="btn btn-success">Add</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <form action="{{ route("organizations.index") }}">
                    <x-adminlte-input name="search" type="text" placeholder="Search" value="{{ request()->search }}"/>
                </form>
            </div>
            <table role="table" class="table table-bordered bg-white" >
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($organizations as $organization)
                    <tr>
                        <td>{{ $organization->id }}</td>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->created_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-info mr-3">Edit</a>
                            <form action="{{route('organizations.destroy',$organization->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <x-adminlte-button label="Delete" type="submit" theme="danger"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if(!$organizations->count())
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $organizations->links() }}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
