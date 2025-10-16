<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen min-w-full bg-background">
@include('layouts.menu')

<header class="text-center py-7 px-basic bg-header border-b-4 border-solid border-reviewborder">
    <h1 class="text-xl font-bold">Login</h1>
</header>

<main class="py-4 px-basic h-body">
    <section class="py-8 px-8 bg-review border-4 border-solid border-reviewborder rounded-2xl h-full">
        {{ $slot }}
    </section>
</main>

@include('layouts.footer')
{{--<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">--}}
{{--    <div>--}}
{{--        <a href="/">--}}
{{--            <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}
{{--</div>--}}
</body>
</html>
