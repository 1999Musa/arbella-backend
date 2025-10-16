@extends('admin.layout')


@section('content')
<h1 class="text-2xl font-bold mb-4">Upload Images</h1>

<form action="{{ route('admin.excellence.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Select Section</label>
        <select name="section_id" class="border rounded p-2 w-full">
            @foreach($sections as $section)
                <option value="{{ $section->id }}" {{ request('section_id') == $section->id ? 'selected' : '' }}>
                    {{ $section->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">Select Images</label>
        <input type="file" name="images[]" multiple class="w-full" />
    </div>

    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Upload</button>
</form>
@endsection
