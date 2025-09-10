@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Hero Sliders</h1>

    <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary mb-3">Add New Slider</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($sliders->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hero Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            @if($slider->hero_image)
                                <img src="{{ asset('storage/' . $slider->hero_image) }}" width="150" alt="Hero Image">
                            @endif
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->subtitle }}</td>
                        <td>
                            <a href="{{ route('admin.hero-sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.hero-sliders.destroy', $slider->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No sliders found. <a href="{{ route('admin.hero-sliders.create') }}">Add one now</a>.</p>
    @endif
</div>
@endsection
