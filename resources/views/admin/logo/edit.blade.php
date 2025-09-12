@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Logo</h1>
    <form action="{{ route('admin.logo.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Logo Image</label>
            <input type="file" name="image" class="form-control">
            @if($logo->image)
                <div class="mt-2">
                    <img src="{{ Storage::url($logo->image) }}" width="150" class="mb-2">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeLogo({{ $logo->id }}, this)">Remove</button>
                </div>
            @endif
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    function removeLogo(id, btn) {
        if(confirm('Remove logo?')){
            fetch(`/admin/logo/${id}/remove-image`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(res => res.json())
            .then(res => {
                if(res.success) btn.parentElement.remove();
            });
        }
    }
</script>
@endsection
