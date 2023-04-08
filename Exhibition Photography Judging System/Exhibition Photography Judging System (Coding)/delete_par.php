<?php

include("connection.php");

//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$pid= $_GET['PID'];

$result = mysqli_query($con,"DELETE FROM participant WHERE PID=$pid ");


mysqli_close($con); //close database connection
header('Location: view_par.php'); //redirect the page 

?>