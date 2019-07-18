<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name')}}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <link rel="stylesheet" href="{{mix('css/app.css')}}">
    </head>
    <body>
        @inertia

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>