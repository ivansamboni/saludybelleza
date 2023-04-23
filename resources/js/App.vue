<template>
  <main>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/home" class="btn btn-outline-dark"><font-awesome-icon icon="fa-solid fa-dumbbell" /> Gimnasio</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/venta" class="btn btn-outline-dark"><font-awesome-icon icon="fa-solid fa-money-check-dollar" /> Ventas</router-link>
            </li>
            
            <li class="nav-item">
              <router-link to="/historiaclinica" class="btn btn-outline-dark"><font-awesome-icon icon="fa-solid fa-folder" size="1x" /> Historia Clinica</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/citas" class="btn btn-outline-dark"><font-awesome-icon icon="fa-solid fa-calendar" /> Citas</router-link>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <router-view />
  </main>
  
</template>
