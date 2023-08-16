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
<body class="h-screen overflow-hidden">

    <div class="flex flex-row h-full items-center justify-center">
        <div class="w-1/3 flex-grow overflow-y-auto flex flex-col justify-center items-center">
            <div id="sprite-container" class="h-full flex flex-col justify-center items-center mb-8"></div>
        </div>
        <div class="w-1/3 flex-grow overflow-y-auto flex flex-col justify-center items-center">
            <div class="h-full flex flex-col justify-between items-center">

                <form id="pokemon-form" class="bg-white p-8 rounded shadow-md">
                    @csrf
                    <label class="block mb-2" for="name">Pokemon Base Stats</label>
                    <input class="w-full px-3 py-2 border rounded" type="text" name="name" id="name" required>
                    <div class="mt-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Submit</button>
                        <button id="random-pokemon-button" class="bg-green-500 text-white px-4 py-2 rounded" type="button">Random Pokemon Generator</button>

                    </div>
                </form>

                <!-- Add an empty space to push response container to the center -->
                <div class="flex-grow"></div>
            </div>
        </div>
        <div class="w-1/3 flex-grow overflow-y-auto flex flex-col justify-center items-center">
            <div id="response-container" class="mt-4"></div>
        </div>
    </div>

    <script src="{{ URL::asset('js/pokemon.js') }}"></script>
</body>
</html>
