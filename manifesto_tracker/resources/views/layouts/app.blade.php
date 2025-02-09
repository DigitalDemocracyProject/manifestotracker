<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manifesto Tracker</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('content')
</body>
</html>

