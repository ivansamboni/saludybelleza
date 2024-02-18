<template>

<h3>ingreso usuario id: {{ useridStore.cedula }}</h3>

<input type="text" v-model="useridStore.cedula">

</template>

<script setup>

import useUseridStore from '@/stores/userid.js'

const useridStore = useUseridStore()




</script>

