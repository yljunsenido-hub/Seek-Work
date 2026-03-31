<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | My Laravel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <nav class="p-6 flex justify-between items-center bg-white shadow-sm">
        <div class="text-2xl font-bold text-indigo-600">LaravelApp</div>
        <div>
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-indigo-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-20 px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6">
            Build something <span class="text-indigo-600">amazing.</span>
        </h1>
        <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto">
            Welcome to your new Laravel application. This is a custom landing page designed to help you jumpstart your next big idea.
        </p>
        
        <div class="flex justify-center gap-4">
            <a href="https://laravel.com/docs" class="bg-gray-900 text-white px-8 py-3 rounded-md font-semibold hover:bg-black transition">
                Read Docs
            </a>
            <a href="#" class="bg-white border border-gray-300 px-8 py-3 rounded-md font-semibold hover:bg-gray-50 transition">
                Live Demo
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8 mt-24 text-left">
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4 font-bold">1</div>
                <h3 class="text-xl font-bold mb-2">Robust Routing</h3>
                <p class="text-gray-500">Define your application paths with expressive, simple syntax.</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4 font-bold">2</div>
                <h3 class="text-xl font-bold mb-2">Eloquent ORM</h3>
                <p class="text-gray-500">Interact with your database using an intuitive ActiveRecord implementation.</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4 font-bold">3</div>
                <h3 class="text-xl font-bold mb-2">Blade Engine</h3>
                <p class="text-gray-500">Powerful templating without the overhead of complex syntaxes.</p>
            </div>
        </div>
    </main>

    <footer class="mt-24 py-10 text-center text-gray-400 text-sm">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>

</body>
</html>