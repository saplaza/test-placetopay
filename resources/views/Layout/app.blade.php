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
                <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">Test PSE</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class=""><a href="{{ url('/home') }}">HOME</a></li>
                      <li><a href="{{ url('/pse') }}">PSE</a></li>
                      <li><a href="{{ url('/list-payment-reference') }}">PAGOS</a></li>
                      
                    </ul>
                  </div>
                </nav>
          

            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
