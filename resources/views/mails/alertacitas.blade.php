@php
    use Carbon\Carbon;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    
</head>

<body>
<center>
    <div class="container" style="width: 30rem;align-items:center">
        <br><br>
        <img src="{{ $message->embed(public_path().'/img/logo.png') }}"  alt="..." style="width: 30%;float:center;">
        <br><br>
        <p class="card-text text-center" >Hola <strong>{{$contenido['nombre']}}&nbsp;{{$contenido['apellido']}}</strong>
           desde nuestro centro de acondicionamiento físico ARMONIA,
            SALUD Y BELLEZA te recordamos que la fecha de tu próxima cita será el <strong>{{\Carbon\Carbon::parse($contenido['fecha'])->format('d/m/Y h:i A')}}</strong><br>
            <br><br>
            <small>Más información Tel: 322 8122325</small>            
        
    </div>
   
    
    </center>
</body>

</html>
        