@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Clients</h2>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-3">Add Client</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>
                    @if($client->logo)
                        <img src="{{ asset('storage/' . $client->logo) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
