<template>
  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <div class="dropdown">
            <input type="text" class="dropdown-toggle form-control" v-model="apellido" @input="search"
              data-bs-toggle="dropdown" aria-expanded="false" placeholder="Nombres, Apellidos..." />
            <ul class="dropdown-menu">
              <tr v-for="result in results" :key="result.id">
                <a class="dropdown-item" href="#" @click="buscarCliente(result.identificacion)">{{
                  result.nombres
                }} {{
  result.apellidos
}} </a>
              </tr>
            </ul>
          </div>

          <form @submit.prevent="buscarCliente(bcedula)" class="d-flex">&nbsp;

            <input class="form-control me-2" getfocus required name="bcedula" type="text" v-model="bcedula"
              placeholder="Cedula Buscar...">
            <button class="myButton3" type="submit">
              <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
            </button>&nbsp;
          </form>

          <button type="button" class="myButton3" data-bs-toggle="modal" data-bs-target="#crearhclinica"
            @click="modalnuevo()">+
            <font-awesome-icon icon="fa-solid fa-user" /> Nuevo
          </button>&nbsp;
        </ul>
        <div class="btn btn-success" role="alert" style="display: none;" id="toast">
          {{ jsonmensaje }}
        </div>
      </div>
    </div>
  </nav>




  <!--card perfil-->
  <div class="row">
    <div class="container">
      <div class="card" style="width:15%;float:left;display:none;" id="perfilcliente">
        <div class="card-body">
          <h6 align="center"><font-awesome-icon icon="fa-solid fa-user" size="1x" /><br>
            <strong>{{ clientes.nombres }}&nbsp;{{ clientes.apellidos }}</strong>
          </h6>
          <a :href="'/pdf/' + clientes.id" target="_blank">Descargar Historia Clinica</a>

          <div class="overflow-auto p-8 bg-light">
            <div class="list-group" role="group"><br>
              <button type="button" @click="buscarCliente(clientes.identificacion)"
                class="list-group-item list-group-item-action">
                <font-awesome-icon icon="fa-solid fa-folder" size="1x" /> Ingreso
              </button>
              <button type="button" @click="registrocliente(clientes.id)" class="list-group-item list-group-item-action">
                <font-awesome-icon icon="fa-solid fa-folder" size="1x" /> Otros Registros
              </button>

              <button type="button" @click="fisiocliente(clientes.id)" class="list-group-item list-group-item-action">
                <font-awesome-icon icon="fa-solid fa-folder" size="1x" /> Fisioterapia
              </button>

              <button type="button" @click="anexocliente(clientes.id)" class="list-group-item list-group-item-action">
                <font-awesome-icon icon="fa-solid fa-folder" size="1x" /> Anexos
              </button>

              <button type="button" @click="verpagos(clientes.id)" class="list-group-item list-group-item-action">
                <font-awesome-icon icon="fa-solid fa-folder" size="1x" /> Pagos
              </button>

            </div>
          </div>
        </div>

      </div>


      <!--datos ingreso fiosterapia-->
      <div class="row justify-content-left">
        <div class="col-lg-12">
          <div class="card mb-4" id="datosCliente" style="display:none;">
            <div class="card-body">
              <!-- Card historiaclinica ingreso-->
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal"
                  data-bs-target="#crearhclinica">
                  <font-awesome-icon icon="fa-solid fa-pen-to-square" size="sm" /> Editar
                </button>

              </div><br><br>
              <h5 align="center">Historia Clínica Ingreso</h5>
              <h7 align="left">Fecha de registro {{ moment(clientes.created_at).format("DD/MM/YYYY") }}</h7><br><br>

              <br>
              <table class="table">
                <tbody>
                  <tr>

                    <td><strong>Nombres:</strong><br> {{ clientes.nombres }}</td>

                    <td><strong>Apellidos:</strong><br> {{ clientes.apellidos }}</td>
                    <td><strong>Tipo ID:</strong><br> {{ clientes.tipodocumento }}</td>
                    <td><strong>#Identificación:</strong><br> {{ clientes.identificacion }}</td>
                    <td><strong>Genero:</strong><br> {{ clientes.genero }}</td>
                    <td><strong>Estado Civil:</strong><br> {{ clientes.estadocivil }}</td>
                    <td><strong>Fecha de Nacimiento:</strong><br>{{ moment(clientes.nacimiento).format("DD/MM/YYYY") }}
                    </td>
                  </tr>

                  <tr>

                    <td><strong>Edad:</strong><br> {{ clientes.edad }}</td>
                    <td><strong>Dirección:</strong><br> {{ clientes.direccion }}</td>
                    <td><strong>Ocupación:</strong><br> {{ clientes.ocupacion }}</td>
                    <td><strong>Teléfono:</strong><br> {{ clientes.telefono }}</td>
                    <td><strong>Otro Teléfono:</strong><br> {{ clientes.otrotelefono }}</td>
                    <td><strong>Correo:</strong><br> {{ clientes.correo }}</td>

                  </tr>
                </tbody>
              </table>

              <table class="table align-middle">
                <tbody>
                  <tr>

                    <td><strong>Altura en Cms:</strong><br> {{ clientes.altura }}</td>
                    <td><strong>Peso en Kgs:</strong><br> {{ clientes.peso }}</td>
                    <td>
                      <h6 align="center"><strong>Signos Vitales</strong><br></h6>
                    </td>
                    <td><strong>FC:</strong><br> {{ clientes.signofc }}</td>
                    <td><strong>FR:</strong><br> {{ clientes.signofr }}</td>
                    <td><strong>P/A Sistolica:</strong><br> {{ clientes.signopasistolica }}</td>
                    <td><strong>P/A Diastolica:</strong><br> {{ clientes.signopadiastolica }}</td>
                  </tr>
                </tbody>
              </table>
              <br>
              <h7 align="center"><strong>Antecedentes Personales</strong></h7>
              <table class="table">
                <tbody>
                  <tr>
                    <td><strong>Diabetes:</strong><br> {{ clientes.diabetes }}</td>
                    <td><strong>Alergia:</strong><br> {{ clientes.alergia }}</td>
                    <td><strong>HTA:</strong><br> {{ clientes.hta }}</td>
                    <td><strong>Cáncer:</strong><br> {{ clientes.cancer }}</td>
                    <td><strong>Transfusiones:</strong><br> {{ clientes.transfusiones }}</td>
                    <td><strong>Enf. Reumáticas:</strong><br> {{ clientes.enfreumaticas }}</td>
                    <td><strong>Encames:</strong><br> {{ clientes.encames }}</td>
                    <td><strong>Accidentes:</strong><br> {{ clientes.accidentes }}</td>
                    <td><strong>Cardiopatías:</strong><br> {{ clientes.cardiopatias }}</td>
                    <td><strong>Cirugías:</strong><br> {{ clientes.cirugias }}</td>
                    <td><strong>Otros:</strong><br> {{ clientes.anteceotros }}</td>



                  </tr><br>

                  <h7 align="center"><strong>Antecedentes Familiares</strong></h7>
                  <tr>
                    <td><strong>Diabetes:</strong><br> {{ clientes.fdiabetes }}</td>
                    <td><strong>Alergia:</strong><br> {{ clientes.falergia }}</td>
                    <td><strong>HTA:</strong><br> {{ clientes.hta }}</td>
                    <td><strong>Cáncer:</strong><br> {{ clientes.fcancer }}</td>
                    <td><strong>Transfusiones:</strong><br> {{ clientes.ftransfusiones }}</td>
                    <td><strong>Enf. Reumáticas:</strong><br> {{ clientes.fenfreumaticas }}</td>
                    <td><strong>Encames:</strong><br> {{ clientes.fencames }}</td>
                    <td><strong>Accidentes:</strong><br> {{ clientes.faccidentes }}</td>
                    <td><strong>Cardiopatías:</strong><br> {{ clientes.fcardiopatias }}</td>
                    <td><strong>Cirugías:</strong><br> {{ clientes.fcirugias }}</td>
                    <td><strong>Otros:</strong><br> {{ clientes.fanteceotros }}</td>
                  </tr>

                  <br>

                  <tr>
                    <td><strong>Antecedentes Farmacológicos:</strong><br>{{ clientes.antfarmacologicos }}</td>
                    <td><strong>Antecedentes Alergicos:</strong><br> {{ clientes.antalergicos }}</td>
                    <td><strong>Antecedentes Quirúrgicos:</strong><br> {{ clientes.antquirurgicos }}</td>
                    <td><strong>Tratamiento Médico actual:</strong><br> {{ clientes.tratamedicoactual }}</td>
                    <td><strong>Cicatríz Quirúrgica:</strong><br> {{ clientes.cicaquirurgica }}</td>
                    <td>
                      <h7 align="center"><strong>Marcha / Deambulación</strong></h7>
                    </td>
                    <td><strong>Libre:</strong><br> {{ clientes.marchalibre }}</td>
                    <td><strong>Claudicante:</strong><br> {{ clientes.marchaclaudicante }}</td>
                    <td><strong>Con Ayuda:</strong><br> {{ clientes.marchaayuda }}</td>
                    <td><strong>Espásticas:</strong><br> {{ clientes.marchaespasticas }}</td>
                    <td><strong>Atáxica:</strong><br> {{ clientes.marchaataxica }}</td>
                    <td><strong>Otros:</strong><br> {{ clientes.marchaotros }}</td>

                  </tr><br>



                  <td>
                    <h7 align="center"><strong>Estudios Paraclínicos</strong></h7>
                  </td>

                  <td><strong>Tipo de Estudio</strong> {{ clientes.estparaclinicos }}</td>



                </tbody>

              </table>
              <div align="center">
                <div class="container" style="width:80%;margin-left:160px;">
                  <div class="card" style="width:80%;">
                    <div class="card"><br>
                      <div class="card-tittle text-center"><br>
                        <strong>Escala del Dolor</strong>
                      </div>

                      <div class="card-body">

                        <div class="form-check form-check-inline" style="margin-left: 20px;">

                          <input class="form-check-input" name="escalaradio1" type="radio" v-model="clientes.escaladolor"
                            value="1" id="inlineradio1" disabled>
                          <label class="form-check-label" for="inlineradio1">1</label>
                        </div>&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio2" type="radio" v-model="clientes.escaladolor"
                            value="2" id="inlineradio2" disabled>
                          <label class="form-check-label" for="inlineradio2">2</label>
                        </div>&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio3" type="radio" v-model="clientes.escaladolor"
                            value="3" id="inlineradio3" disabled>
                          <label class="form-check-label" for="inlineradio3">3</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio4" type="radio" v-model="clientes.escaladolor"
                            value="4" id="inlineradio4" disabled>
                          <label class="form-check-label" for="inlineradio4">4</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio5" type="radio" v-model="clientes.escaladolor"
                            value="5" id="inlineradio5" disabled>
                          <label class="form-check-label" for="inlineradio5">5</label>
                        </div>&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio6" type="radio" v-model="clientes.escaladolor"
                            value="6" id="inlineradio6" disabled>
                          <label class="form-check-label" for="inlineradio6">6</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio7" type="radio" v-model="clientes.escaladolor"
                            value="7" id="inlineradio7" disabled>
                          <label class="form-check-label" for="inlineradio7">7</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio8" type="radio" v-model="clientes.escaladolor"
                            value="8" id="inlineradio8" disabled>
                          <label class="form-check-label" for="inlineradio8">8</label>
                        </div>&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio9" type="radio" v-model="clientes.escaladolor"
                            value="9" id="inlineradio9" disabled>
                          <label class="form-check-label" for="inlineradio9">9</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="escalaradio10" type="radio" v-model="clientes.escaladolor"
                            value="10" id="inlineradio10" disabled>
                          <label class="form-check-label" for="inlineradio10">10</label>
                        </div>
                        <img :src="'/img/escaladolor.png'" style="width:100%" />
                      </div>





                    </div>
                  </div>
                  <br><br><br>
                  <h5><strong>Se Evidencia</strong></h5>
                  <p>{{ clientes.seevidencia }}</p>


                  <h5><strong>Diagnostico del Médico</strong></h5>

                  <p> {{ clientes.diagmedico }}</p><br>


                </div>
              </div>
            </div>
          </div>
        </div>


        <!--card registrofisioterapia-->

        <div class="col-sm-12">
          <div class="card mb-4" id="registrosfisio" style="display:none;">
            <div class="card-body"><br>
              <h5 class="card-title text-center"><strong>Registros de Fisioterapia</strong></h5>
              <button class="myButton3" @click="modalnuevofisio()" data-bs-toggle="modal"
                data-bs-target="#modalfisioeditar">+ Nuevo
                registro</button>
              <br>
              <br>
              <table class="table">
                <thead>
                  <th scope="col">Registro</th>
                  <th scope="col">Identificación</th>
                  <th scope="col">Fecha de Registro</th>
                  <th scope="col">Ver</th>
                  <th scope="col">Eliminar</th>
                </thead>
                <tbody>
                  <tr v-for="reg in registros" :key="reg.id">

                    <td>{{ reg.cliente.nombres }} {{ reg.cliente.apellidos }}</td>
                    <td>{{ reg.cliente.identificacion }}</td>
                    <td>{{ moment(reg.created_at).format("DD/MM/YYYY hh:mm a") }}</td>
                    <td>
                      <a class="link" href="" @click="registrofisioterapia(reg.id)" data-bs-toggle="modal"
                        data-bs-target="#modalfisio"><font-awesome-icon icon="fa-solid fa-eye" />Ver</a>
                    </td>
                    <td>
                      <button class="btn btn-danger btn-sm" @click="fisioregistroEliminar(reg.id)">
                        <font-awesome-icon icon="fa-solid fa-trash" /></button>
                    </td><br><br>
                  </tr>


                </tbody>
              </table>

            </div>
          </div>
        </div>

        <!--card anexos-->
        <div class="col-sm-12">
          <div class="card mb-4" id="cardanexos" style="display:none;">
            <div class="card-body"><br>
              <h5 class="card-title text-center"><strong>Archivos y Documentos Anexos</strong></h5>
              <button class="myButton3" data-bs-toggle="modal" data-bs-target="#modalanexo">+
                Nuevo
                Archivo</button>
              <br>
              <br>
              <table class="table">
                <thead>

                  <th scope="col">Descripción</th>
                  <th scope="col">Archivo</th>
                  <th scope="col">Fecha de Registro</th>
                  <th scope="col">Descargar</th>
                  <th scope="col">Eliminar</th>

                </thead>
                <tbody>
                  <tr v-for="ane in anexos" :key="ane.id">
                    <td>{{ ane.descripcion }}</td>
                    <td>{{ ane.rutaarchivo }}</td>
                    <td>{{ moment(ane.created_at).format("DD/MM/YYYY hh:mm a") }}</td>
                    <td><a class="link" :href="'archivos/' + ane.rutaarchivo" target="about_blank">Descargar / Ver</a>
                    </td>

                    <td>
                      <button class="btn btn-danger btn-sm" @click="anexoEliminar(ane.id)">
                        <font-awesome-icon icon="fa-solid fa-trash" /></button>

                    </td>
                  </tr>

                </tbody>
              </table>

            </div>
          </div>
        </div>

        <!--card pagos-->
        <div class="col-sm-12">
          <div class="card mb-4" id="cardpagos" style="display:none;">
            <div class="card-body"><br>
              <h5 class="card-title text-center"><strong>Registro de Pagos</strong></h5>
              <button class="myButton3" data-bs-toggle="modal" data-bs-target="#modalpago">+
                Registrar
                Pago</button>
                <br>
              <br>
              <h7>Total: <string style="color:green;">${{  numberWithCommas(total) }}</string></h7>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Venta</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr v-for="ven in ventas" :key="ven.id">
                    <td>{{ ven.cliente.nombres }} {{ ven.cliente.apellidos }}</td>
                    <td>${{  numberWithCommas(ven.precio) }}</td>
                    <td>{{ ven.tipoventa }}</td>
                    <td>{{ moment(ven.created_at).format("DD/MM/YYYY hh:mm a") }}</td>
                  </tr><br>
                  <h5>Total: <string style="color:green;">${{  numberWithCommas(total) }}</string>
                  </h5>&nbsp;
                </tbody>
              </table>

            </div>
          </div>
        </div>

        <!--card otrosregistros-->

        <div class="col-sm-12">
          <div class="card mb-4" id="regiscliente" style="display:none;">
            <div class="card-body"><br>
              <h5 class="card-title text-center"><strong>Eventos Registrados</strong></h5>

              <div class="dropdown">
                <button class="myButton3 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Nuevo Registro
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalregiscliente"
                      href="#">Texto</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalregiescala">Escala
                      de Dolor</a></li>
                </ul>
              </div>

              <br>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Resumen</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Registro</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="reg in otrosregistros" :key="reg.id">
                    <td><strong>{{ reg.titulo }}</strong></td>
                    <td>{{ reg.comentario }}
                      <div v-if="reg.escalaregistro" class="container" style="width:100%;">

                        <div class="card-tittle text-center"><br>
                          <strong>Escala del Dolor</strong><br>
                          <h7>{{ reg.escalaregistro }}</h7>
                        </div>
                        <div class="card-body">
                          <img :src="'/img/escaladolor.png'" style="width:80%" />
                        </div>
                      </div>
                    </td>
                    <td>{{ moment(reg.created_at).format("DD/MM/YYYY hh:mm a") }}</td>
                    <td>
                      <button class="btn btn-danger btn-sm" @click="otroregistroEliminar(reg.id)">
                        <font-awesome-icon icon="fa-solid fa-trash" /></button>
                      <br>
                    </td>
                    <hr>
                  </tr>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Modal nuevo registrocliente-->
  <div class="modal fade" id="modalregiscliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Registro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <label for="descripcion" class="col-form-label">Titulo</label>
          <input type="text" v-model="otroregcliente.titulo" id="descripcion" class="form-control form-control-sm">
          <br>

          <label for="comentario" class="col-form-label">Comentario</label>
          <textarea name="comentario" v-model="otroregcliente.comentario" id="" rows="3"
            class="form-control form-control-sm"></textarea>
          <br>
          <input type="button" class="myButton" @click="crearregistro()" value="Guardar" data-bs-dismiss="modal">

        </div>
      </div>

    </div>
  </div>

  <!--Modal nuevo registroescala dolor-->
  <div class="modal fade" id="modalregiescala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Registro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <label for="comentario" class="col-form-label">Comentario</label>
          <input type="text" v-model="otroregcliente.comentario" id="descripcion" class="form-control form-control-sm">
          <br>

          <strong>Escala del Dolor</strong>
        </div>

        <div class="container">

          <div class="form-check form-check-inline" style="margin-left:18%;">

            <input class="form-check-input" name="escalaradio1" type="radio" v-model="otroregcliente.escalaregistro"
              value="1" id="inlineradio1">
            <label class="form-check-label" for="inlineradio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio2" type="radio" v-model="otroregcliente.escalaregistro"
              value="2" id="inlineradio2">
            <label class="form-check-label" for="inlineradio2">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio3" type="radio" v-model="otroregcliente.escalaregistro"
              value="3" id="inlineradio3">
            <label class="form-check-label" for="inlineradio3">3</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio4" type="radio" v-model="otroregcliente.escalaregistro"
              value="4" id="inlineradio4">
            <label class="form-check-label" for="inlineradio4">4</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio5" type="radio" v-model="otroregcliente.escalaregistro"
              value="5" id="inlineradio5">
            <label class="form-check-label" for="inlineradio5">5</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio6" type="radio" v-model="otroregcliente.escalaregistro"
              value="6" id="inlineradio6">
            <label class="form-check-label" for="inlineradio6">6</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio7" type="radio" v-model="otroregcliente.escalaregistro"
              value="7" id="inlineradio7">
            <label class="form-check-label" for="inlineradio7">7</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio8" type="radio" v-model="otroregcliente.escalaregistro"
              value="8" id="inlineradio8">
            <label class="form-check-label" for="inlineradio8">8</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio9" type="radio" v-model="otroregcliente.escalaregistro"
              value="9" id="inlineradio9">
            <label class="form-check-label" for="inlineradio9">9</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="escalaradio10" type="radio" v-model="otroregcliente.escalaregistro"
              value="10" id="inlineradio10">
            <label class="form-check-label" for="inlineradio10">10</label>
          </div>
          <img :src="'/img/escaladolor.png'" style="width:75%;margin-left:10%;" /><br>
          <input type="button" class="myButton" @click="crearregistro()" value="Guardar" data-bs-dismiss="modal">
        </div><br>

      </div>
    </div>

  </div>




  <!--Modal nuevo anexo-->
  <div class="modal fade" id="modalanexo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Subir Archivo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm" enctype="multipart/form-data">

            <label for="descripcion" class="col-form-label">Descripción</label>
            <input type="text" v-model="anexo.descripcion" @input="inputvacio" id="descripcion"
              placeholder="Descripción requerida" class="form-control form-control-sm">
            <br>
            <div class="custom-file">
              <input type="file" class="custom-file-input" v-on:change="onFileChange">
            </div>
            <br>

            <input type="submit" class="myButton" id="btnguardar" value="Guardar" data-bs-dismiss="modal">

          </form>

        </div>

      </div>
    </div>
  </div>

  <!--Modal ingreso editar-->
  <div class="modal fade" id="crearhclinica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <h5 align="center">Historia Clínica</h5>
          <br><br>

          <div class="row">
            <div class="col-sm-2">
              <!-- Name input -->
              <div class="form-outline">
                <label class="form-label" for="nombre">Nombres</label>
                <input type="text" v-model="clientes.nombres" class="form-control form-control-sm" id="nombre" />

              </div>
            </div>
            <div class="col-sm-2">
              <!-- Name input -->
              <div class="form-outline">
                <label class="form-label" for="nombre">Apellidos</label>
                <input type="text" v-model="clientes.apellidos" class="form-control form-control-sm" id="nombre" />

              </div>
            </div>

            <div class="col-sm-1">
              <label class="form-label" required for="tipo">Tipo ID</label>
              <select id="tipo" v-model="clientes.tipodocumento" class="form-control form-control-sm">

                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="RC">RC</option>
                <option value="CE">CE</option>
              </select>
            </div>



            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" required for="identificacion">#Identificación</label>
                <input type="text" v-model="clientes.identificacion" class="form-control form-control-sm"
                  id="identificacion" />
              </div>
            </div>
            <div class="col-sm-2">
              <label class="form-label" required for="genero">Genero</label>
              <select id="genero" v-model="clientes.genero" class="form-control form-control-sm">

                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="estadocivil">Estado Civil</label>
              <select id="estadocivil" v-model="clientes.estadocivil" class="form-control form-control-sm">

                <option value="Soltero(a)">Soltero(a)</option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Union Libre">Union Libre</option>
                <option value="Otro">Otro</option>

              </select>
            </div>

          </div>
          <br>

          <div class="row">


            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" required for="nacimiento">Fecha de Nacimiento</label>
                <input type="date" id="nacimiento" v-model="clientes.nacimiento" @change="getEdad(clientes.nacimiento)"
                  class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" required for="edad">Edad</label>
                <input type="text" id="edad" v-model="clientes.edad" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" for="direccion">Dirección</label>
                <input type="text" id="direccion" v-model="clientes.direccion" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" for="ocupacion">Ocupación</label>
                <input type="text" id="ocupacion" v-model="clientes.ocupacion" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" for="telefono">Teléfono</label>
                <input type="text" id="telefono" v-model="clientes.telefono" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" for="otrocontacto">Otro Teléfono</label>
                <input type="text" id="otrocontacto" v-model="clientes.otrotelefono"
                  class="form-control form-control-sm" />
              </div>
            </div>


          </div><br>
          <div class="row">

            <div class="col-sm-2">
              <div class="form-outline">
                <label class="form-label" for="otrocontacto">Correo</label>
                <input type="text" id="otrocontacto" v-model="clientes.correo" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" for="altura">Altura(Cms)</label>
                <input type="text" id="altura" v-model="clientes.altura" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" for="peso">Peso(Kgs)</label>
                <input type="text" id="peso" v-model="clientes.peso" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" for="signofc">SV FC</label>
                <input type="text" id="signofc" v-model="clientes.signofc" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" for="form8Example2">SV FR</label>
                <input type="text" id="form8Example2" v-model="clientes.signofr" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" for="form8Example2">P/A.Sistolica</label>
                <input type="text" id="form8Example2" v-model="clientes.signopasistolica"
                  class="form-control form-control-sm" />
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-outline">
                <label class="form-label" for="form8Example2"> Diastolica</label>
                <input type="text" id="form8Example2" v-model="clientes.signopadiastolica"
                  class="form-control form-control-sm" />
              </div>
            </div>
          </div><br>
          <hr><br>
          <h5 align="center">Antecedentes Personales</h5>
          <br>
          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="diabetes">Diabetes</label>
              <select id="diabetes" v-model="clientes.diabetes" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">SI</option>
              </select>
              <input type="text" v-model="clientes.diabetes" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Alergia</label>
              <select id="alergia" v-model="clientes.alergia" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">SI</option>
              </select>
              <input type="text" v-model="clientes.alergia" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="hta">HTA</label>
              <select id="hta" v-model="clientes.hta" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">SI</option>
              </select>
              <input type="text" v-model="clientes.hta" class="form-control form-control-sm" placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cáncer</label>
              <select v-model="clientes.cancer" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">SI</option>
              </select>
              <input type="text" v-model="clientes.cancer" class="form-control form-control-sm" placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Transfusiones</label>
              <select v-model="clientes.transfusiones" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.transfusiones" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="genero">Enf. Reumáticas</label>
              <select v-model="clientes.enfreumaticas" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.enfreumaticas" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Encames</label>
              <select v-model="clientes.encames" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.encames" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Accidentes</label>
              <select v-model="clientes.accidentes" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.accidentes" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cardiopatías</label>
              <select v-model="clientes.cardiopatias" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.cardiopatias" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cirugías</label>
              <select v-model="clientes.cirugias" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.cirugias" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Otros</label>
              <select v-model="clientes.anteceotros" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.anteceotros" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
          </div>
          <br><br>
          <h5 align="center">Antecedentes Familiares</h5>
          <br>
          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="genero">Diabetes</label>
              <select v-model="clientes.fdiabetes" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fdiabetes" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Alergia</label>
              <select v-model="clientes.falergia" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.falergia" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">HTA</label>
              <select v-model="clientes.fhta" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fhta" class="form-control form-control-sm" placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cáncer</label>
              <select v-model="clientes.fcancer" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fcancer" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Transfusiones</label>
              <select v-model="clientes.ftransfusiones" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.ftransfusiones" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="genero">Enf. Reumáticas</label>
              <select v-model="clientes.fenfreumaticas" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fenfreumaticas" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Encames</label>
              <select v-model="clientes.fencames" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fencames" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Accidentes</label>
              <select v-model="clientes.faccidentes" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.faccidentes" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cardiopatías</label>
              <select v-model="clientes.fcardiopatias" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fcardiopatias" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cirugías</label>
              <select v-model="clientes.fcirugias" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fcirugias" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Otros</label>
              <select v-model="clientes.fanteceotros" class="form-control form-control-sm">

                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.fanteceotros" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
          </div><br>

          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="genero">Antecedentes Farmacológicos</label>
              <select v-model="clientes.antfarmacologicos" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.antfarmacologicos" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Antecedentes Alergicos</label>
              <select v-model="clientes.antalergicos" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.antalergicos" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Antecedentes Quirúrgicos </label>
              <select v-model="clientes.antquirurgicos" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.antquirurgicos" class="form-control form-control-sm"
                placeholder="Especifique">
            </div><!-- mas campos -->
            <div class="col-sm-2">
              <label class="form-label" for="genero">Tratamiento Médico actual</label>
              <select v-model="clientes.tratamedicoactual" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option> 
              </select>
              <input type="text" v-model="clientes.tratamedicoactual" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="genero">Cicatríz Quirúrgica</label>
              <select v-model="clientes.cicaquirurgica" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Queloide">Queloide</option>
                <option value="Retractil">Retractil</option>
                <option value="Abierta">Abierta</option>
                <option value="Con Adherencia">Con Adherencia</option>
                <option value="Hipertrófica">Hipertrófica</option>

              </select>
            </div>
          </div>
          <br>
          <br>

          <div class="row">
            <h5>Marcha / Deambulación</h5>
          </div><br>

          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="genero">Libre</label>
              <select v-model="clientes.marchalibre" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.marchalibre" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>

            <div class="col-sm-2">
              <label class="form-label" for="genero">Claudicante</label>
              <select v-model="clientes.marchaclaudicante" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.marchaclaudicante" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>

            <div class="col-sm-2">
              <label class="form-label" for="genero">Con ayuda</label>
              <select v-model="clientes.marchaayuda" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.marchaayuda" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>

            <div class="col-sm-2">
              <label class="form-label" for="genero">Espásticas</label>
              <select v-model="clientes.marchaespasticas" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.marchaespasticas" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>

            <div class="col-sm-2">
              <label class="form-label" for="genero">Atáxica</label>
              <select v-model="clientes.marchaataxica" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.marchaataxica" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>

            <div class="col-sm-2">
              <label class="form-label" for="genero">Otros</label>
              <select v-model="clientes.marchaotros" class="form-control form-control-sm">
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
              <input type="text" v-model="clientes.marchaotros" class="form-control form-control-sm"
                placeholder="Especifique">
            </div>


          </div><br><br>


          <div class="row">
            <div class="container" style="width:80%;margin-left:160px;">
              <div class="card" style="width:80%;"><br>
                <div class="card-tittle text-center"><br>
                  <strong>Escala del Dolor</strong>
                </div>

                <div class="card-body">

                  <div class="form-check form-check-inline" style="margin-left: 70px;">

                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="1" id="inlineradio1">
                    <label class="form-check-label" for="inlineradio1">1</label>
                  </div>&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="2" id="inlineradio2">
                    <label class="form-check-label" for="inlineradio2">2</label>
                  </div>&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="3" id="inlineradio3">
                    <label class="form-check-label" for="inlineradio3">3</label>
                  </div>&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="4" id="inlineradio4">
                    <label class="form-check-label" for="inlineradio4">4</label>
                  </div>&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="5" id="inlineradio5">
                    <label class="form-check-label" for="inlineradio5">5</label>
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="6" id="inlineradio6">
                    <label class="form-check-label" for="inlineradio6">6</label>
                  </div>&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="7" id="inlineradio7">
                    <label class="form-check-label" for="inlineradio7">7</label>
                  </div>&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="8" id="inlineradio8">
                    <label class="form-check-label" for="inlineradio8">8</label>
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="9" id="inlineradio9">
                    <label class="form-check-label" for="inlineradio9">9</label>
                  </div>&nbsp;&nbsp;
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="escalaradio" type="radio" v-model="clientes.escaladolor"
                      value="10" id="inlineradio10">
                    <label class="form-check-label" for="inlineradio10">10</label>
                  </div>
                  <img :src="'/img/escaladolor.png'" style="width:100%" />

                </div>
              </div>
            </div>
          </div>
          <br>


          <div class="row">

            <h5 align="center">Estudios Paraclínicos</h5><br>

            <div class="col-sm-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="Otros" value="RX" v-model="clientes.estparaclinicos">
                <label class="form-check-label" for="Otros">
                  Rx
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="Otros" value="RMN" v-model="clientes.estparaclinicos">
                <label class="form-check-label" for="Otros">
                  RMN
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="Otros" value="TAC" v-model="clientes.estparaclinicos">
                <label class="form-check-label" for="Otros">
                  TAC
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="Otros" value="OTROS"
                  v-model="clientes.estparaclinicos">
                <label class="form-check-label" for="Otros">
                  Otros
                </label>
              </div>
            </div><br>
            <div class="col-sm-3">
              <label class="form-label" for="evidencia">Se Evidencia</label>
              <textarea name="evidencia" cols="60" rows="2" v-model="clientes.seevidencia"></textarea>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label class="form-label" for="daigmedico">Diagnostico del Médico</label>
                <textarea name="daigmedico" v-model="clientes.diagmedico" cols="60" rows="2"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="myButton2" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" class="myButton" id="btnactcliente" @click="actualizarCliente()"
            data-bs-dismiss="modal">GUARDAR</button>
          <button type="button" class="myButton" id="btncrecliente" @click="crearCliente()"
            data-bs-dismiss="modal">CREAR</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal realizarpago-->
  <div class="modal fade" id="modalpago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center">
            Registro de Pago
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>

            <br>
            <label for="tipo"><strong>Descripción</strong></label>&nbsp;
            <input type="text" v-model="activacion.tipoventa" name="tipo"><br><br>

            <label for="precio"><strong>Precio Venta</strong></label>&nbsp;
            <input type="number" v-model="activacion.precio" name="precio" pattern="[0-9]"><br>
          </center>
          <br>

          <h3>Precio: <strong style="color:green;">${{  numberWithCommas(activacion.precio) }}</strong></h3>
        </div>

        <div class="modal-footer">

          <button type="button" class="myButton2" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" class="myButton" id="btnactivar" @click="activarCliente()"
            data-bs-dismiss="modal">REGISTRAR</button>
        </div>
      </div>
    </div>
  </div>

  <!--modal fisio-->
  <div class="modal fade" id="modalfisio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5>Fecha de Registro {{ moment(clifisio.created_at).format("DD/MM/YYYY") }}</h5>
          <small>{{ clientes.nombres }} {{ clientes.apellidos }} </small><br>
          <h4 class="card-title text-center"><strong>Prueba de Arcos de Movilidad para Miembros Superiores</strong>
          </h4>
          <h6 class="card-text text-center"><strong>MOVIMIENTOS</strong></h6><br>
          <div class="row">
            <!--Hombros-->
            <div class="col-sm-4">
              <img :src="'/img/hombro1.png'" style="width:100%" />

            </div>
            <div class="col-sm-4">

              <table class="table" style="width:70%">
                <thead>
                  <tr>
                    <th scope="col">Hombro</th>
                    <th></th>
                    <th></th>
                    <th align="left">Hombro</th>
                  </tr>
                  <tr>
                    <th scope="col">Flexión</th>
                    <th scope="col">Extención</th>
                    <th scope="col">ABD</th>
                    <th scope="col">ADD</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>{{ clifisio.hombroflexion }}</td>
                    <td>{{ clifisio.hombroextencion }}</td>
                    <td>{{ clifisio.hombroabd }}</td>
                    <td>{{ clifisio.hombroadd }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-sm-4">
              <img :src="'/img/hombro2.png'" style="width:100%" />

            </div>
          </div><br>
          <hr>
          <br>
          <!--codos-->

          <div class="row">
            <div class="col-sm-4">
              <img :src="'/img/codo1.png'" style="width:100%" />

            </div>
            <div class="col-sm-4">
              <table class="table" style="width:70%">
                <thead>
                  <tr>
                    <th scope="col">ROTACIÓN</th>
                    <th></th>
                    <th></th>
                    <th align="left">CODO</th>
                  </tr>
                  <tr>
                    <th scope="col">Externa</th>
                    <th scope="col">Interna</th>
                    <th scope="col">Flexión</th>
                    <th scope="col">Ext.</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>{{ clifisio.rotaexterna }}</td>
                    <td>{{ clifisio.rotainterna }}</td>
                    <td>{{ clifisio.codoflexion }}</td>
                    <td>{{ clifisio.codoextencion }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-sm-4">
              <img :src="'/img/codo2.png'" style="width:100%" />

            </div>
          </div><br>
          <hr>
          <br>
          <!--antebrazos-->

          <div class="row">
            <div class="col-sm-4">
              <img :src="'/img/antebrazo1.png'" style="width:100%" />

            </div>
            <div class="col-sm-4">
              <table class="table" style="width:70%">
                <thead>
                  <tr>
                    <th scope="col">ANTEBRAZO</th>
                    <th></th>
                    <th></th>
                    <th align="left">DESVIACIÓN</th>
                  </tr>
                  <tr>
                    <th scope="col">Externa</th>
                    <th scope="col">Interna</th>
                    <th scope="col">Flexión</th>
                    <th scope="col">Ext</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>{{ clifisio.antbrazoexterna }}</td>
                    <td>{{ clifisio.antbrazointerna }}</td>
                    <td>{{ clifisio.desviacionflexion }}</td>
                    <td>{{ clifisio.desviacionexterna }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-sm-4">
              <img :src="'/img/antebrazo2.png'" style="width:100%" />

            </div>
          </div>
          <br>
          <hr>
          <br><br>
          <div class="row">
            <div class="col-sm-4">
              <img :src="'/img/palmar.png'" style="width:100%" />

            </div>
            <div class="col-sm-4">
              <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
                <col class="col0">
                <col class="col1">
                <col class="col2">
                <col class="col3">
                <col class="col4">
                <col class="col5">
                <col class="col6">
                <tbody>
                  <tr class="row0">
                    <td class="column0 style1 s"><strong>Refelxión</strong></td>
                    <td class="column1">&nbsp;</td>
                    <td class="column2 style1 s"><strong>Dedos</strong></td>
                    <td class="column3 style1 s"><strong>MCF</strong></td>
                    <td class="column4 style1 s"><strong>IFP</strong></td>
                    <td class="column5 style1 s"><strong>IFD</strong></td>
                    <td class="column6 style1 s"><strong>ABD</strong></td>
                  </tr>
                  <tr class="row1">
                    <td class="column0 style1 null">Palmar</td>
                    <td class="column1 style1 null">Dorsal</td>
                    <td class="column2 style1 s"><strong>índice</strong></td>
                    <td class="column3 style1 null">{{ clifisio.indicemcf }}
                    </td>
                    <td class="column4 style1 null">{{ clifisio.indiceifp }}
                    </td>
                    <td class="column5 style1 null">{{ clifisio.indiceifd }}
                    </td>
                    <td class="column6 style1 null">{{ clifisio.indiceabd }}
                    </td>
                  </tr>
                  <tr class="row2">
                    <td class="column0 style1 null">{{ clifisio.palmar }}</td>
                    <td class="column1 style1 null">{{ clifisio.dorsal }}</td>
                    <td class="column2 style1 s"><strong>Medio</strong></td>
                    <td class="column3 style1 null">{{ clifisio.mediomcf }}
                    </td>
                    <td class="column4 style1 null">{{ clifisio.medioifp }}
                    </td>
                    <td class="column5 style1 null">{{ clifisio.medioifd }}
                    </td>
                    <td class="column6 style1 null">{{ clifisio.medioabd }}
                    </td>
                  </tr>
                  <tr class="row3">
                    <td class="column0 style1 null"></td>
                    <td class="column1 style1 null"></td>
                    <td class="column2 style1 s"><strong>Anular</strong></td>
                    <td class="column3 style1 null">{{ clifisio.anularmcf }}
                    </td>
                    <td class="column4 style1 null">{{ clifisio.anularifp }}
                    </td>
                    <td class="column5 style1 null">{{ clifisio.anularifd }}
                    </td>
                    <td class="column6 style1 null">{{ clifisio.anularabd }}
                    </td>
                  </tr>
                  <tr class="row4">
                    <td class="column0 style1 null"></td>
                    <td class="column1 style1 null"></td>
                    <td class="column2 style1 s"><strong>Meñique</strong></td>
                    <td class="column3 style1 null">{{ clifisio.meniquemcf }}
                    </td>
                    <td class="column4 style1 null">{{ clifisio.meniqueifp }}
                    </td>
                    <td class="column5 style1 null">{{ clifisio.meniqueifd }}
                    </td>
                    <td class="column6 style1 null">{{ clifisio.meniqueabd }}
                    </td>
                  </tr>
                  <tr class="row5">
                    <td class="column0 style1 null"></td>
                    <td class="column1 style1 null"></td>
                    <td class="column2 style1 s"><strong>Pulgar</strong></td>
                    <td class="column3 style1 null">{{ clifisio.pulgarmcf }}
                    </td>
                    <td class="column4 style1 null">{{ clifisio.pulgarifp }}
                    </td>
                    <td class="column5 style1 null">{{ clifisio.pulgarifd }}
                    </td>
                    <td class="column6 style1 null">{{ clifisio.pulgarabd }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div><br>
        <hr>
        <br>

        <h5 class="card-title text-center"><strong>Prueba de Arcos de Movilidad para Miembros Inferiores</strong></h5>
        <h6 class="card-text text-center"><strong>MOVIMIENTOS</strong></h6><br>
        <!--caderas-->

        <div class="row">
          <div class="col-sm-4">
            <img :src="'/img/cadera1.png'" style="width:100%" />

          </div>
          <div class="col-sm-4">
            <table class="table" style="width:70%">
              <thead>
                <tr>
                  <th scope="col">Flexión cadera c/rod.Ext.</th>

                  <th align="left">Extención de Cadera</th>
                </tr>

              </thead>
              <tbody>
                <tr>

                  <td>{{ clifisio.flxcadera }}</td>
                  <td>{{ clifisio.extcadera }}</td>

                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4">
            <img :src="'/img/cadera2.png'" style="width:100%" />

          </div>
        </div>
        <br>
        <hr>
        <br>
        <!--cadera/rodilla-->

        <div class="row">
          <div class="col-sm-4">
            <img :src="'/img/cadera3.png'" style="width:100%" />

          </div>
          <div class="col-sm-4">
            <table class="table" style="width:70%">
              <thead>
                <tr>
                  <th scope="col">Rodilla Flex.</th>

                  <th align="left">Rodilla Ext.</th>
                </tr>

              </thead>
              <tbody>
                <tr>

                  <td>{{ clifisio.rodillaflex }}</td>
                  <td>{{ clifisio.rodillaext }}</td>

                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4">
            <img :src="'/img/cadera4.png'" style="width:100%" />

          </div>
        </div>
        <br>
        <hr>
        <br>
        <!--cadera/tobillo-->

        <div class="row">
          <div class="col-sm-4">
            <img :src="'/img/cadera5.png'" style="width:100%" />

          </div>
          <div class="col-sm-4">
            <table class="table" style="width:70%">
              <thead>
                <tr>
                  <th scope="col">Cadera</th>
                  <th></th>
                  <th></th>
                  <th align="left">Flexión</th>
                </tr>
                <tr>
                  <th scope="col">ABD</th>
                  <th scope="col">ADD</th>
                  <th scope="col">PLANT.</th>
                  <th scope="col">DORS.</th>

                </tr>
              </thead>
              <tbody>
                <tr>

                  <td>{{ clifisio.caderaabd }}</td>
                  <td>{{ clifisio.caderaadd }}</td>
                  <td>{{ clifisio.flexplant }}</td>
                  <td>{{ clifisio.flexdors }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4">
            <img :src="'/img/tobillo1.png'" style="width:100%" />

          </div>
        </div>
        <br>
        <hr>
        <br>
        <!--codo/pie-->

        <div class="row">
          <div class="col-sm-4">
            <img :src="'/img/tobillo2.png'" style="width:100%" />

          </div>
          <div class="col-sm-4">
            <table class="table" style="width:70%">
              <thead>
                <tr>
                  <th scope="col">Rotación</th>
                  <th></th>
                  <th></th>
                  <th align="left">Tobillo</th>
                </tr>
                <tr>
                  <th scope="col">Ext.</th>
                  <th scope="col">Int.</th>
                  <th scope="col">Inv.</th>
                  <th scope="col">Eve.</th>

                </tr>
              </thead>
              <tbody>
                <tr>

                  <td>{{ clifisio.rotatobiext }}</td>
                  <td>{{ clifisio.rotatobiint }}</td>
                  <td>{{ clifisio.tobilloinv }}</td>
                  <td>{{ clifisio.tobilloeve }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4">
            <img :src="'/img/tobillo3.png'" style="width:100%" />

          </div>

        </div>
      </div>
    </div>
  </div>

  <!--modal fisioeditar-->
  <div class="modal fade" id="modalfisioeditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="card" style="width:100%;"><br>
              <div class="card-tittle text-center"><br>
                <strong>HISTORIA CLINÍCA FISIOTERAPIA</strong>
              </div>

              <div class="card-body">
                <form ref="frmhclinica">
                  <h6 class="card-title text-center"><strong>Prueba de Arcos de Movilidad para Miembros
                      Superiores</strong></h6>
                  <h6 class="card-text text-center"><strong>MOVIMIENTOS</strong></h6><br>
                  <div class="row">
                    <!--Hombros-->
                    <div class="col-sm-4">
                      <img :src="'/img/hombro1.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">

                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">Hombro</th>
                            <th></th>
                            <th></th>
                            <th align="left">Hombro</th>
                          </tr>
                          <tr>
                            <th scope="col">Flexión</th>
                            <th scope="col">Extención</th>
                            <th scope="col">ABD</th>
                            <th scope="col">ADD</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.hombroflexion"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.hombroextencion"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.hombroabd"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.hombroadd"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/hombro2.png'" style="width:100%" />

                    </div>
                  </div><br>
                  <hr>
                  <br>
                  <!--codos-->

                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/codo1.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">ROTACIÓN</th>
                            <th></th>
                            <th></th>
                            <th align="left">CODO</th>
                          </tr>
                          <tr>
                            <th scope="col">Externa</th>
                            <th scope="col">Interna</th>
                            <th scope="col">Flexión</th>
                            <th scope="col">Ext.</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.rotaexterna"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.rotainterna"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.codoflexion"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.codoextencion"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/codo2.png'" style="width:100%" />

                    </div>
                  </div><br>
                  <hr>
                  <br>
                  <!--antebrazos-->

                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/antebrazo1.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">ANTEBRAZO</th>
                            <th></th>
                            <th></th>
                            <th align="left">DESVIACIÓN</th>
                          </tr>
                          <tr>
                            <th scope="col">Externa</th>
                            <th scope="col">Interna</th>
                            <th scope="col">Flexión</th>
                            <th scope="col">Ext</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.antbrazoexterna"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.antbrazointerna"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.desviacionflexion"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.desviacionexterna"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/antebrazo2.png'" style="width:100%" />

                    </div>
                  </div>
                  <br>
                  <hr>
                  <br><br>
                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/palmar.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
                        <col class="col0">
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                        <col class="col5">
                        <col class="col6">
                        <tbody>
                          <tr class="row0">
                            <td class="column0 style1 s">Refelxión</td>
                            <td class="column1">&nbsp;</td>
                            <td class="column2 style1 s">Dedos</td>
                            <td class="column3 style1 s">MCF</td>
                            <td class="column4 style1 s">IFP</td>
                            <td class="column5 style1 s">IFD</td>
                            <td class="column6 style1 s">ABD</td>
                          </tr>
                          <tr class="row1">
                            <td class="column0 style1 null">Palmar</td>
                            <td class="column1 style1 null">Dorsal</td>
                            <td class="column2 style1 s">índice</td>
                            <td class="column3 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.indicemcf">
                            </td>
                            <td class="column4 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.indiceifp">
                            </td>
                            <td class="column5 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.indiceifd">
                            </td>
                            <td class="column6 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.indiceabd">
                            </td>
                          </tr>
                          <tr class="row2">
                            <td class="column0 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.palmar"></td>
                            <td class="column1 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.dorsal"></td>
                            <td class="column2 style1 s">Medio</td>
                            <td class="column3 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.mediomcf">
                            </td>
                            <td class="column4 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.medioifp">
                            </td>
                            <td class="column5 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.medioifd">
                            </td>
                            <td class="column6 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.medioabd">
                            </td>
                          </tr>
                          <tr class="row3">
                            <td class="column0 style1 null"></td>
                            <td class="column1 style1 null"></td>
                            <td class="column2 style1 s">Anular</td>
                            <td class="column3 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.anularmcf">
                            </td>
                            <td class="column4 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.anularifp">
                            </td>
                            <td class="column5 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.anularifd">
                            </td>
                            <td class="column6 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.anularabd">
                            </td>
                          </tr>
                          <tr class="row4">
                            <td class="column0 style1 null"></td>
                            <td class="column1 style1 null"></td>
                            <td class="column2 style1 s">Meñique</td>
                            <td class="column3 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.meniquemcf">
                            </td>
                            <td class="column4 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.meniqueifp">
                            </td>
                            <td class="column5 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.meniqueifd">
                            </td>
                            <td class="column6 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.meniqueabd">
                            </td>
                          </tr>
                          <tr class="row5">
                            <td class="column0 style1 null"></td>
                            <td class="column1 style1 null"></td>
                            <td class="column2 style1 s">Pulgar</td>
                            <td class="column3 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.pulgarmcf">
                            </td>
                            <td class="column4 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.pulgarifp">
                            </td>
                            <td class="column5 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.pulgarifd">
                            </td>
                            <td class="column6 style1 null"><input type="text" class="inputfisio"
                                v-model="clifisio.pulgarabd">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div><br>
                  <hr>
                  <br>
                  <h5 class="card-title text-center"><strong>Prueba de Arcos de Movilidad para Miembros
                      Inferiores</strong></h5>
                  <h6 class="card-text text-center"><strong>MOVIMIENTOS</strong></h6><br>
                  <!--caderas-->

                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/cadera1.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">Flexión cadera c/rod.Ext.</th>

                            <th align="left">Extención de Cadera</th>
                          </tr>

                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.flxcadera"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.extcadera"></td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/cadera2.png'" style="width:100%" />

                    </div>
                  </div>
                  <br>
                  <hr>
                  <br>
                  <!--cadera/rodilla-->

                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/cadera3.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">Rodilla Flex.</th>

                            <th align="left">Rodilla Ext.</th>
                          </tr>

                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.rodillaflex"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.rodillaext"></td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/cadera4.png'" style="width:100%" />

                    </div>
                  </div>
                  <br>
                  <hr>
                  <br>
                  <!--cadera/tobillo-->

                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/cadera5.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">Cadera</th>
                            <th></th>
                            <th></th>
                            <th align="left">Flexión</th>
                          </tr>
                          <tr>
                            <th scope="col">ABD</th>
                            <th scope="col">ADD</th>
                            <th scope="col">PLANT.</th>
                            <th scope="col">DORS.</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.caderaabd"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.caderaadd"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.flexplant"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.flexdors"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/tobillo1.png'" style="width:100%" />

                    </div>
                  </div>
                  <br>
                  <hr>
                  <br>
                  <!--codo/pie-->

                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="'/img/tobillo2.png'" style="width:100%" />

                    </div>
                    <div class="col-sm-4">
                      <table class="table" style="width:70%">
                        <thead>
                          <tr>
                            <th scope="col">Rotación</th>
                            <th></th>
                            <th></th>
                            <th align="left">Tobillo</th>
                          </tr>
                          <tr>
                            <th scope="col">Ext.</th>
                            <th scope="col">Int.</th>
                            <th scope="col">Inv.</th>
                            <th scope="col">Eve.</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td><input type="text" class="inputfisio" v-model="clifisio.rotatobiext"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.rotatobiint"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.tobilloinv"></td>
                            <td><input type="text" class="inputfisio" v-model="clifisio.tobilloeve"></td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                    <div class="col-sm-4">
                      <img :src="'/img/tobillo3.png'" style="width:100%" />

                    </div>
                  </div>
                  <br>
                  <hr>
                  <br><br>
                  <button type="button" class="myButton" @click="guardarfisioregistro()"
                    data-bs-dismiss="modal">Guardar</button>
                </form>
              </div>
            </div>
          </div><br>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import Cardingreso from '../components/Cardingreso.vue';
import moment from "moment";
export default {
  components: {
    Cardingreso
  },

  created() {
    this.search();
  },
  data() {
    return {
      moment: moment,
      minLength: 3,
      bcedula: '',
      clientes: {
        id: '', nombres: '', apellidos: '',
        tipodocumento: '', identificacion: '', genero: '', estadocivil: '',
        nacimiento: '', edad: '', direccion: '', telefono: '', ocupacion: '', otrotelefono: '', correo: '', observacion: '', estadoactivo: '', created_at: '',
        altura: '', peso: '', signofc: '', signofr: '', signopasistolica: '', signopadiastolica: '', diabetes: '', alergia: '', hta: '', cancer: '', transfusiones: '',
        enfreumaticas: '', encames: '', accidentes: '', cardiopatias: '', cirugias: '', anteceotros: '', fdiabetes: '', falergia: '',
        fhta: '', fcancer: '', ftransfusiones: '', fenfreumaticas: '', fencames: '', faccidentes: '', fcardiopatias: '',
        espasmoscm: '', marchalibre: '', marchaclaudicante: '', marchaayuda: '', marchaespasticas: '',
        marchaataxica: '', marchaotros: '', escaladolor: '',
        fcirugias: '', fanteceotros: '', antfarmacologicos: '', antalergicos: '', antquirurgicos: '', tratamedicoactual: '', cicaquirurgica: '', estparaclinicos: '',
        diagmedico: '', seevidencia: '', created_at: ''
      },
      clifisio: {
        cliente_id: '', hombroflexion: '', hombroextencion: '', hombroabd: '', hombroadd: '',
        rotaexterna: '', rotainterna: '', codoflexion: '', codoextencion: '', antbrazoexterna: '', antbrazointerna: '',
        desviacionflexion: '', desviacionexterna: '',

        palmar: '', dorsal: '', indicemcf: '', indiceifp: '', indiceifd: '', indiceabd: '', mediomcf: '', medioifp: '',
        medioifd: '', medioabd: '', anularmcf: '', anularifp: '', anularifd: '', anularabd: '', meniquemcf: '',
        meniqueifp: '', meniqueifd: '', meniqueabd: '', pulgarmcf: '', pulgarifp: '', pulgarifd: '', pulgarabd: '',

        flxcadera: '', extcadera: '', rodillaflex: '', rodillaext: '',
        caderaabd: '', caderaadd: '', flexplant: '', flexdors: '', rotatobiext: '', rotatobiint: '', tobilloinv: '', tobilloeve: '', created_at: ''
      },

      registro: false,

      activacion: { cliente_id: '', precio: '', tipoventa: '' },

      anexo: {
        cliente_id: '', descripcion: '', rutaarchivo: '', created_at: ''
      },

      otroregcliente: {
        cliente_id: '', titulo: '', comentario: '', escalaregistro: '', created_at: ''
      },

      results: [],
      otrosregistros: [],
      registros: [],
      anexos: [],
      ventas: [],
      filename: '',
      file: '',
      success: '',
      jsonmensaje: ''
    }
  },

  computed: {
    total() {
      return this.ventas.reduce((total, ven) => total + ven.precio, 0);
    }
  },

  created() {

  },

  methods: {
    numberWithCommas(x) {
      return x.toLocaleString();
    },

    getEdad(dateString) {

      let hoy = new Date()
      let fechaNacimiento = new Date(dateString)
      let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
      let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
      if (
        diferenciaMeses < 0 ||
        (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
      ) {
        edad--
      }

      this.clientes.edad = edad;
      return edad


    },


    onFileChange(e) {
      this.anexo.rutaarchivo = e.target.files[0].name;
      this.filename = "Selected File: " + e.target.files[0].name;
      this.file = e.target.files[0];
    },

  async  submitForm() {

      let form = new FormData();
      form.append('file', this.file)
      axios.post('/api/anexos', form)
      axios.post('/api/anexos', this.anexo).catch(function (error) {
        if (error.response) {
          alert('Algo salió mal ya existe un archivo con el mismo nombre, cambie el nombre para continuar');
        }
      });
      await new Promise(resolve => setTimeout(resolve, 2000));
      this.anexocliente(this.clientes.id);
      this.anexo.descripcion = null;
      this.anexo.rutaarchivo = null;
      this.filename = null;
      this.file = null;
     
    },

  async  crearregistro() {
      axios.post('/api/otroregistro', this.otroregcliente).catch(function (error) {
        if (error.response) {
          alert('Debe poner una titulo y un comentario o resumen');
        }
      });
      await new Promise(resolve => setTimeout(resolve, 2000));
      this.registrocliente(this.clientes.id);
      this.otroregcliente.titulo = '';
      this.otroregcliente.comentario = '';
      this.otroregcliente.escalaregistro = '';
      


    },

    modalnuevo() {

      btnactcliente.hidden = true;
      btncrecliente.hidden = false;
      datosCliente.style.display = 'none';
      perfilcliente.style.display = 'none';
      this.clientes.nombres = '';
      this.clientes.apellidos = '';
      this.clientes.estadoactivo = '';
      this.clientes.tipodocumento = 'CC';
      this.clientes.identificacion = '';
      this.clientes.genero = '';
      this.clientes.estadocivil = '';
      this.clientes.nacimiento = '';
      this.clientes.edad = '';
      this.clientes.direccion = '';
      this.clientes.telefono = '';
      this.clientes.otrotelefono = '';
      this.clientes.correo = '';
      this.clientes.ocupacion = '';
      this.clientes.altura = '';
      this.clientes.peso = '';
      this.clientes.signofc = '';
      this.clientes.signofr = '';
      this.clientes.signopasistolica = '';
      this.clientes.signopadiastolica = '';
      this.clientes.diabetes = '';
      this.clientes.alergia = '';
      this.clientes.hta = '';
      this.clientes.cancer = '';
      this.clientes.transfusiones = '';
      this.clientes.enfreumaticas = '';
      this.clientes.encames = '';
      this.clientes.accidentes = '';
      this.clientes.cardiopatias = '';
      this.clientes.cirugias = '';
      this.clientes.fdiabetes = '';
      this.clientes.falergia = '';
      this.clientes.fhta = '';
      this.clientes.fcancer = '';
      this.clientes.ftransfusiones = '';
      this.clientes.fenfreumaticas = '';
      this.clientes.fencames = '';
      this.clientes.faccidentes = '';
      this.clientes.fcardiopatias = '';
      this.clientes.fcirugias = '';
      this.clientes.anteceotros = '';
      this.clientes.fanteceotros = '';
      this.clientes.antfarmacologicos = '';
      this.clientes.antalergicos = '';
      this.clientes.antquirurgicos = '';
      this.clientes.tratamedicoactual = '';
      this.clientes.diagmedico = '';
      this.clientes.tratamedicoactual = '';
      this.clientes.cicaquirurgica = '';
      this.clientes.marchalibre = '';
      this.clientes.marchaclaudicante = '';
      this.clientes.marchaayuda = '';
      this.clientes.marchaespasticas = '';
      this.clientes.marchaataxica = '';
      this.clientes.marchaotros = '';
      this.clientes.escaladolor = '';
      this.clientes.estparaclinicos = '';
      this.clientes.seevidencia = '';




    },
    modalnuevofisio() {
      this.clifisio.hombroflexion = '';
      this.clifisio.hombroextencion = '';
      this.clifisio.hombroabd = '';
      this.clifisio.hombroadd = '';
      this.clifisio.rotaexterna = '';
      this.clifisio.rotainterna = '';
      this.clifisio.codoflexion = '';
      this.clifisio.codoextencion = '';
      this.clifisio.antbrazoexterna = '';
      this.clifisio.antbrazointerna = '';
      this.clifisio.desviacionflexion = '';
      this.clifisio.desviacionexterna = '';
      this.clifisio.palmar = '';
      this.clifisio.dorsal = '';
      this.clifisio.indicemcf = '';
      this.clifisio.indiceifp = '';
      this.clifisio.indiceifd = '';
      this.clifisio.indiceabd = '';
      this.clifisio.mediomcf = '';
      this.clifisio.medioifp = '';
      this.clifisio.medioifd = '';
      this.clifisio.medioabd = '';
      this.clifisio.anularmcf = '';
      this.clifisio.anularifp = '';
      this.clifisio.anularifd = '';
      this.clifisio.anularabd = '';
      this.clifisio.meniquemcf = '';
      this.clifisio.meniqueifp = '';
      this.clifisio.meniqueifd = '';
      this.clifisio.meniqueabd = '';
      this.clifisio.pulgarmcf = '';
      this.clifisio.pulgarifp = '';
      this.clifisio.pulgarifd = '';
      this.clifisio.pulgarabd = '';
      this.clifisio.flxcadera = '';
      this.clifisio.extcadera = '';
      this.clifisio.rodillaflex = '';
      this.clifisio.rodillaext = '';
      this.clifisio.caderaabd = '';
      this.clifisio.caderaadd = '';
      this.clifisio.flexplant = '';
      this.clifisio.flexdors = '';
      this.clifisio.rotatobiext = '';
      this.clifisio.rotatobiint = '';
      this.clifisio.tobilloinv = '';
      this.clifisio.tobilloeve = '';
    },

    

    async crearCliente() {
      axios.post('api/clientes', this.clientes)
        .then(function (response) {         
      alert('Cliente Creado con Éxito');    
        })
        .catch(function (error) {
          alert('los campos "Nombres, Apellidos y Cedula son Obligatorios"  o la identificación o el email ya están registrados' );
        });
    },

    async search() {

      if (this.apellido.length >= 3) {
        const res = await axios.get('api/sclientes/' + this.apellido);
        this.results = res.data;
      }
    },

    async buscarCliente(bcedula) {
      perfilcliente.style.display = 'block';
      datosCliente.style.display = 'block';
      registrosfisio.style.display = 'none';
      cardanexos.style.display = 'none';
      regiscliente.style.display = 'none';
      cardpagos.style.display = 'none';
      btnactcliente.hidden = false;
      btncrecliente.hidden = true;

      const res = await axios.get('api/clientes/' + bcedula);
      this.anexo.cliente_id = res.data.id;
      this.otroregcliente.cliente_id = res.data.id;
      this.clifisio.cliente_id = res.data.id;
      this.activacion.cliente_id = res.data.id;
      this.clientes.id = res.data.id;
      this.clientes.nombres = res.data.nombres;
      this.clientes.apellidos = res.data.apellidos;

      this.clientes.estadoactivo = res.data.estadoactivo;
      this.clientes.tipodocumento = res.data.tipodocumento;
      this.clientes.identificacion = res.data.identificacion;
      this.clientes.genero = res.data.genero;
      this.clientes.estadocivil = res.data.estadocivil;
      this.clientes.nacimiento = res.data.nacimiento;
      this.clientes.direccion = res.data.direccion;
      this.clientes.telefono = res.data.telefono;
      this.clientes.otrotelefono = res.data.otrotelefono;
      this.clientes.correo = res.data.correo;
      this.clientes.ocupacion = res.data.ocupacion;
      this.clientes.altura = res.data.altura;
      this.clientes.peso = res.data.peso;
      this.clientes.signofc = res.data.signofc;
      this.clientes.signofr = res.data.signofr;
      this.clientes.signopasistolica = res.data.signopasistolica;
      this.clientes.signopadiastolica = res.data.signopadiastolica;
      this.clientes.diabetes = res.data.diabetes;
      this.clientes.alergia = res.data.alergia;
      this.clientes.hta = res.data.hta;
      this.clientes.cancer = res.data.cancer;
      this.clientes.transfusiones = res.data.transfusiones;
      this.clientes.enfreumaticas = res.data.enfreumaticas;
      this.clientes.encames = res.data.encames;
      this.clientes.accidentes = res.data.accidentes;
      this.clientes.cardiopatias = res.data.cardiopatias;
      this.clientes.cirugias = res.data.cirugias;
      this.clientes.anteceotros = res.data.anteceotros;
      this.clientes.fdiabetes = res.data.fdiabetes;
      this.clientes.falergia = res.data.falergia;
      this.clientes.fhta = res.data.fhta;
      this.clientes.fcancer = res.data.fcancer;
      this.clientes.ftransfusiones = res.data.ftransfusiones;
      this.clientes.fenfreumaticas = res.data.fenfreumaticas;
      this.clientes.fencames = res.data.fencames;
      this.clientes.faccidentes = res.data.faccidentes;
      this.clientes.fcardiopatias = res.data.fcardiopatias;
      this.clientes.fanteceotros = res.data.fanteceotros;
      this.clientes.fcirugias = res.data.fcirugias;
      this.clientes.antfarmacologicos = res.data.antfarmacologicos;
      this.clientes.antalergicos = res.data.antalergicos;
      this.clientes.antquirurgicos = res.data.antquirurgicos;
      this.clientes.tratamedicoactual = res.data.tratamedicoactual;
      this.clientes.diagmedico = res.data.diagmedico;
      this.clientes.tratamedicoactual = res.data.tratamedicoactual;
      this.clientes.cicaquirurgica = res.data.cicaquirurgica;
      this.clientes.marchalibre = res.data.marchalibre;
      this.clientes.marchaclaudicante = res.data.marchaclaudicante;
      this.clientes.marchaayuda = res.data.marchaayuda;
      this.clientes.marchaespasticas = res.data.marchaespasticas;
      this.clientes.marchaataxica = res.data.marchaataxica;
      this.clientes.marchaotros = res.data.marchaotros;
      this.clientes.escaladolor = res.data.escaladolor;
      this.clientes.estparaclinicos = res.data.estparaclinicos;
      this.clientes.seevidencia = res.data.seevidencia;
      this.clientes.created_at = res.data.created_at;

      this.bcedula = '';
      this.apellido = '';

      let hoy = new Date()
      let fechaNacimiento = new Date(res.data.nacimiento)
      let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
      let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
      if (
        diferenciaMeses < 0 ||
        (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
      ) {
        edad--

      }
      this.clientes.edad = edad;
      axios.put('api/clientes/' + this.clientes.id, this.clientes);
      return edad

    },

    async registrocliente(id) {

      const res = await axios.get('api/otroregistro/' + id);
      this.otrosregistros = res.data;

      datosCliente.style.display = 'none';
      regiscliente.style.display = 'block';
      cardanexos.style.display = 'none';
      registrosfisio.style.display = 'none';
      cardpagos.style.display = 'none';

    },

    async fisiocliente(id) {

      const res = await axios.get('api/fisioterapia/' + id);
      this.registros = res.data;
      datosCliente.style.display = 'none';
      regiscliente.style.display = 'none';
      cardanexos.style.display = 'none';
      cardpagos.style.display = 'none';
      registrosfisio.style.display = 'block';



    },

    async anexocliente(id) {

      const res = await axios.get('api/anexos/' + id);
      this.anexos = res.data;
      datosCliente.style.display = 'none';
      regiscliente.style.display = 'none';
      registrosfisio.style.display = 'none';
      cardpagos.style.display = 'none';
      cardanexos.style.display = 'block';

    },


    async registrofisioterapia(id) {
      const res = await axios.get('api/fisioregistro/' + id);
      this.clifisio.created_at = res.data.created_at;
      this.clifisio.cliente_id = res.data.cliente_id;
      this.clifisio.hombroflexion = res.data.hombroflexion;
      this.clifisio.hombroextencion = res.data.hombroextencion;
      this.clifisio.hombroabd = res.data.hombroabd;
      this.clifisio.hombroadd = res.data.hombroadd;
      this.clifisio.rotaexterna = res.data.rotaexterna;
      this.clifisio.rotainterna = res.data.rotainterna;
      this.clifisio.codoflexion = res.data.codoflexion;
      this.clifisio.codoextencion = res.data.codoextencion;
      this.clifisio.antbrazoexterna = res.data.antbrazoexterna;
      this.clifisio.antbrazointerna = res.data.antbrazointerna;
      this.clifisio.desviacionflexion = res.data.desviacionflexion;
      this.clifisio.desviacionexterna = res.data.desviacionexterna;
      this.clifisio.palmar = res.data.palmar;
      this.clifisio.dorsal = res.data.dorsal;
      this.clifisio.indicemcf = res.data.indicemcf;
      this.clifisio.indiceifp = res.data.indiceifp;
      this.clifisio.indiceifd = res.data.indiceifd;
      this.clifisio.indiceabd = res.data.indiceabd;
      this.clifisio.mediomcf = res.data.mediomcf;
      this.clifisio.medioifp = res.data.medioifp;
      this.clifisio.medioifd = res.data.medioifd;
      this.clifisio.medioabd = res.data.medioabd;
      this.clifisio.anularmcf = res.data.anularmcf;
      this.clifisio.anularifp = res.data.anularifp;
      this.clifisio.anularifd = res.data.anularifd;
      this.clifisio.anularabd = res.data.anularabd;
      this.clifisio.meniquemcf = res.data.meniquemcf;
      this.clifisio.meniqueifp = res.data.meniqueifp;
      this.clifisio.meniqueifd = res.data.meniqueifd;
      this.clifisio.meniqueabd = res.data.meniqueabd;
      this.clifisio.pulgarmcf = res.data.pulgarmcf;
      this.clifisio.pulgarifp = res.data.pulgarifp;
      this.clifisio.pulgarifd = res.data.pulgarifd;
      this.clifisio.pulgarabd = res.data.pulgarabd;
      this.clifisio.flxcadera = res.data.flxcadera;
      this.clifisio.extcadera = res.data.extcadera;
      this.clifisio.rodillaflex = res.data.rodillaflex;
      this.clifisio.rodillaext = res.data.rodillaext;
      this.clifisio.caderaabd = res.data.caderaabd;
      this.clifisio.caderaadd = res.data.caderaadd;
      this.clifisio.flexplant = res.data.flexplant;
      this.clifisio.flexdors = res.data.flexdors;
      this.clifisio.rotatobiext = res.data.rotatobiext;
      this.clifisio.rotatobiint = res.data.rotatobiint;
      this.clifisio.tobilloinv = res.data.tobilloinv;
      this.clifisio.tobilloeve = res.data.tobilloeve;
      this.fisiocliente(this.clientes.id);
    },

    async otroregistroEliminar(id) {
      let confirmac = confirm('Eliminar este registro?');
      if (confirmac) {

        const res = await axios.delete('api/otroregistro/' + id);
        this.jsonmensaje = res.data;
        toast.style.display = 'block';
        setTimeout(() => {
          this.jsonmensaje = '';
          toast.style.display = 'none';
        }, 3000);
        this.registrocliente(this.clientes.id);
      } 

    },

    async fisioregistroEliminar(id) {
      let confirmac = confirm('Eliminar este registro?');
      if (confirmac) {
        const res = await axios.delete('api/fisioterapia/' + id);
        this.fisiocliente(this.clientes.id);
      }

    },



    async anexoEliminar(id) {

      let confirmac = confirm('Eliminar este registro?');
      if (confirmac) {
        axios.delete('api/anexos/' + id);
        
      }
      this.anexocliente(this.clientes.id);
    },

  async  guardarfisioregistro() {
      axios.post('api/fisioterapia', this.clifisio);
      await new Promise(resolve => setTimeout(resolve, 1000));
     
      this.fisiocliente(this.clientes.id);
      this.modalnuevofisio();
    },
    async activarCliente() {
      axios.post('api/ventas', this.activacion);
      await new Promise(resolve => setTimeout(resolve, 1000));
      this.verpagos(this.clientes.id);
      this.activacion.precio = '';
      this.activacion.tipoventa = '';
      
    },

    async verpagos(id) {
      const res = await axios.get('api/ventas/' + id);
      this.ventas = res.data;
      cardpagos.style.display = 'block';
      datosCliente.style.display = 'none';
      regiscliente.style.display = 'none';
      registrosfisio.style.display = 'none';
      cardanexos.style.display = 'none';
    },

    async actualizarCliente() {
      const res = await axios.put('api/clientes/' + this.clientes.id, this.clientes);
      this.clientes.escaladolor = '';
      alert('Se actualizó con éxito');
    },


  },

}
</script>

