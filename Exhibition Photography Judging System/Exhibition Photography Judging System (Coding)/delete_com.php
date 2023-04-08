<?php

include("connection.php");

//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$coid= $_GET['COID'];

$result = mysqli_query($con,"DELETE FROM competition WHERE COID=$coid ");


mysqli_close($con); //close database connection
header('Location: view_com.php'); //redirect the page 

?>