<template>
    <h2>{{clientes.nombres}}</h2>
</template>

 
<script>

export default {

    data() {
        return {
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
        }
    },
}
</script>


