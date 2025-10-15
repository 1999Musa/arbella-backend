@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Short Story Videos</h1>
    <a href="{{ route('admin.short-story.create') }}" class="btn btn-primary mb-3">Add Video</a>
    <table class="table">
        <thead>
            <tr><th>Title</th><th>Description</th><th>Video</th><th>Actions</th></tr>
        </thead>
        <tbody>
@foreach($videos as $video)
<tr>
    <td>{{ $video->title }}</td>
    <td>{{ $video->description }}</td>
    <td>
        @if($video->video)
            <video src="{{ asset('storage/'.$video->video) }}" width="200" controls></video>
        @endif
    </td>
    <td>
        <a href="{{ route('admin.short-story.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('admin.short-story.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Remove</button>
        </form>
    </td>
</tr>
@endforeach

        </tbody>
    </table>
</div>
@endsection
