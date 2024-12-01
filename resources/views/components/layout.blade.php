<!DOCTYPE html>
<html lang="en">
<head>
    <title>BAZZARKU.com - {{ $title ?? 'All Bazzar and Event in One Place' }}</title>
    @include("layouts.metadata")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- <link rel="stylesheet" href="/css/tailwind/tailwind.min.css"> -->
    {{-- <link rel="stylesheet" href="/css/styles.css"> --}}
</head>
<body class="antialiased bg-body text-body font-body">
    <div class="">
        @include("layouts.navbar")
        {{ $slot }}
        @include("layouts.footer")
    </div>
</body>
</html>
