export function modalnuevo() {

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
}
export function modalnuevofisio() {
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

}

export function numberWithCommas(x) {
  return x.toLocaleString();
}

export function getEdad(dateString) {
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
}

export function crearCliente() {
  axios.post('api/clientes', this.clientes)
    .then(function (response) {
      alert('Cliente Creado con Éxito')
    })
    .catch(function (error) {
      alert('los campos "Nombres, Apellidos y Cedula son Obligatorios"  o la identificación o el email ya están registrados');
    });
}