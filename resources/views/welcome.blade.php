<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-15 sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="padding:200px">
                <div class="row mx-auto">
                    <div class="col">
                        <h1 class="text-center text-red-700 font-bold">Welcome To Eva Grosir Dashboard</h1>
                    </div>
                </div>
                <div class="row my-4">

                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:ring focus:outline-none focus:ring-blue-500 px-4 py-2 text-white rounded-md">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:ring focus:outline-none focus:ring-blue-500 px-4 py-2 text-white rounded-md">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:ring focus:outline-none focus:ring-blue-500 px-4 py-2 text-white rounded-md">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>
