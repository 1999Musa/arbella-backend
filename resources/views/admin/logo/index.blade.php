@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Logos</h1>
    <a href="{{ route('admin.logo.create') }}" class="btn btn-primary mb-3">Upload Logo</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logos as $logo)
                <tr>
                    <td>{{ $logo->id }}</td>
                    <td>
                        @if($logo->image)
                            <img src="{{ Storage::url($logo->image) }}" width="120">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.logo.edit', $logo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.logo.destroy', $logo->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this logo?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
