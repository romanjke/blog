<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if(Request::is('admin/*'))
            @include('layouts.includes.admin-nav')
        @else
            @include('layouts.includes.public-nav')
        @endif

        <div class="container">
            @if (Session::has('success'))
                @component('components.success')
                {{ Session::get('success') }}
                @endcomponent
            @endif

            <h1>@yield('title')</h1>

            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
