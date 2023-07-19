<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Facebook Meta --}}
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image"content="{{ config('app.url') }}/@yield('og:image')" />
<meta property="og:title" content="@yield('og:title')" />
{{-- <meta property="og:type" content="article" />
<meta property="og:description" content="How much does culture influence creative thinking?" /> --}}

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">

{{-- Styles --}}
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->


{{-- @vite([ 'resources/js/app.js']) --}}

<title>@yield('title' , 'Blog')</title>
<livewire:styles>