@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Sustainability Records</h1>
    <a href="{{ route('admin.sustainability.create') }}" class="btn btn-primary mb-3">Add New</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hero Image</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sustainabilities as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>
                        @if($s->hero_image)
                            <img src="{{ Storage::url($s->hero_image) }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $s->title }}</td>
                    <td>
                        @if($s->image)
                            <img src="{{ Storage::url($s->image) }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ Str::limit($s->description, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.sustainability.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.sustainability.destroy', $s->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
