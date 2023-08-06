<template>
  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <div>

            <div class="dropdown">
              <input type="text" class="dropdown-toggle form-control" v-model="apellido" @input="search"
                data-bs-toggle="dropdown" aria-expanded="false" placeholder="Apellidos..." />
              <ul class="dropdown-menu">
                <tr v-for="result in results" :key="result.id">
                  <a class="dropdown-item" href="#" @click="buscarClientevisitante(result.identificacion)">{{
                    result.nombres
                  }} {{
  result.apellidos
}} </a>
                </tr>
              </ul>
            </div>
          </div>

          

            <form @submit.prevent="buscarCliente()" class="d-flex">&nbsp;
              <input class="dropdown-toggle form-control" required name="bcedula" type="text" v-model="bcedula"
                placeholder="Cedula">&nbsp;&nbsp;
              <button class="btn btn-outline-primary" type="submit">
                <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
              </button>&nbsp;
            </form>

            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#regcliente"
                @click="modalnuevo()">+
                <font-awesome-icon icon="fa-solid fa-user" /> Nuevo
              </button>&nbsp;
              <button type="button" class="btn btn-outline-primary" @click="btnporvencer()">
                <font-awesome-icon icon="fa-solid fa-clock" /> Por vencer <span
                  class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{ cantvencer }}
                  <span class="visually-hidden">unread messages</span>
                </span>


              </button>&nbsp;

            </div>

        </ul>

      </div>
    </div>
  </nav>

  <!-- barra visitantes -->
  <div class="row">
    <div class="col-sm-3">
      <div class="card">
        <div class="card-body">
          <h5 style="color:#3396FF;">
            <font-awesome-icon icon="fa-solid fa-people-group" /><strong> Activados hoy ({{ cantvisita }})</strong>
          </h5>
          <div class="overflow-auto p-8 bg-light" style="max-height: 150px;">
            <div class="list-group" id="list-tab" role="tablist">

              <tr v-for="vis in visitanteshoy" :key="vis.id">
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list"
                  href="#list-settings" @click="buscarClientevisitante(vis.cliente.identificacion)" role="tab"
                  aria-controls="list-settings">
                  <font-awesome-icon icon="fa-solid fa-user" size="sm" /> <small>{{ vis.cliente.nombres }} {{
                    vis.cliente.apellidos
                  }} - {{ moment(vis.created_at).format("hh:mm a") }}</small></a>

              </tr>
            </div>
          </div>
        </div>
      </div><br>

    </div>

    
    <!--Tarjeta información perfil -->
    <div class="col-sm-8">
      <form>
        <div class="row justify-content-left">

          <div class="col-lg-10">
            <div class="card mb-4" id="datosCliente" style="display:none;">
              <div class="card-body">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#regcliente">
                    <font-awesome-icon icon="fa-solid fa-pen-to-square" size="sm" /> Editar
                  </button>&nbsp;

                  <button type="button" class="btn btn-outline-dark btn-sm" id="btningresar" style="display:none;">
                    <font-awesome-icon icon="fa-solid fa-right-to-bracket" /> Ingresa
                  </button>&nbsp;

                  <button type="button" class="btn btn-outline-success btn-sm" id="btnactivo" style="display:block;"
                    data-bs-toggle="modal" data-bs-target="#modmembresia">
                    <font-awesome-icon icon="fa-solid fa-check" />
                    Activar
                  </button>

                </div>
                <hr>
                <font-awesome-icon icon="fa-solid fa-user" size="3x" />
                <br><br>

                <div class="row">
                  <div class="col-sm-3">

                    <p class="mb-0"><strong>Nombre</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <h5><strong>{{ clientes.nombres }}&nbsp;{{
                      clientes.apellidos
                    }}</strong></h5>

                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-3">

                    <p class="mb-0"><strong>Estado</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <h5 :class="color">{{ moment(clientes.estadoactivo).format("DD/MM/YYYY") }} Fecha de Terminación
                    </h5>

                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0"><strong>Identificación</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <h5>{{ clientes.identificacion }}</h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0"><strong>Teléfono</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <h5>{{ clientes.telefono }}</h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0"><strong>Correo Electrónico</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <h5>{{ clientes.correo }}</h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0"><strong>Fecha de Registro</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <h5>{{ moment(clientes.created_at).format("hh:mm a DD/MM/YYYY") }}</h5>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0"><strong>Observaciones</strong></p>
                  </div>
                  <div class="col-sm-9">
                    <p>{{ clientes.observacion }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>


      <!-- por vencer -->
      <div class="row justify-content-left">
        <div class="col-lg-10">
          <div class="card mb-6" id="datosporvencer" style="display:none;">
            <div class="card-body">
              <br>
              <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status" id="spinner" style="display:none;">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
              <h3 align="center">Clientes por vencer en los próximos 3 días</h3>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Telefóno</th>
                    <th scope="col">Fecha de Vencimiento</th>
                    <th scope="col">Notificado</th>

                  </tr>
                </thead>
                <tbody>
                  <tr v-for="cliv in clienteslist" :key="cliv.id">

                    <td>
                      <font-awesome-icon icon="fa-solid fa-user" size="sm" />&nbsp;
                      <a href="" @click.prevent="buscarClientevisitante(cliv.identificacion)">{{ cliv.nombres }}&nbsp;
                        {{ cliv.apellidos }}</a>
                    </td>
                    <td>{{ cliv.identificacion }}</td>
                    <td>{{ cliv.telefono }}</td>
                    <td style="color:red;">{{ moment(cliv.estadoactivo).format("DD/MM/YYYY") }}</td>
                    <td><button class="btn btn-primary"
                        @click="notificarEmail(cliv.identificacion, cliv.notificado)"><font-awesome-icon
                          icon="fa-sharp fa-envelope" /> {{ cliv.notificado }}</button>
                    </td>


                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal agregar editar -->
  <div class="modal fade" id="regcliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <div class="modal-body"><br>
          <h5 align="center">+
            <font-awesome-icon icon="fa-solid fa-user" /> {{ titulomodal }}
          </h5><br>

          <div class="row">
            <div class="col-sm-2">
              <label for="nombre" class="form-label"><strong>Nombres</strong></label><spam style="color:red;">(*)</spam>

              <input type="text" v-model="clientes.nombres" id="nombre" class="form-control form-control-sm"
                placeholder="Campo obligatorio">
            </div>
            <div class="col-sm-2">
              <label for="nombre" class="form-label"><strong>Apellidos</strong></label><spam style="color:red;">(*)</spam>

              <input type="text" v-model="clientes.apellidos" id="apellidos" class="form-control form-control-sm" placeholder="Campo obligatorio">
            </div>

            <div class="col-sm-2">
              <label for="cedula" class="form-label"><strong>T.I</strong></label><spam style="color:red;">(*)</spam>
              <select id="tipo" v-model="clientes.tipodocumento" class="form-control form-control-sm" placeholder="Campo obligatorio">
                <option disabled value="">Seleccione</option>
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="RC">RC</option>
                <option value="CE">CE</option>
              </select>
            </div>

            <div class="col-sm-2">
              <label for="telefono" class="form-label"><strong>Numero Identificación</strong></label><spam style="color:red;">(*)</spam>
              <input type="text" v-model="clientes.identificacion" id="identificacion"
                class="form-control form-control-sm" placeholder="Campo obligatorio">

            </div>

            <div class="col-sm-2">
              <label for="genero" class="form-label"><strong>Genero</strong></label>
              <select id="genero" v-model="clientes.genero" class="form-control form-control-sm">

                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="estadocivil"><strong>Estado Civil</strong></label>
              <select id="estadocivil" v-model="clientes.estadocivil" class="form-control form-control-sm">

                <option value="Soltero(a)">Soltero(a)</option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Union Libre">Union Libre</option>
                <option value="Otro">Otro</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="correo" class="form-label"><strong>Fecha de Nacimiento</strong></label>
              <input type="date" v-model="clientes.nacimiento" @change="getEdad(clientes.nacimiento)"
                class="form-control form-control-sm" id="nacimiento">
            </div>
            <div class="col-sm-1">
              <label for="correo" class="form-label"><strong>Edad </strong></label>
              <input type="text" v-model="clientes.edad" class="form-control form-control-sm" id="cedad">

            </div>
            <div class="col-sm-2">
              <label for="correo" class="form-label"><strong>Dirección</strong></label>
              <input type="text" v-model="clientes.direccion" class="form-control form-control-sm" id="direccion">
            </div>

            <div class="col-sm-2">
              <label for="correo" class="form-label"><strong>Teléfono</strong></label>
              <input type="text" v-model="clientes.telefono" class="form-control form-control-sm" id="telefono">
            </div>

            <div class="col-sm-3">
              <label for="correo" class="form-label"><strong>Persona Referencia</strong></label>
              <input type="text" v-model="clientes.otrotelefono" class="form-control form-control-sm" id="otrotelefono"
               placeholder="Nombre y Telefono">
            </div>

            <div class="col-sm-2">
              <label for="correo" class="form-label"><strong>Correo Electrónico</strong></label>
              <input type="email" v-model="clientes.correo" class="form-control form-control-sm" id="correo">
            </div>

            <div class="col-sm-2">
              <label for="correo" class="form-label"><strong>Ocupación</strong></label>
              <input type="text" v-model="clientes.ocupacion" class="form-control form-control-sm" id="ocupacion">
            </div>
          </div>


          <div class="row">
            <div class="col-sm-4"><br>
              <label for="observacion" class="form-label"><strong>observación</strong></label>
              <textarea id="observacion" cols="100" rows="2" v-model="clientes.observacion"
                class="form-control form-control-sm"></textarea>
            </div>
          </div><br>
          <button class="btn btn-danger btn-sm" id="btnelimclie" @click="eliminarCliente(clientes.id)"
            data-bs-dismiss="modal">
            <font-awesome-icon icon="fa-solid fa-trash" /> Eliminar Cliente
          </button>
        </div>
        <br><br>
        <div class="modal-footer">
          <button type="button" class="myButton2" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" id="btncrear" @click="crearCliente()" data-bs-dismiss="modal"
            class="myButton">REGISTRAR</button>
          <button type="submit" id="btnactualizar" @click="actualizarCliente()" data-bs-dismiss="modal"
            class="myButton">ACTUALIZAR</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal activar membresia-->
  <div class="modal fade" id="modmembresia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center">
            <font-awesome-icon icon="fa-solid fa-dumbbell" /> Activar Cliente
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <label for="estadoactivo"><strong>Fecha Final</strong></label>&nbsp;
            <input type="date" v-model="clientes.estadoactivo" name="estadoactivo" class="form-control" placeholder="Días"
              width="50%">
            <br>
            <label for="precio"><strong>Precio de Venta (Sin puntos)</strong></label>&nbsp;
            <input type="number" v-model="activacion.precio" name="precio" class="form-control" pattern="[0-9]">
            <br>
            <label for="tipo"><strong>Descripción de Venta</strong></label>&nbsp;
            <input type="text" v-model="activacion.tipoventa" name="tipo" class="form-control">
          </center>
          <br>
          <h3>Fecha de Vencimiento: <strong style="color:green;">{{
            moment(clientes.estadoactivo).format("DD/MM/YYYY")
          }}</strong></h3><br>
          <h3>Costo: <strong style="color:green;">${{ numberWithCommas(activacion.precio) }}</strong></h3>
        </div>

        <div class="modal-footer">

          <button type="button" class="myButton2" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" class="myButton" id="btnactivar" @click="activarCliente()"
            data-bs-dismiss="modal">ACTIVAR</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {crearCliente,numberWithCommas,getEdad} from '../helpers/Functions.js'
import moment from "moment";
export default {

  data() {
    return {
      moment: moment,
      diasrestantes: '',
      edadactual: '',
      bcedula: '',
      apellido: '',
      minLength: 3,
      cantvisita: '',
      cantvencer: '',
      jsonmensaje: '',

      activacion: { cliente_id: '', precio: '', tipoventa: '', },

      clientes: {
        id: '', nombres: '', apellidos: '',
        tipodocumento: '', identificacion: '', genero: '', estadocivil: '', notificado: '',
        nacimiento: '', edad: '', direccion: '', telefono: '', ocupacion: '', otrotelefono: '', correo: '', observacion: '', estadoactivo: '', created_at: ''

      },
      correo: { nombre: '', apellido: '', correo: '', fecha: '' },


      clienteslist: [],
      visitanteshoy: [],
      results: [],
      membresiaslist: [],
      historiaclinica: []

    }
  },

  computed: {
    color() {
      return { 'text-danger': this.clientes.estadoactivo === new Date() }
    },
  },
  mounted() {
    this.visitantes();
    this.search();
  },

  created() {
    this.search();
    this.porvencer();
  },

  methods: {    
    crearCliente,
    numberWithCommas,
    getEdad,

    async porvencer() {
      const res = await axios.get('api/clientes');
      this.cantvencer = res.data.length;
    },

    async btnporvencer() {
      spinner.style.display = 'block';
      const res = await axios.get('api/clientes');
      this.clienteslist = res.data;
      datosporvencer.style.display = 'block';
      datosCliente.style.display = 'none';
      setTimeout(() => {
        spinner.style.display = 'none';
      }, 200);


    },

    modalnuevo() {
      datosCliente.style.display = 'none';
      btncrear.hidden = false;
      btnactualizar.hidden = true;
      btnelimclie.hidden = true;
      this.edadactual = '';
      this.clientes.nombres = '';
      this.clientes.apellidos = '';
      this.clientes.identificacion = '';
      this.clientes.genero = '';
      this.clientes.estadocivil = '';
      this.clientes.estadoactivo = '';
      this.clientes.nacimiento = '';
      this.clientes.edad = '';
      this.clientes.direccion = '';
      this.clientes.ocupacion = '';
      this.clientes.telefono = '';
      this.clientes.otrotelefono = '';
      this.clientes.correo = '';
      this.clientes.observacion = '';
      this.titulomodal = 'Registrar Nuevo Cliente';
    },

    async visitantes() {
      const res = await axios.get('api/visita');
      this.visitanteshoy = res.data;
      this.cantvisita = res.data.length;

    },

    
    async activarCliente() {
      let confirmac = confirm('Activar este cliente?');
      if (confirmac) {
        this.clientes.notificado = 0;
        axios.post('api/ventas', this.activacion);
        axios.put('api/clientes/' + this.clientes.id, this.clientes);
        axios.post('api/visita?cliente_id=' + this.clientes.id);
        alert('Se Activó con éxito');
        this.visitantes();
        this.porvencer();
      }
    },

    async actualizarCliente() {
      const res = await axios.put('api/clientes/' + this.clientes.id, this.clientes);
      alert('Se actualizó con éxito');
     },

    async eliminarCliente(id) {
      let confirmac = confirm('Eliminar este cliente?');
      if (confirmac) {
        const res = await axios.delete('api/clientes/' + id);
        datosCliente.style.display = 'none';
      }
    },

    async search() {

      if (this.apellido.length >= 3) {
        const res = await axios.get('api/sclientes/' + this.apellido);
        this.results = res.data;
      }
    },

    async buscarCliente() {
      datosporvencer.style.display = 'none';
      btnactualizar.hidden = false;
      btncrear.hidden = true;
      this.titulomodal = 'Modificar Datos';
      const res = await axios.get('api/clientes/' + this.bcedula);
      btningresar.disabled = false;
      datosCliente.style.display = 'block';
      this.activacion.cliente_id = res.data.id;
      this.clientes.id = res.data.id;
      this.clientes.nombres = res.data.nombres;
      this.clientes.apellidos = res.data.apellidos;
      this.clientes.estadoactivo = res.data.estadoactivo;
      this.clientes.tipodocumento = res.data.tipodocumento;
      this.clientes.identificacion = res.data.identificacion;
      this.clientes.genero = res.data.genero;
      this.clientes.estadocivil = res.data.estadocivil;
      this.clientes.edad = res.data.edad;
      this.clientes.nacimiento = res.data.nacimiento;
      this.clientes.direccion = res.data.direccion;
      this.clientes.telefono = res.data.telefono;
      this.clientes.otrotelefono = res.data.otrotelefono;
      this.clientes.correo = res.data.correo;
      this.clientes.ocupacion = res.data.ocupacion;
      this.clientes.observacion = res.data.observacion;
      this.clientes.created_at = res.data.created_at;
      this.bcedula = '';
      this.visitantes();

    },

    async notificarEmail(cedula, notificado) {
      if (confirm('Enviar notificación al Correo? esta persona ha sido notificada  ' + notificado + ' veces')) {
        spinner.style.display = 'block';
        const res = await axios.get('api/clientes/' + cedula);
        this.clientes.id = res.data.id;
        this.clientes.nombres = res.data.nombres;
        this.clientes.apellidos = res.data.apellidos;
        this.clientes.estadoactivo = res.data.estadoactivo;
        this.clientes.tipodocumento = res.data.tipodocumento;
        this.clientes.identificacion = res.data.identificacion;
        this.clientes.genero = res.data.genero;
        this.clientes.estadocivil = res.data.estadocivil;
        this.clientes.edad = res.data.edad;
        this.clientes.nacimiento = res.data.nacimiento;
        this.clientes.direccion = res.data.direccion;
        this.clientes.telefono = res.data.telefono;
        this.clientes.otrotelefono = res.data.otrotelefono;
        this.clientes.correo = res.data.correo;
        this.clientes.ocupacion = res.data.ocupacion;
        this.clientes.observacion = res.data.observacion;
        this.clientes.created_at = res.data.created_at;
        this.clientes.notificado = res.data.notificado;
        this.clientes.notificado++;
        axios.put('api/clientes/' + this.clientes.id, this.clientes);
        this.btnporvencer();
        this.correo.nombre = res.data.nombres;
        this.correo.apellido = res.data.apellidos;
        this.correo.correo = res.data.correo;
        this.correo.fecha = res.data.estadoactivo;
        await axios.post('api/enviarcorreo', this.correo);
        setTimeout(() => {
          spinner.style.display = 'none';
        }, 200);
      }
    },

    async buscarClientevisitante(identificacion) {
      datosporvencer.style.display = 'none';
      btnactualizar.hidden = false;
      btncrear.hidden = true;
      this.titulomodal = 'Modificar Datos';
      const res = await axios.get('api/clientes/' + identificacion);
      btningresar.disabled = false;
      datosCliente.style.display = 'block';
      this.activacion.cliente_id = res.data.id;
      this.clientes.id = res.data.id;
      this.clientes.nombres = res.data.nombres;
      this.clientes.apellidos = res.data.apellidos;

      this.clientes.estadoactivo = res.data.estadoactivo;
      this.clientes.tipodocumento = res.data.tipodocumento;
      this.clientes.identificacion = res.data.identificacion;
      this.clientes.genero = res.data.genero;
      this.clientes.estadocivil = res.data.estadocivil;
      this.clientes.edad = res.data.edad;
      this.clientes.nacimiento = res.data.nacimiento;
      this.clientes.direccion = res.data.direccion;
      this.clientes.telefono = res.data.telefono;
      this.clientes.otrotelefono = res.data.otrotelefono;
      this.clientes.correo = res.data.correo;
      this.clientes.ocupacion = res.data.ocupacion;
      this.clientes.observacion = res.data.observacion;
      this.clientes.created_at = res.data.created_at;
      this.apellido = '';
      this.bcedula = '';
      this.visitantes();
    },

    async membresias() {
      const res = await axios.get('api/membresias');
      this.membresiaslist = res.data;
    },

  },

}
</script>