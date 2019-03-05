<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!--here we give the name of the page you can go to the .env-->
            <!--then rewrite the APP_NAME -->
            <!--the here we use the function config inside nested carlly prases-->
            <!--take the paramerters in the '' then -->
        <title>{{config('app.name','AHmed')}}</title>
    </head>
    <body>
        @yield('content')
    </body>
</html>
