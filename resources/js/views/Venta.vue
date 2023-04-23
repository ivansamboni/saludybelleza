<template>

 <div class="container" style="width:80%;">
    <div class="card"><br>
      <h5 class="text-center"><strong>
          <font-awesome-icon icon="fa-solid fa-money-check-dollar" /> Ventas

        </strong></h5>
      <div class="card-body">
        <h5 class="card-title">Consulta de Ventas por Fechas</h5><br>
        <label for="fecha1">Desde</label>&nbsp;
        <input type="date" name="fecha1" v-model="fechas.fecha1">&nbsp;
        <label for="fecha2">Hasta</label>&nbsp;
        <input type="date" name="fecha2" v-model="fechas.fecha2">&nbsp;
        <button class="btn btn-success" @click="consultaVenta()">$ Consultar</button>&nbsp;
        <button class="btn btn-success" @click="ventashoy()">Ventas de Hoy</button><br><br>
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
</template>

<script>
import moment from "moment";
export default {

  data() {
    return {
      moment: moment,
      total: 0,
      fechas: {
        fecha1: '', fecha2: '',
      },
      ventas: [],

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
      const res = await axios.get('api/ventas');
      this.ventas = res.data;
    },

    async consultaVenta() {
      const res = await axios.post('api/fechaventas', this.fechas);
      this.ventas = res.data;
    }
  }
}
</script>