<template>

 <h3>ingreso usuario id: {{ useridStore.id }} - nombre: {{ useridStore.nombre }}</h3>
 <input type="text" v-model="useridStore.nombre">
</template>


<script setup>
import useUseridStore from '@/stores/userid.js'

const useridStore = useUseridStore()
</script>