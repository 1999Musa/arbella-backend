@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Factory Images</h1>
    <a href="{{ route('admin.front-factory.create') }}" class="btn btn-primary mb-3">Add Factory Image</a>
    <table class="table">
        <thead>
            <tr><th>Image</th><th>Title</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($factories as $factory)
            <tr>
                <td><img src="{{ asset('storage/'.$factory->image) }}" width="100"></td>
                <td>{{ $factory->title }}</td>
                <td>
                    <a href="{{ route('admin.front-factory.edit', $factory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.front-factory.destroy', $factory->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
