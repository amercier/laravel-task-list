<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
                Task list
            </nav>
        </div>

        @yield('content')
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
</html>
