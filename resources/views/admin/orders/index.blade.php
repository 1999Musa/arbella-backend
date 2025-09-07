@extends('admin.layout')

@section('content')
<div class="container mt-4">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1 class="mb-4">Manage Place Order Page</h1>

    {{-- ===================== ORDER STEPS ===================== --}}
    <div class="card mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Order Steps</h3>
            <a href="{{ route('admin.order_steps.create') }}" class="btn btn-primary">+ Add Step</a>
        </div>
        <div class="card-body">
            @if($orderSteps->isEmpty())
                <p>No steps added yet.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Step Number</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderSteps as $step)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $step->step }}</td>
                                <td>{{ $step->title }}</td>
                                <td>{{ $step->description ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.order_steps.edit', $step->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.order_steps.destroy', $step->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this step?')" class="btn btn-sm btn-danger">
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
    </div>

    {{-- ===================== IMPORTANT INFOS ===================== --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Important Information</h3>
            <a href="{{ route('admin.important_infos.create') }}" class="btn btn-primary">+ Add Info</a>
        </div>
        <div class="card-body">
            @if($importantInfos->isEmpty())
                <p>No important info added yet.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Items (List)</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($importantInfos as $info)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $info->title }}</td>
                                <td>
                                    @if($info->items)
                                        <ul>
                                            @foreach($info->items as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.important_infos.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.important_infos.destroy', $info->id) }}" method="POST" style="display:inline-block;">
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
    </div>

</div>
@endsection
