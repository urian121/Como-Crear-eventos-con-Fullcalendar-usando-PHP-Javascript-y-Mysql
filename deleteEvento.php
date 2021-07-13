<?php
require_once('config.php');
$id    		= $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM eventoscalendar WHERE  id='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);

?>
  