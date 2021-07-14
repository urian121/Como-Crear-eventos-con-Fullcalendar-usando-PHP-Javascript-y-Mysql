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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<?php
include('config.php');

  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);

?>
<br><br>

<!--
<div id='calendar'></div>
-->

<div class="container">
  <div class="row">
    <div class="col">
     <div id="respuesta">  </div>
    </div>
</div>
</div>


<div id='calendar'></div>



<?php  
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>



<script src ="https://code.jquery.com/jquery-3.0.0.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

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
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
       
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
      events: [
        <?php
         while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
            {
            _id: '<?php echo $dataEvento['id']; ?>',
            title: '<?php echo $dataEvento['evento']; ?>',
            start: '<?php echo $dataEvento['fecha_inicio']; ?>',
            end:   '<?php echo $dataEvento['fecha_fin']; ?>',
            color: '<?php echo $dataEvento['color_evento']; ?>'
            },
          <?php } ?>
      ],


    eventRender: function(event, element) {
      element
        .find(".fc-content")
        .prepend("<span style='color:#333'; class='closeon material-icons'>&#xe5cd;</span>");
      
      //Eliminar evento
      element.find(".closeon").on("click", function() {
  
    var pregunta = confirm("Deseas Borrar este Evento?");   
    if (pregunta) {

      $("#calendar").fullCalendar("removeEvents", event._id);

       $.ajax({
              type: "POST",
              url: 'deleteEvento.php',
              data: {id:event._id},
              success: function(datos)
              {
                
              }
          });
        }

      });
    },

//Moviendo Evento
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
        //  msjEvento("Felicitaciones, el evento se ha modificado correctamente.");
          $("#respuesta").html(response) ;
        }
    });
},

//Modificar Evento 
 eventClick:function(event){
  var idEvento = event._id;
  $('input[name=idEvento').val(idEvento);
  $('input[name=evento').val(event.title);
  $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
  $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

  $("#modalUpdateEvento").modal();

  msjEvento("Felicitaciones, el evento fue eliminado correctamente.");

  //$("#calendar").fullCalendar("updateEvent", event);
  $("#calendar").fullCalendar("updateEvent", event);
},

  

});



function msjEvento(message) {
      $("#respuesta").html("<div class='alert alert-success' role='alert'>"+message+"</div>");
    setInterval(function() { $(".alert-success").fadeOut(); }, 3000);
}

//Registrar Evento con la Magia de AJAX
$('#addEvento').click(function(e){
  e.preventDefault();

url = "nuevoEvento.php";
$.ajax({
    type: "POST",
    url: url,
    data: $("#formEvento").serialize(),
    success: function(datos)
    {
    $("#exampleModal").modal('hide');
    $('body').removeClass('modal-open');
    $("#formEvento")[0].reset(); //Limpio todos los input de mi formulario

    msjEvento("Felicitaciones, evento registrado correctamente."); 
    }
  });
});


//Actualizar Evento
$('#updateEvento').click(function(e){
  e.preventDefault();

url = "UpdateEvento.php";
$.ajax({
    type: "POST",
    url: url,
    data: $("#formEventoUpdate").serialize(),
    success: function(datos)
    {
    $("#modalUpdateEvento").modal('hide');
    $('body').removeClass('modal-open');
    
    msjEvento("Felicitaciones, el evento fue actualizado correctamente.");
    }
  });
});


});

</script>
</body>
</html>