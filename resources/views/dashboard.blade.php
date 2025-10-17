@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<h2 class="text-2xl font-bold">Welcome to the Admin Dashboard</h2>
<p>Manage your content here.</p>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                        Logout
                    </button>
                </form>

@endsection
