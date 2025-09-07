@extends('admin.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Important Infos</h2>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.important-infos.create') }}" class="btn btn-primary">
            + Add Important Info
        </a>
    </div>

    @if($importantInfos->isEmpty())
        <p>No important infos found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>List Items</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($importantInfos as $info)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $info->title }}</td>
                        <td>
                            @if(!empty($info->items) && is_array($info->items))
                                <ul class="mb-0">
                                    @foreach($info->items as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em>-</em>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.important-infos.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.important-infos.destroy', $info->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this info?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
