
$(document).ready(function() {



//Registrar nuevo  Evento en el Calendario con Ajax
$('#addEvento').click(function(e){
  e.preventDefault();

url = "nuevoEvento.php";
$.ajax({
    type: "POST",
    url: url,
    data: $("#formEvento").serialize(),
    success: function(datos)
    {
      
    location.href="index.php"; //Refresco mi index
    $("#formEvento")[0].reset(); //Limpio todos los input de mi formulario

    msjEvento("Felicitaciones, evento registrado correctamente."); 
    }
  });
});
/****************/


//Actualizar Evento del  Calendario
$('#updateEvento').click(function(e){
  e.preventDefault();

url = "UpdateEvento.php";
$.ajax({
    type: "POST",
    url: url,
    data: $("#formEventoUpdate").serialize(),
    success: function(datos)
    {
    //$("#modalUpdateEvento").modal('hide');
    //$('body').removeClass('modal-open');
    location.href="index.php";
    
    msjEvento("Felicitaciones, el evento fue actualizado correctamente.");

    }
  });
});


//Mensaje o notificacion de acuerdo a la accion ejecutada.
function msjEvento(message) {
      $("#respuesta").html("<div class='alert alert-success' role='alert'>"+message+"</div>");
    setInterval(function() { $(".alert-success").fadeOut(); }, 5000);
}

});