    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Super Admin</div>
      </a>

      
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Super Admin
      </div>

      <li class="nav-item" id="sidebarMarketing">
        <a class="nav-link" href="<?=base_url()?>marketing/si">
          <i class="fas fa-fw fa-user"></i>
          <span>Marketing</span></a>
      </li>
      
      <li class="nav-item" id="sidebarLac">
        <a class="nav-link" href="<?= base_url()?>lac/listlac">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>LAC</span></a>
      </li>

      <li class="nav-item" id="sidebarAgency">
        <a class="nav-link" href="<?=base_url()?>agency/batch/3">
        <i class="fas fa-fw fa-warehouse"></i>
        <span>Agency</span></a>
      </li>

      <li class="nav-item" id="Peserta">
        <a class="nav-link" href="<?= base_url()?>login/logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>
    </ul>
    <!-- End of Sidebar -->
