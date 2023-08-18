<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last.fm Top Tracks</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&display=swap">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ URL::asset('js/lastfm.js') }}"></script>
    <style>
        body {
            font-family: 'Atkinson Hyperlegible', sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <h1>Last.fm Weekly Track Chart Fetcher</h1>
        <form id="lastfm-form" action="#">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Submit</button>
            <div id="loading-indicator" style="display: none;">Loading...</div>
            <div id="track-list" style="display: none;"></div>
        </form>
        <div id="chart-container" style="width: 800px; height: 400px;">
            <canvas id="line-chart"></canvas>
        </div>

        <pre id="output"></pre>
    </div>
</body>
</html>
