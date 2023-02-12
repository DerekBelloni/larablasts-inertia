<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @inertiaHead
</head>

{{-- <style>
    #marquee {
        font-family: "Lobster";
        font-size: 40px
    }
</style> --}}

<body class="bg-black">
    @inertia
    @vite('resources/js/app.js')
</body>

</html>
