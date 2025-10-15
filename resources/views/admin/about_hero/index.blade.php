@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Hero Section</h2>
    <a href="{{ route('admin.about-hero.create') }}" class="btn btn-primary mb-3">Add New Hero</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Video</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($heroes as $hero)
            <tr>
                <td>{{ $hero->title }}</td>
                <td>{{ $hero->subtitle }}</td>
                <td>
                    @if ($hero->image)
                        <img src="{{ asset('storage/'.$hero->image) }}" width="100">
                    @endif
                </td>
                <td>
                    @if ($hero->video)
                        <video width="120" controls>
                            <source src="{{ asset('storage/'.$hero->video) }}" type="video/mp4">
                        </video>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.about-hero.edit', $hero->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.about-hero.destroy', $hero->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this hero?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
