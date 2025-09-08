@extends('admin.layout')
@section('title','Reasons')

@section('content')
<h2 class="text-2xl font-bold mb-6">Reasons</h2>
<a href="{{ route('admin.reasons.create') }}" class="btn btn-primary mb-4">Add Reason</a>

<table class="table-auto w-full bg-white shadow rounded">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reasons as $reason)
        <tr>
            <td>{{ $reason->id }}</td>
            <td>
                @if($reason->image)
                <img src="{{ asset('storage/'.$reason->image) }}" class="w-20 h-20 object-cover rounded"/>
                @endif
            </td>
            <td>{{ $reason->title }}</td>
            <td>{{ $reason->description }}</td>
            <td>
                <a href="{{ route('admin.reasons.edit',$reason) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.reasons.destroy',$reason) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
