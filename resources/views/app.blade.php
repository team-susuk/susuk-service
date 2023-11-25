<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="antialiased bg-[#F7F7F7]">
        <main class="my-0 mx-auto min-h-full max-w-screen-sm bg-white overflow-hidden">
            @inertia
        </main>
    </body>
</html>
