<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'MFR') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="bg-gray-100">

    <nav class="fixed top-0 w-full bg-transparent z-10 mt-8">
        <div class="container mx-auto mt-2 px-4 sm:px-6 lg:px-8 flex items-center justify-between py-4">
            <div class="flex items-center flex-grow">
                <a id="app-name" class="text-gray-800 mr-4 cursor-pointer font-bold app-name-link text-3xl" href="#">
                    {{ config('app.name', 'MFR') }}
                </a>
            </div>
            <div class="flex items-center">
                <div class="md:hidden">
                    <button type="button" class="text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-600 menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="menu" id="menu">
                        <a href="#recent" class="text-black hover:text-white hover:bg-black transition duration-300 rounded-full border border-black">Recent Works</a>
                        <a href="#service" class="text-black hover:text-white hover:bg-black transition duration-300 rounded-full border border-black">Services</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#recent"  id="recent_but" class="text-black hover:text-white hover:bg-black transition duration-300 rounded-full px-4 py-2 border border-black">Recent Works</a>
                    <a href="#service" id="service_but" class="text-black hover:text-white hover:bg-black transition duration-300 rounded-full px-4 py-2 border border-black">Services</a>
                </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
