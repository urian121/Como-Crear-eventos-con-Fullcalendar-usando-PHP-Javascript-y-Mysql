<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mi Calendario</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
#calendar {
  max-width: 900px;
  margin: 0 auto;
}
.closeon {
  border-radius: 5px;
}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
$hora = date("g:i:A");

$fecha_actual = date("d-m-Y");
echo date("d-m-Y",strtotime($fecha_actual."- 1 days")); 


?>
<br><br>

<div id='calendar'></div>


<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nuevo Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="proceso.php">
		<div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Nombre del Evento</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="titulo" placeholder="Titulo do Evento">
			</div>
		</div>
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Fecha Inicio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="Fecha Inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="fechaFinal" class="col-sm-12 control-label">Fecha Final</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fechaFinal" id="fechaFinal" placeholder="Fecha Final">
      </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputName1">Color del Evento</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" name="sexo" class="form-check-input">
                Masculino
              </label>
              <label class="form-check-label">
                <input type="radio" name="sexo" class="form-check-input">
                Femenino
              </label>
            </div>
          </div>
      </div>
		
			<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
	        	<button type="button" class="btn btn-success">Guardar Evento</button>
	      	</div>
	</form>
      
    </div>
  </div>
</div>



<script src ="https://code.jquery.com/jquery-3.0.0.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

 <script>
         var dt = new Date("December 30, 2017 11:20:25");
         dt.setDate( dt.getDate() - 1 );
         document.write( dt );
      </script>
<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },
    locale: 'es',
    defaultView: "month",
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectHelper: false,
    editable: true,
    eventLimit: true, // allow "more" link when too many events


    select: function(start, end) {
      var title = prompt("Event Content:");
      var eventData;
      if (title) {
        eventData = {
          title: title,
          start: start,
          end: end
        };
        $("#calendar").fullCalendar("renderEvent", eventData, true); 

        $("#exampleModal").modal();
        
        $("input[name=fechaInicio]").val(start.format('DD/MM/YYYY') + ' <?php echo $hora; ?>');
       
        var valorFechaFin = end.format("DD/MM/YYYY");
        var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD/MM/YYYY'); //Le resto 1 dia
       $('input[name=fechaFinal').val(F_final + ' <?php echo $hora; ?>');
      }
     
     // $("#calendar").fullCalendar("unselect");
    },



    eventRender: function(event, element) {
      element
        .find(".fc-content")
        .prepend("<span class='closeon material-icons'>&#xe5cd;</span>");
      
      //Eliminar evento
      element.find(".closeon").on("click", function() {
       $("#calendar").fullCalendar("removeEvents", event._id);
      });


    },

    eventClick: function(calEvent) {
      var title = prompt("Edit Event Content:", calEvent.title);
      calEvent.title = title;
      $("#calendar").fullCalendar("updateEvent", calEvent);
    }

  

  });
});

</script>
</body>
</html>