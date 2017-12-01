<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
        <style>
            #app {
                margin-top: 25px;
            }
        </style>
    </head>
    <body>
        <div class="container" id="app">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    @if(session()->has('status'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          {{ session()->get('status') }}
                        </div>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>

        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>