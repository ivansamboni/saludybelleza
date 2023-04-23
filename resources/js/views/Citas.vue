<template>
    <div class="container" style="width:80%;">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center"><strong>Agendamiento de Citas</strong></h5>

                <button class="btn btn-outline-dark" @click="modalNuevo();" data-bs-toggle="modal"
                    data-bs-target="#modcitas">Nueva Cita</button>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Fecha Cita</th>

                            <th scope="col">Descripción</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="          cit           in           citas          " :key=" cit.id ">
                            <td>{{ cit.cliente.nombres }} {{ cit.cliente.apellidos }}</td>
                            <td>{{ (cit.cliente.identificacion) }}</td>
                            <td>{{ (cit.cliente.telefono) }}</td>
                            <td>{{ (cit.cliente.correo) }}</td>
                            <td><strong>{{ moment(cit.fechacita).format("DD/MM/YYYY hh:mm a") }}</strong></td>


                            <td>{{ cit.descripcion }}</td>
                            <td><button class="btn btn-danger btn-sm" @click=" citaEliminar(cit.id) ">
                                    <font-awesome-icon icon="fa-solid fa-trash" /></button>
                            </td>
                        </tr><br>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modcitas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h4><font-awesome-icon icon="fa-solid fa-calendar" /> Agendar cita </h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="tipo"><strong>Buscar Cliente</strong></label>
                    <div class="dropdown">
                        <input type="text" class="dropdown-toggle form-control" v-model=" apellido " @input=" search "
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
                    <label for="fechacita"><strong>Fecha de Cita</strong></label>&nbsp;
                    <input type="datetime-local" class="form-control" name="fechacita" v-model=" clientecita.fechacita "
                        placeholder="Días" width="50%">
                    <br>

                    <label for="descripcion"><strong>Descripción</strong></label>&nbsp;
                    <input type="text" v-model=" clientecita.descripcion " name="descripcion" class="form-control"
                        placeholder="Campo obligatorio"><br>

                    <br>
                    <h3>Fecha de la Cita: <strong style="color:green;">
                            {{ moment(clientecita.fechacita).format("DD/MM/YYYY hh: mm a ") }}
                        </strong></h3><br>

                </div>

                <div class="modal-footer">

                    <button type="button" class="myButton2" data-bs-dismiss="modal">CANCELAR</button>
                    <button type="button" class="myButton" id="btnactivar" @click=" activarCita() "
                        data-bs-dismiss="modal">AGENDAR</button>
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
            moment: moment,
            clientecita: { cliente_id: '', fechacita: '', descripcion: '' },
            correo: { nombre: '', apellido: '', correo: '', fecha: '' },
            nombrecliente: '',
            apellidocliente: '',
            apellido: '',
            citas: [],
            results: [],

        };
    },

    mounted() {
        this.listarCitas();
        this.search();
    },

    methods: {

        activarCita() {
            this.correo.fecha = this.clientecita.fechacita;

            return axios.post('api/citas', this.clientecita).then(response => {
                alert('Cita agendada con éxito');
                axios.post('api/enviarcorreocita', this.correo);
                this.listarCitas();
            })
                .catch(error => {
                    alert('Parece que ya hay una cita para ese día y esa hora o el campo descripción está vacío');
                });
        },






        async listarCitas() {
            const res = await axios.get('api/citas');
            this.citas = res.data;
            this.totalcitas = res.data.length
        },

        async citaEliminar(id) {
            let confirmac = confirm('Eliminar este registro?');
            if (confirmac) {
                const res = await axios.delete('api/citas/' + id);
                this.listarCitas();
            }

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
            this.clientecita.cliente_id = res.data.id;
            this.nombrecliente = res.data.nombres;
            this.apellidocliente = res.data.apellidos;
            this.correo.nombre = res.data.nombres;
            this.correo.apellido = res.data.apellidos;
            this.correo.correo = res.data.correo;
        },

        modalNuevo() {
            this.nombrecliente = '';
            this.apellidocliente = '';
            this.clientecita.cliente_id = '';
            this.clientecita.descripcion = '';
            this.clientecita.fechacita = '';
            this.apellido = '';
        },

    }
}
</script>