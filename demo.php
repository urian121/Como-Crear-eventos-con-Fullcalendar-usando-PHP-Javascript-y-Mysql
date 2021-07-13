<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Como Crear eventos con fullcalendar usando jQuery - Javascript - Ajax - PHP y Mysql</title>

<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel='stylesheet' type='text/css' href='css/fullcalendar.css'/>

<script src ="https://code.jquery.com/jquery-3.0.0.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='locales/es.js'></script>
</head>
<body>



<div id='calendar'></div>


<div class="modal" id="evento-modal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form name="form-evento" id="form-evento" action="RegistEvento.php" method="POST">
    <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="fromDate">Nombre del Evento:</label>
                <input type="text" name="evento" id="evento" class="form-control">
              </div>
            </div>
          </div>
          
          <div class="row"> 
            <div class="col-md-6">
              <div class="form-group">
                <label for="fromDate">Fecha de Inicio:</label>
                <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="toDate">Fecha Final:</label>
                <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control">
              </div>
            </div>
          </div>

            <!--<div class="row"> 
                <div class="col-md-12 text-center">
                  <div class="form-group">
                    <label for="toDate">Color del Evento:</label>
                    <br>

                    <div class = "bGButton">
                      <button class="azul"></button>
                      <button class="verde"></button>
                      <button class="danger"></button>
                      <button class="pulpe"></button>
                      <button class="pinker"></button>
                      <button class="orange"></button>
                      <button class="blue"></button>
                      <button class="black"></button>
                      <button class="yellow"></button>
                    </div>

                  </div>
                </div>
            </div>  -->    
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Evento</button>
      </div>
  </form>

    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },
    locale: 'es', //Idioma del Calendario
    defaultView: "month",
    navLinks: true, 
    selectable: true,
    selectHelper: false,
    editable: true,
    eventLimit: true, 

    //evento Click
    select: function(start, end) {
        $('#evento-modal').modal();

        $("#calendar").fullCalendar("renderEvent", eventData, true);
        
    },

    eventRender: function(event, element) {
      element
        .find(".fc-content")
        .prepend("<span class='zmdi zmdi-close'></span>");
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



//Registrando Evento
 $("#btnEnviarFormEvento").click(function(e){ 
        e.preventDefault();  

        var dataString = $("#form-evento").serialize();
        var urlForm ="RegistEvento.php";
        //data: $("#Miform").serialize(),

         $.ajax({
            type:'POST',
            url:urlForm,
            data:dataString,
            success:function(Response){

           // $("#msj").show(250); //Mostrar el mensaje ya que por defecto esta Oculto
           // $('#respuesta').html(Response.mensaje);

 

        // $('#capaboys').html(html); 
              
            //Desaparecer el mensaje de Exito
           /* setTimeout(function () {
                $("#msj").fadeOut(1500);
            }, 5000);*/

            }
        });
           
  });



});
</script>
	
</body>
</html>