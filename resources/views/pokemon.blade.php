<!DOCTYPE html>
<html>
<head>
    <title>Pokemon</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&display=swap">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Atkinson Hyperlegible', sans-serif;
        }
    </style>
</head>
<body>
    <div class="flex-container">

            <form id="pokemon-form" class="bg-white p-8 rounded shadow-md">
                @csrf
                <label class="block mb-2" for="name">Pokemon Base Stats:</label>
                <input class="w-full px-3 py-2 border rounded" type="text" name="name" id="name" required>
                <div class="mt-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Submit</button>
                </div>
            </form>

            <div id="response-container" class="mt-4"></div>

    </div>

        <div id="moves-container" class="mt-4"></div>

        <div id="sprite-container" class="flex-container justify-center items-end mb-8"></div>
        
    </div>
    <script src="{{ URL::asset('js/pokemon.js') }}"></script>
</body>
</html>
