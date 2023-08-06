<template>
    <div class="container" style="width:80%;">
      <div class="card"><br>
        <h3 class="text-center"><strong>
            <font-awesome-icon icon="fa-solid fa-money-check-dollar" /> Ventas de Fisioterapia
  
          </strong></h3>
        <div class="card-body">
          <h5 class="card-title">Consulta de Ventas por Fechas</h5><br>
          <label for="fecha1">Desde</label>&nbsp;
          <input type="date" name="fecha1" v-model="fechas.fecha1">&nbsp;
          <label for="fecha2">Hasta</label>&nbsp;
          <input type="date" name="fecha2" v-model="fechas.fecha2">&nbsp;
          <button class="btn btn-primary" @click="consultaVenta()">$ Consultar</button>&nbsp;
          <button class="btn btn-primary" @click="ventashoy()">Ventas de Hoy</button>&nbsp;
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalpago"  @click="">Registrar Pago</button><br>
          <br>
          <h3>Total: <string style="color:green;">${{ numberWithCommas(total) }}</string>
          </h3>&nbsp;
          <br><br>
  
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
                <td>${{ numberWithCommas(ven.precio) }}</td>
                <td>{{ ven.tipoventa }}</td>
                <td>{{ moment(ven.created_at).format("DD/MM/YYYY hh:mm a") }}</td>
              </tr><br>
              <h5>Total: <string style="color:green;">${{ numberWithCommas(total) }}</string>
              </h5>&nbsp;
            </tbody>
          </table>
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
            <label for="name"><strong>Buscar Cliente</strong></label><spam style="color:red;">(*)</spam>
                      <div class="dropdown">
                          <input type="text" name="name" class="dropdown-toggle form-control" v-model=" apellido " @input=" search "
                              data-bs-toggle="dropdown" aria-expanded="false"
                              placeholder="Apellidos,Nombres o Identificación..." />
                          <ul class="dropdown-menu">
                              <tr v-for="          result           in           results          " :key=" result.id ">
                                  <a class="dropdown-item" href="#" @click=" buscarCliente(result.identificacion) ">{{
                                      result.nombres
                                      }} {{
                                      result.apellidos
                                      }} </a>
                              </tr>
                          </ul>
                      </div>
                      <br>
                      <div class="text-center">
                          <h5><strong>Cliente:&nbsp;</strong><strong style="color:green;">{{ nombrecliente }}&nbsp;{{
                                  apellidocliente }}</strong></h5>
                      </div>
            <center>
              <br>
              <label for="tipo"><strong>Descripción</strong></label><spam style="color:red;">(*)</spam>&nbsp;
              <input type="text" v-model="activacion.tipoventa" name="tipo" class="form-control" placeholder="Campo obligatorio"><br><br>
  
              <label for="precio"><strong>Precio (Sin puntos)</strong></label><spam style="color:red;">(*)</spam>&nbsp;
              <input type="number" v-model="activacion.precio" name="precio" pattern="[0-9]" class="form-control" placeholder="Campo obligatorio"><br>
            </center>
            <br>
  
            <h3>Precio: <strong style="color:green;">${{ numberWithCommas(activacion.precio) }}</strong></h3>
          </div>
  
          <div class="modal-footer">
  
            <button type="button" class="myButton2" data-bs-dismiss="modal">CANCELAR</button>
            <button type="button" class="myButton" id="btnactivar" @click="activarCliente()"
              data-bs-dismiss="modal">REGISTRAR</button>
          </div>
        </div>
      </div>
    </div>
    
  
  </template>
  
  <script>
  
  
  import moment from "moment";
  export default {
  
    data() {
      return {
        name: '',
        moment: moment,
        total: 0,
        nombrecliente: '',
              apellidocliente: '',
              apellido: '',
        activacion: { cliente_id: "", precio: "", tipoventa: "" },
        fechas: {
          fecha1: '', fecha2: '',
        },
        ventas: [],
        results: [],
  
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
     
      async ventashoy() {
        const res = await axios.get('api/ventasfisio');
        this.ventas = res.data;
      },
  
      async consultaVenta() {
        const res = await axios.post('api/fechaventasfisio', this.fechas);
        this.ventas = res.data;
      },
  
      async activarCliente() {
        axios.post('api/ventasfisio', this.activacion);        
        this.activacion.precio = '';
        this.activacion.tipoventa = '';
  
      },
      async search() {
  
  if (this.apellido.length >= 3) {
      const res = await axios.get('api/sclientes/' + this.apellido);
      this.results = res.data;
  }
  },
  
  async buscarCliente(identificacion) {
  const res = await axios.get('api/clientes/' + identificacion);
  this.apellido = res.data.nombres + res.data.apellidos;
  this.activacion.cliente_id = res.data.id;
  this.nombrecliente = res.data.nombres;
  this.apellidocliente = res.data.apellidos;
  
  }
    }
  }
  </script>