<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-400 via-green-300 to-green-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-3xl p-12 text-center shadow-xl w-96 animate-fade-in">
        <h1 class="text-4xl font-extrabold text-white mb-4 drop-shadow-lg">Welcome!</h1>
        <p class="text-lg text-white mb-8">Login to your <span class="font-semibold">Admin Dashboard</span></p>
        
        <a href="{{ route('login') }}" 
           class="inline-block bg-white text-green-600 font-bold px-6 py-3 rounded-full shadow-lg transform transition duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-green-600 hover:text-white">
           Login
        </a>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }
        .animate-fade-in {
            animation: fade-in 1s ease forwards;
        }
    </style>

</body>
</html>
