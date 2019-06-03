<!DOCTYPE html>
<html lang="en">
    <head>
        @if(isset($title))
            <title>{{$title}} | {{config('app.name')}}</title>
        @else
            <title>{{config('app.name')}}</title>
        @endif

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <link rel="stylesheet" href="{{mix('css/app.css')}}">
    </head>

    <body class="antialiased">
        <div id="app">
            @yield('body')

{{--            @if(flash()->message)--}}
{{--                <flash-notification message="{{flash()->message}}" type="{{flash()->class}}"/>--}}
{{--            @endif--}}
        </div>

        <script src="{{mix('js/manifest.js')}}"></script>
        <script src="{{mix('js/vendor.js')}}"></script>
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
