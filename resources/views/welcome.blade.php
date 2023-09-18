<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5 pt-5 text-center">
                    <h1 class="mb-4">This is Frontend Page </h1>
                    <div>
                        <a class="btn btn-primary" href="/admin/dashboard">Go To Admin Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
