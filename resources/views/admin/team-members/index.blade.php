@extends('admin.layout')

@section('content')
<h1>Team Members</h1>
<a href="{{ route('admin.team-members.create') }}">Add New Member</a>
<table>
<tr>
  <th>Name</th>
  <th>Position</th>
  <th>Image</th>
  <th>Actions</th>
</tr>
@foreach($members as $member)
<tr>
  <td>{{ $member->name }}</td>
  <td>{{ $member->position }}</td>
  <td>
    @if($member->image)
      <img src="{{ asset('storage/' . $member->image) }}" width="50" />
    @endif
  </td>
  <td>
    <a href="{{ route('admin.team-members.edit', $member->id) }}">Edit</a>
    <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
  </td>
</tr>
@endforeach
</table>
@endsection
