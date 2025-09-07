<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-gray-800 text-white p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="font-bold text-xl">Admin Panel</h1>
            <nav>
                <a href="{{ route('admin.team-members.index') }}" class="mr-4 hover:underline">Team Members</a>
                <a href="{{ url('/') }}" class="hover:underline">Go to Website</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto mt-8 p-4">
        @yield('content')
    </main>

</body>
</html>
