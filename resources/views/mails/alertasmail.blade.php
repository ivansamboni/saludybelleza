
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
    <div class="container" style="width: 50rem;align-items:center">
        <br><br>
        <img src="{{ $message->embed(public_path().'/img/logo.png') }}"  alt="..." style="width: 30%;float:center;">
        <br><br>
        <p class="card-text text-center" >Hola <strong>{{$contenido['nombre']}}&nbsp;{{$contenido['apellido']}}</strong>
            estamos encantados de tenerte en nuestro centro de acondicionamiento físico ARMONIA,
            SALUD Y BELLEZA por eso te notificamos que tu fecha de vencimiento en nuestro centro será <strong>{{$contenido['fecha']}}</strong>
            Para nosotros es un placer que sigas disfrutando de nuestras instalaciones, te invitamos a que renueves tu membrecía con nosotros
            .</p><br>
            <h4>Puedes escanear el siguiente codigo QR para hacer una transferencia directamente a nuestra cuenta BANCOLOMBIA o a la cuenta:546-413212-50 Puedes adjuntar la confirmación de la transacción a nuestro WhatsApp: 322 8122325</h4>
            <br><br>
            <img src="{{ $message->embed(public_path().'/img/qr.png') }}"  alt="..." style="width: 46%;float:center;">
            <br><br>
        
    </div>
   
    
    </center>
</body>

</html>
        