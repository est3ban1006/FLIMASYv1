<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i> <?php echo $titlePage; ?></a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              <?php if(!empty($subPage)){ ?>
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                  <li class="breadcrumb-item active"><?php echo $subPage; ?></li>
                </ol>
              <?php } ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->