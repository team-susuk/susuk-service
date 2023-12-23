<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title inertia>{{ config('app.name') }} {{ @$pageTitle  ? "| {$pageTitle}" : ''}}</title>

<link rel="stylesheet" href="https://muhammadlailil.github.io/iconsax/style/iconsax.css" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<!-- Scripts -->
{{-- @if (config("app.env") == 'development')
@endif --}}
@routes
@vite('resources/css/app.css')
@vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
@inertiaHead