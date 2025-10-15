@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Certified Logos</h1>
    <a href="{{ route('admin.certified-logos.create') }}" class="btn btn-primary mb-3">Add Logo</a>
    <table class="table">
        <thead>
            <tr><th>Image</th><th>Title</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($logos as $logo)
            <tr>
                <td><img src="{{ asset('storage/'.$logo->image) }}" width="100"></td>
                <td>{{ $logo->title }}</td>
                <td>
                    <a href="{{ route('admin.certified-logos.edit', $logo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.certified-logos.destroy', $logo->id) }}" method="POST" class="d-inline">
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
