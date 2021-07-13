<?php
include('config.php');

$evento         = $_REQUEST['evento'];
$fecha_inicio   = $_REQUEST['fecha_inicio'];
$fecha_fin      = $_REQUEST['fecha_fin'];


$sql = ("INSERT INTO  eventoscalendar
    (
    evento,
    fecha_inicio,
    fecha_fin
    ) 
    VALUES(
    '".$evento."',
    '".$fecha_inicio."',
    '".$fecha_fin."'
    )");
$resultadoInsert = mysqli_query($con, $sql);

print_r($resultadoInsert);
?>