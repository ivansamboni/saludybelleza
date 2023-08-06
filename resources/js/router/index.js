import { createRouter, createWebHistory } from 'vue-router'
import Inicio from '../views/Inicio.vue'
import Historiaclinica from '../views/Historiaclinica.vue'
import Cita from '../views/Citas.vue'
import Ventagim from '../views/Ventagim.vue'
import Ventasfisio from '../views/Ventasfisio.vue'





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

   }    
]

export const router = createRouter({
   history: createWebHistory(),
   routes
})

export default router