<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <title>@yield('title','Test PlaceToPay')</title>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
                <div class="top-right links">
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/pse') }}">Pse</a>
                        <a href="{{ url('/list-payment-reference') }}">Pagos</a>
                </div>
          

            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
