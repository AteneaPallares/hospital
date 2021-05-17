<template>
  <nav
    class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
  >
    <div class="container-fluid d-flex flex-column p-0">
      <div
        class="navbar-brand bg-red d-flex justify-content-center align-items-center sidebar-brand m-0"
      ></div>
      <hr class="sidebar-divider my-0" />
      <ul class="nav navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/"
            ><i class="fas fa-chart-line"></i><span>Dashboard</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/usuarios/"
            ><i class="fas fa-address-card"></i><span>Usuarios</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pacientes/"
            ><i class="el-icon-user-solid"></i><span>Pacientes</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/historiales/"
            ><i class="el-icon-folder"></i><span>Historiales médicos</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/areas/"
            ><i class="el-icon-map-location"></i><span>Áreas</span></a
          >
        </li>
      </ul>
      <div class="text-center d-none d-md-inline">
        <button
          class="btn rounded-circle border-0"
          id="sidebarToggle"
          type="button"
        ></button>
      </div>
    </div>
  </nav>
</template>

