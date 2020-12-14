<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../assets/img/airplane.png" alt="FLIMASY Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>FLIMASY</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-1 mb-1 d-flex">
        <div class="info text-center">
            <a href="profile.php" class="d-block"><strong><i class="nav-icon fas fa-edit"></i> <?php echo $currentPerson->getFullName(); ?></strong></a>
        </div>
      </div>
      
      <?php if($currentPerson->getRol() == "Administrador"){ ?>
        <!-- Sidebar Menu -->
        <nav class="mt-1">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Menu</li>
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="company.php" class="nav-link">
                <i class="nav-icon fas fa-industry"></i>
                <p>
                  Empresa
                </p>
                
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Personas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="empleado.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Empleados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cliente.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plane"></i>
                <p>
                  Aeropuerto
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="tipoAvion.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tipo de Aviones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/profile.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Aviones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="addRuta.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rutas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="horario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Calendario
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Galeria
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-unlock-alt"></i>
                <p>
                  Cerrar Sesion
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      <?php } else { ?>
        
      <?php } ?>
    </div>
    <!-- /.sidebar -->
  </aside>