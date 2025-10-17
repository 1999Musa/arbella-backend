@extends('admin.layout')

@section('content')
<div class="container py-4">
    <h2>Contact Hero Section</h2>
    <a href="{{ route('admin.contacthero.create') }}" class="btn btn-primary mb-3">Add / Update Image</a>

    @if($hero)
        <div>
            <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Image" style="max-width:400px;">
            <a href="{{ route('admin.contacthero.edit', $hero->id) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('admin.contacthero.destroy', $hero->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger mt-3">Delete</button>
            </form>
        </div>
    @else
        <p>No image found.</p>
    @endif
</div>
@endsection
