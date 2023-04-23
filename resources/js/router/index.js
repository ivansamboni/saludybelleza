import { createRouter, createWebHistory } from 'vue-router'
import Inicio from '../views/Inicio.vue'
import Venta from '../views/Venta.vue'
import Historiaclinica from '../views/Historiaclinica.vue'
import Cita from '../views/Citas.vue'





const routes = [
   {

      path: '/home',
      name: 'inicio',
      component: Inicio

   },
   {
      path: '/venta',
      component: Venta

   },
   {
      path: '/historiaclinica',
      component: Historiaclinica

   },
   {
      path: '/citas',
      component: Cita

   }      
]

export const router = createRouter({
   history: createWebHistory(),
   routes
})

export default router