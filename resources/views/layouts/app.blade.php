<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Task List
                        </a>
                    </div>

                </div>
            </nav>
        </div>

        @yield('content')
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
</html>
