<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Como Crear eventos con fullcalendar usando jQuery - Javascript - Ajax - PHP y Mysql</title>
<style type="text/css">
html, body {
  margin: 0;
  padding: 0;
  font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 900px;
  margin: 40px auto;
}

#calendar a.fc-event {
  color: #fff; /*los estilos predeterminados de bootstrap lo hacen negro. deshacer  */
}

.breadcrumb {
    background-color: rgba(0,0,0,.03);
    border: 1px solid rgba(0,0,0,.125);
}

#content {
    margin-bottom: 25px;
}

.adsbygoogle {
    margin-bottom: 15px;
}

</style>

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

<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>

      <!--Este es el pie del modal aqui puedes agregar mas botones-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {    
   $('#calendar').fullCalendar({                
   	header: {       
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay',       
    },
    locale: 'es',
     selectable: true,
    selectHelper: false,
    editable: true,
     monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'], 
                                
   //Importante Evento Click en Fecha
    dayClick: function(date, jsEvent, view) {
      alert('Clicked on: ' + date.format());
     // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
      //alert('Current view: ' + view.name);
      // change the day's background color just for fun
      //$(this).css('background-color', 'red');
  
  	//------Llamando al modal de Bootstrap
      $("#exampleModal").modal();
      }
     //Fin Evento Click
     
                                
    });      
  });



$(document).ready(function() {
    $('#calendarX').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: yyyy+'-'+mm+'-'+dd,
        buttonIcons: true, // show the prev/next text
        weekNumbers: false,
        editable: true,
        eventLimit: true, // allow "more" link when too many events 
        events: [
            {
                title: 'All Day Event',
                description: 'Lorem ipsum 1...',
                start: yyyy+'-'+mm+'-01',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Long Event',
                description: 'Lorem ipsum 2...',
                start:  yyyy+'-'+mm+'-07',
                end:  yyyy+'-'+mm+'-10',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Repeating Event',
                description: 'Lorem ipsum 3...',
                start:  yyyy+'-'+mm+'-09T16:00:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Repeating Event',
                description: 'Lorem ipsum 4...',
                start:  yyyy+'-'+mm+'-16T16:00:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Conference',
                description: 'Lorem ipsum 5...',
                start:  yyyy+'-'+mm+'-11',
                end:  yyyy+'-'+mm+'-13',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Meeting',
                description: 'Lorem ipsum 6...',
                start:  yyyy+'-'+mm+'-12T10:30:00',
                end:  yyyy+'-'+mm+'-12T12:30:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Lunch',
                description: 'Lorem ipsum 7...',
                start:  yyyy+'-'+mm+'-12T12:00:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Meeting',
                description: 'Lorem ipsum 8...',
                start:  yyyy+'-'+mm+'-12T14:30:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Happy Hour',
                description: 'Lorem ipsum 9...',
                start:  yyyy+'-'+mm+'-12T17:30:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Dinner',
                description: 'Lorem ipsum 10...',
                start:  yyyy+'-'+mm+'-12T20:00:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Birthday Party',
                description: 'Lorem ipsum 11...',
                start:  yyyy+'-'+mm+'-13T07:00:00',
                color: '#3A87AD',
                textColor: '#ffffff',
            },
            {
                title: 'Event with link',
                description: 'Lorem ipsum 12...',
                url: 'http://www.jose-aguilar.com/',
                start:  yyyy+'-'+mm+'-28',
                color: '#3A87AD',
                textColor: '#ffffff',
            }
        ],
        dayClick: function (date, jsEvent, view) {
            alert('Has hecho click en: '+ date.format());
        }, 
        eventClick: function (calEvent, jsEvent, view) {
            $('#event-title').text(calEvent.title);
            $('#event-description').html(calEvent.description);
            $('#modal-event').modal();
        },  
	});
});
</script>
	
</body>
</html>