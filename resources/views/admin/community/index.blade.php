@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Community Records</h1>
    <a href="{{ route('admin.community.create') }}" class="btn btn-primary mb-3">Add New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hero Image</th>
                <th>Title</th>
                <th>Images</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($communities as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>
                        @if($c->hero_image)
                            <img src="{{ Storage::url($c->hero_image) }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $c->title }}</td>
                    <td>
                        @if($c->images)
                            @foreach ($c->images as $img)
                                <img src="{{ Storage::url($img) }}" width="50" class="mb-1">
                            @endforeach
                        @else
                            No Images
                        @endif
                    </td>
                    <td>{{ Str::limit($c->description, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.community.edit', $c->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.community.destroy', $c->id) }}" method="POST" class="d-inline">
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
