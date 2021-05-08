<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- <script src="https://unpkg.com/filepond/dist/filepond.js"></script> --}}
  @stack('scripts')

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  @stack('stylesheets')
  {{-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" /> --}}
</head>

<body>
  <div id="app">
    @include('layouts.navbar')
    <main class="py-4 container">
      @include('layouts.flash-message')
      @yield('modal')
      @yield('content')
    </main>
  </div>
  @yield('scripts')
</body>

</html>
