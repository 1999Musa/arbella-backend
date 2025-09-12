@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Factory Records</h1>
    <a href="{{ route('admin.factory.create') }}" class="btn btn-primary mb-3">Add</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hero Image</th>
                <th>Gallery Count</th>
                <th>Certificates Count</th>
                <th>Clients Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($factories as $factory)
                <tr>
                    <td>{{ $factory->id }}</td>

                    <td>
                        @if($factory->hero_image && file_exists(public_path('storage/' . $factory->hero_image)))
                            <img src="{{ asset('storage/' . $factory->hero_image) }}" 
                                 alt="Hero Image" 
                                 width="120" 
                                 class="img-thumbnail">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ is_array($factory->gallery) ? count($factory->gallery) : 0 }}</td>
                    <td>{{ is_array($factory->certificates) ? count($factory->certificates) : 0 }}</td>
                    <td>{{ is_array($factory->clients) ? count($factory->clients) : 0 }}</td>

                    <td>
                        <a href="{{ route('admin.factory.edit', $factory) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{ route('admin.factory.destroy', $factory) }}" class="d-inline">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No factory records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
