<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-partials.head />
    <style>
        .gradient {
            background: linear-gradient(90deg, #009726 0%, #daae51 100%);
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white gradient">
    <x-partials.nav />
    <x-ui.alert />
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>




    <x-partials.footer />


    <livewire:scripts>
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script src="{{ asset('js/dropdown.js') }}" defer></script>
</body>

</html>