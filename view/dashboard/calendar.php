<?php include 'templates/header.php'; 
$titlePage = "Calendario";
$subPage = "Calendario";
$activeCalendar = "active";

#FIRSY GET ALL HORARIOS POR RUTA
$listaHorarios = array();
$listRutas = $rutaBO->getAllByEmpresa($currentCompany->getIdEmpresa());
foreach ($listRutas as $ruta) {
  $horariosPorRuta = $horariBO->getAllByRuta($ruta['idRuta']);
  foreach ($horariosPorRuta as $hor) {
    array_push($listaHorarios, $hor);
  }
}

#GENERATE ARRAY
$events = array();
foreach ($listaHorarios as $horario) {
  $ruta = $rutaBO->getById($horario['idRuta']);
  $avion = $avionBO->getById($horario['idCatalogo_avion']);
  $dateStart = new DateTime($horario['Fecha']." ".$horario['HoraDespliegue']);
  $start = $dateStart->format('Y-m-d H:i:s');
  $arrDuracion = explode(":", $ruta->getDuracion()); 
  $dateStart->modify($arrDuracion[0]." hours");
  $dateStart->modify($arrDuracion[1]." minutes");
  $dateStart->modify($arrDuracion[2]." seconds"); 
  $end = $dateStart->format('Y-m-d H:i:s');

  $row = array(
    "title" => $ruta->getRuta()." - ".$avion->getNombre_Avion(),
    "start" => $start,
    "end" => $end,
    "url" => "http://localhost:8088/FLIMASYv1/view/dashboard/seeAsientos.php?id=".$horario['idHorario_Ruta'],
    "backgroundColor" => '#3c8dbc',
    "borderColor" => '#3c8dbc'
  );

  array_push($events, $row);
} 
?>
<div class="wrapper">
  <?php include 'templates/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include 'templates/breadcumb.php'; ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="col-lg-12">
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'templates/footer.php'; ?>

<script type="text/javascript">
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: <?php echo json_encode($events); ?>,
      editable  : false,
      droppable : false
    });

    calendar.render();
    // $('#calendar').fullCalendar()
</script>
