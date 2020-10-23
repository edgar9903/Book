<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- URL -->
    <meta name="url" content="{{ url('/') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel ="Stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('book.index') }}">
                    Books
                </a>
                <a class="navbar-brand" href="{{ route('book.create') }}">
                    Create Book
                </a>
                <a class="navbar-brand" href="{{ route('author.index') }}">
                    Authors
                </a>
                <a class="navbar-brand" href="{{ route('author.create') }}">
                    Create Author
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</html>
