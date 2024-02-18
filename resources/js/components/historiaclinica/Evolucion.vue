<template>
    <Navbar/>
        <!-- Contenido de la página -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Contenido de la página</h2>
        <p>evo.</p>
      </main>
        </template>
        <script>
        import Navbar from '../../components/Navbar.vue'
        
        export default {
          components: {    
            Navbar,
          },
          data() {
            return {
        
            }
          }
        }
        </script>