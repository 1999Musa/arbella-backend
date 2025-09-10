@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Product Categories</h1>
    <a href="{{ route('admin.product-categories.create') }}" class="btn btn-primary">Add New</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Hero Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->title }}</td>
                <td>
                    @if($cat->hero_image)
                        <img src="{{ asset('storage/'.$cat->hero_image) }}" alt="" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.product-categories.edit',$cat) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.product-categories.destroy',$cat) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
