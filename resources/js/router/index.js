import { createRouter, createWebHistory } from 'vue-router'
import Inicio from '../views/Inicio.vue'
import Historiaclinica from '../views/Historiaclinica.vue'
import Cita from '../views/Citas.vue'
import Ventagim from '../views/Ventagim.vue'
import Ventasfisio from '../views/Ventasfisio.vue'
import Observaciones from '../views/Observaciones.vue'

import Ingreso from '../components/historiaclinica/Ingreso.vue'
import Evolucion from '../components/historiaclinica/Evolucion.vue'
import Fisioterapia from '../components/historiaclinica/Fisioterapia.vue'






const routes = [
   {

      path: '/home',
      name: 'inicio',
      component: Inicio

   },   
   {
      path: '/historiaclinica',
      component: Historiaclinica

   },
   {
      path: '/citas',
      component: Cita

   },
   {
      path: '/ventagimnasio',
      component: Ventagim
   },
   {
      path: '/ventafisioterapia',
      component: Ventasfisio

   },
   {
      path: '/observaciones',
      component: Observaciones

   },
   {
      path: '/ingreso',
      component: Ingreso

   },
   {
      path: '/evolucion',
      component: Evolucion

   },
   {
      path: '/fisioterapia',
      component: Fisioterapia

   },            
   
]

export const router = createRouter({
   history: createWebHistory(),
   routes
})

export default router