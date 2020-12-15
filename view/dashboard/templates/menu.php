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
              <a href="index.php" class="nav-link <?php echo $activeInicio;?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="company.php" class="nav-link <?php echo $activeEmpresa;?>">
                <i class="nav-icon fas fa-industry"></i>
                <p>
                  Empresa
                </p>
                
              </a>
            </li>
            <li class="nav-item <?php echo $openPersonas;?>">
              <a href="#" class="nav-link <?php echo $activePersonas;?>">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Personas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="staff.php" class="nav-link <?php echo $activeStaff;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administradores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="customers.php" class="nav-link <?php echo $activeCustomers;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item <?php echo $openAirplane;?>">
              <a href="#" class="nav-link <?php echo $activeAirplane;?>">
                <i class="nav-icon fas fa-plane"></i>
                <p>
                  Aeropuerto
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="staffTipoAvion.php" class="nav-link <?php echo $activeTipoAvion;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tipo de Aviones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="staffAvion.php" class="nav-link <?php echo $activeAvion;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Aviones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="staffRuta.php" class="nav-link <?php echo $activeRutas;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rutas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="staffHorario.php" class="nav-link <?php echo $activeHorarios;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="staffDescuento.php" class="nav-link <?php echo $activeDescuentos;?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Descuentos</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="calendar.php" class="nav-link <?php echo $activeCalendar;?>">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Calendario
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="gallery.php" class="nav-link <?php echo $activeGaleria;?>">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Galeria
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-card"></i>
                <p>
                  Reservaciones
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa "></i>
                <p>
                  Vuelos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:;" onclick="ConfirmCloseSession();" class="nav-link">
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
        <nav class="mt-1">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="javascript:;" onclick="ConfirmCloseSession();" class="nav-link">
                <i class="nav-icon fas fa-unlock-alt"></i>
                <p>
                  Cerrar Sesion
                </p>
              </a>
            </li>
          </ul>
        </nav>
      <?php } ?>
    </div>
    <!-- /.sidebar -->
  </aside>
