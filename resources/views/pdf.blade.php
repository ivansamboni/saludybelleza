<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ public_path('css/boots.css') }}" type="text/css">

</head>

<body>


    <center>
        <img src="{{ public_path('img/logo2.jpg') }}" width="100px" alt="">
    </center>
    <br>
    <h2 align="center"><strong>Historia Clinica</strong></h2><br>

    <table>
        <tr>
            <td><strong>Nombre:</strong> {{ $cliente->nombres }} {{ $cliente->apellidos }} </td>
            <td><strong>{{ $cliente->tipodocumento }}</strong>: {{ $cliente->identificacion }} </td>
            <td><strong>Genero:</strong> {{ $cliente->genero }} </td>
            <td><strong>Estado Civil:</strong> {{ $cliente->estadocivil }} </td>
        </tr>
    </table>

    <table>
        <tr>
            <td><strong>Fecha de Nacimiento:</strong> {{ $cliente->nacimiento}}</td>
            <td><strong>Edad:</strong> {{ $cliente->edad }}</td>
            <td><strong>Dirección:</strong> {{ $cliente->direccion }}</td>

        </tr>
    </table>
    <table>
        <tr>
            <td><strong>Ocupación:</strong> {{ $cliente->ocupacion }}</td>
            <td><strong>Teléfono:</strong> {{ $cliente->telefono }}</td>
            <td><strong>Otro Teléfono:</strong> {{ $cliente->otrotelefono }}</td>

        </tr>
    </table>
    <table>
        <tr>
            <td><strong>Correo:</strong> {{ $cliente->correo }}</td>
            <td><strong>Altura en Cms:</strong> {{ $cliente->altura }}</td>
            <td><strong>Peso en Kgs:</strong> {{ $cliente->peso }}</td>
        </tr>
    </table>
    <hr>

    <h3 align="center"><strong>Signos Vitales</strong></h3>
    <br>
    <strong>FC:</strong> {{ $cliente->signofc }}
    <strong>FR:</strong> {{ $cliente->signofr }}
    <strong>P/A Sistolica:</strong> {{ $cliente->signopasistolica }}
    <strong>P/A Diastolica:</strong> {{ $cliente->signopadiastolica }}
    <strong>FC:</strong> {{ $cliente->signofc }}
    <strong>FR:</strong> {{ $cliente->signofr }}
    <strong>P/A Sistolica:</strong> {{ $cliente->signopasistolica }}
    <strong>P/A Diastolica:</strong> {{ $cliente->signopadiastolica }}
    <br>

<hr>

    <h4 align="center"><strong>Antecedentes Personales</strong></h4>
    <br>

    <table>
        <td><strong>Diabetes:</strong> {{ $cliente->diabetes }}</td>
        <td><strong>Alergia:</strong> {{ $cliente->alergia }}</td>
        <td><strong>HTA:</strong> {{ $cliente->hta }}</td>
        <td><strong>Cáncer:</strong> {{ $cliente->cancer }}</td>
    </table>

    <table>
        <tr>
            <td><strong>Transfusiones:</strong> {{ $cliente->transfusiones }}</td>
            <td><strong>Enf. Reumáticas:</strong> {{ $cliente->enfreumaticas }}</td>
            <td><strong>Encames:</strong> {{ $cliente->encames }}</td>
            <td><strong>Accidentes:</strong> {{ $cliente->accidentes }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td><strong>Cardiopatías:</strong> {{ $cliente->cardiopatias }}</td>
            <td><strong>Cirugías:</strong> {{ $cliente->cirugias }}</td>
            <td><strong>Otros:</strong> {{ $cliente->anteceotros }}</td>
        </tr>
    </table>
    <br>

    <h4 align="center"><strong>Antecedentes Familiares</strong></h4>
    <br>

    <table>
        <td><strong>Diabetes:</strong> {{ $cliente->fdiabetes }}</td>
        <td><strong>Alergia:</strong> {{ $cliente->falergia }}</td>
        <td><strong>HTA:</strong> {{ $cliente->fhta }}</td>
        <td><strong>Cáncer:</strong> {{ $cliente->fcancer }}</td>
    </table>

    <table>
        <tr>
            <td><strong>Transfusiones:</strong> {{ $cliente->ftransfusiones }}</td>
            <td><strong>Enf. Reumáticas:</strong> {{ $cliente->fenfreumaticas }}</td>
            <td><strong>Encames:</strong> {{ $cliente->fencames }}</td>
            <td><strong>Accidentes:</strong> {{ $cliente->faccidentes }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td><strong>Cardiopatías:</strong> {{ $cliente->fcardiopatias }}</td>
            <td><strong>Cirugías:</strong> {{ $cliente->fcirugias }}</td>
            <td><strong>Otros:</strong> {{ $cliente->fanteceotros }}</td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td><strong>Antecedentes Farmacológicos:</strong>{{ $cliente->antfarmacologicos }}</td>
            <td><strong>Antecedentes Alergicos:</strong> {{ $cliente->antalergicos }}</td>
        </tr>
        <tr>
            <td><strong>Antecedentes Quirúrgicos:</strong> {{ $cliente->antquirurgicos }}</td>
            <td><strong>Tratamiento Médico actual:</strong> {{ $cliente->tratamedicoactual }}</td>
            </tr>
            <tr>
            <td><strong>Cicatríz Quirúrgica:</strong> {{ $cliente->cicaquirurgica }}</td>
        </tr>
    </table>
    <br>
    <h7 align="center"><strong>Marcha / Deambulación</strong></h7>
    <br>
    <table>
        <tr>
            <td><strong>Libre:</strong> {{ $cliente->marchalibre }}</td>
            <td><strong>Claudicante:</strong> {{ $cliente->marchaclaudicante }}</td>
            <td><strong>Con Ayuda:</strong> {{ $cliente->marchaayuda }}</td>
        </tr>
        <tr>
            <td><strong>Espásticas:</strong> {{ $cliente->marchaespasticas }}</td>
            <td><strong>Atáxica:</strong> {{ $cliente->marchaataxica }}</td>
            <td><strong>Otros:</strong> {{ $cliente->marchaotros }}</td>
        </tr>
    </table>
    <br>

    <h7 align="center"><strong>Estudios Paraclínicos</strong></h7>
    <br>
    <strong>Tipo de Estudio</strong> {{ $cliente->estparaclinicos }}
    <strong>Tipo de Estudio</strong> {{ $cliente->escaladolor }}
    <br>

    <h7 align="center"><strong>Se Evidencia</strong></h7>
    <p>{{ $cliente->seevidencia }}</p>

    <h7 align="center"><strong>Diagnostico del Médico</strong></h7>
    <p> {{ $cliente->diagmedico }}</p>
    <br>

    <!--TABLA HOMBRO-->
    <table class="table">
        <thead>
            <tr>
                <th>HOMBRO</th>
                <th></th>
                <th>HOMBRO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Flexión</th>
                <th>Extención</th>
                <th>ABD</th>
                <th>ADD</th>
                <th>Fecha de Registro</th>
            </tr>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->hombroflexion }}</td>
                <td scope="row">{{ $fisio->hombroextencion }}</td>
                <td scope="row">{{ $fisio->hombroabd }}</td>
                <td scope="row">{{ $fisio->hombroadd }}</td>
                @if(isset($fisio->hombroextencion))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <!--TABLA CODO-->
    <table class="table">
        <thead>
            <tr>
                <th>ROTACIÓN</th>
                <th></th>
                <th>CODO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Externa</th>
                <th>Interna</th>
                <th>Flexión</th>
                <th>Ext.</th>
                <th>Fecha de Registro</th>
            </tr>
            @foreach ($fisioterapia as $fisio )

            <tr>
                <td scope="row">{{ $fisio->rotaexterna }}</td>
                <td scope="row">{{ $fisio->rotainterna }}</td>
                <td scope="row">{{ $fisio->codoflexion }}</td>
                <td scope="row">{{ $fisio->codoextencion }}</td>
                @if(isset($fisio->rotaexterna) or isset($fisio->rotainterna)
                or isset($fisio->codoflexion) or isset($fisio->codoextencion))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <!--TABLA ANTEBRAZO-->
    <table class="table">
        <thead>
            <tr>
                <th>ANTEBRAZO</th>
                <th></th>
                <th>DESVIACIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Externa</th>
                <th>Interna</th>
                <th>Flexión</th>
                <th>Ext.</th>
                <th>Fecha de Registro</th>
            </tr>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->antbrazoexterna }}</td>
                <td scope="row">{{ $fisio->antbrazointerna }}</td>
                <td scope="row">{{ $fisio->desviacionflexion }}</td>
                <td scope="row">{{ $fisio->desviacionexterna }}</td>
                @if(isset($fisio->antbrazoexterna) or isset($fisio->antbrazointerna)
                or isset($fisio->desviacionflexion) or isset($fisio->desviacionexterna))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <!--TABLA PALMAR DEDOS-->
    <table class="table">
        <thead>
            <tr>
                <th>Refelxión Palmar</th>
                <th>Refelxión Dorsal</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->palmar }}</td>
                <td scope="row">{{ $fisio->dorsal }}</td>
                @if(isset($fisio->palmar) or isset($fisio->dorsal))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>DEDOS</th>
                <th>MCF</th>
                <th>IFP</th>
                <th>IFD</th>
                <th>ABD</th>
                <th>FECHA REGISTRO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td>Meñique</td>
                <td scope="row">{{$fisio->meniquemcf}}</td>
                <td scope="row">{{$fisio->meniqueifp}}</td>
                <td scope="row">{{$fisio->meniqueifd}}</td>
                <td scope="row">{{$fisio->meniqueabd}}</td>
                @if(isset($fisio->meniquemcf) or isset($fisio->meniqueifp)
                or isset($fisio->meniqueifd) or isset($fisio->meniqueabd))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td>Anular</td>
                <td scope="row">{{$fisio->anularmcf}}</td>
                <td scope="row">{{$fisio->anularifp}}</td>
                <td scope="row">{{$fisio->anularifd}}</td>
                <td scope="row">{{$fisio->anularabd}}</td>
                @if(isset($fisio->anularmcf) or isset($fisio->anularifp)
                or isset($fisio->anularifd) or isset($fisio->anularabd))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td>Medio</td>
                <td scope="row">{{$fisio->mediomcf}}</td>
                <td scope="row">{{$fisio->medioifp}}</td>
                <td scope="row">{{$fisio->medioifd}}</td>
                <td scope="row">{{$fisio->medioabd}}</td>
                @if(isset($fisio->mediomcf) or isset($fisio->medioifp)
                or isset($fisio->medioifd) or isset($fisio->medioabd))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td>Indice</td>
                <td scope="row">{{$fisio->indicemcf}}</td>
                <td scope="row">{{$fisio->indiceifp}}</td>
                <td scope="row">{{$fisio->indiceifd}}</td>
                <td scope="row">{{$fisio->indiceabd}}</td>
                @if(isset($fisio->indicemcf) or isset($fisio->indiceifp)
                or isset($fisio->indiceifd) or isset($fisio->indiceabd))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td>Pulgar</td>
                <td scope="row">{{$fisio->pulgarmcf}}</td>
                <td scope="row">{{$fisio->pulgarifp}}</td>
                <td scope="row">{{$fisio->pulgarifd}}</td>
                <td scope="row">{{$fisio->pulgarabd}}</td>
                @if(isset($fisio->pulgarmcf) or isset($fisio->pulgarifp)
                or isset($fisio->pulgarifd) or isset($fisio->pulgarabd))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach

        </tbody>
    </table>
    <hr>
    <center>
        <h3>Prueba de Arcos de Movilidad para Miembros Inferiores
            Movimientos</h3>
    </center>
    <br>
    <!--TABLA CADERA-->
    <table class="table">
        <thead>
            <tr>
                <th>Flexión cadera c/rod.Ext.</th>
                <th>Extención de Cadera</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->flxcadera }}</td>
                <td scope="row">{{ $fisio->extcadera }}</td>
                @if(isset($fisio->flxcadera) or isset($fisio->extcadera))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <!--TABLA RODILLA-->
    <table class="table">
        <thead>
            <tr>
                <th>Rodilla Flex.</th>
                <th>Rodilla Ext.</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->rodillaflex }}</td>
                <td scope="row">{{ $fisio->rodillaext }}</td>
                @if(isset($fisio->rodillaflex) or isset($fisio->rodillaext))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>

    <!--TABLA CADERA PLANTA-->
    <table class="table">
        <thead>
            <tr>
                <th>Cadera</th>
                <th></th>
                <th>Flexión</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ABD</th>
                <th>ADD</th>
                <th>PLANT.</th>
                <th>EDORS.</th>
                <th>Fecha de Registro</th>
            </tr>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->caderaabd }}</td>
                <td scope="row">{{ $fisio->caderaadd }}</td>
                <td scope="row">{{ $fisio->flexplant }}</td>
                <td scope="row">{{ $fisio->flexdors }}</td>
                @if(isset($fisio->caderaabd) or isset($fisio->caderaadd)
                or isset($fisio->flexplant) or isset($fisio->flexdors))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <!--TABLA ROTACION TOBILLO-->
    <table class="table">
        <thead>
            <tr>
                <th>Rotación</th>
                <th></th>
                <th>Tobillo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Ext.</th>
                <th>Int.</th>
                <th>Inv.</th>
                <th>Eve.</th>
                <th>Fecha de Registro</th>
            </tr>
            @foreach ($fisioterapia as $fisio )
            <tr>
                <td scope="row">{{ $fisio->rotatobiext }}</td>
                <td scope="row">{{ $fisio->rotatobiint }}</td>
                <td scope="row">{{ $fisio->tobilloinv }}</td>
                <td scope="row">{{ $fisio->tobilloeve }}</td>
                @if(isset($fisio->rotatobiext) or isset($fisio->rotatobiint)
                or isset($fisio->tobilloinv) or isset($fisio->tobilloeve))
                <td scope="row">{{ $fisio->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>

    <table class="table">
        <thead>
            @foreach ($registro as $reg )
            <tr>
                <th>Titulo</th>
                <th>Resumen.</th>
                <th>Escala Dolor.</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $reg->titulo }}</td>
                <td>{{ $reg->comentario }}</td>
                <td>{{ $reg->escalaregistro }}</td>
                @if(isset($reg->titulo) or isset($reg->comentario)
                or isset($reg->escalaregistro))
                <td>{{ $reg->created_at }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>