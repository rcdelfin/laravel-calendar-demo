<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Calendar Demo Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ '/css/app.css' }}" rel="stylesheet"/>
    </head>
    <body>
        <div id="app">
            <main-app></main-app>
        </div>

        <script src="{{ '/js/manifest.js' }}"></script>
        <script src="{{ '/js/vendor.js' }}"></script>
        <script src="{{ '/js/app.js' }}"></script>
    </body>
</html>
