<?php

include("connection.php");

//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$msid= $_GET['MSID'];
echo "real";
$result = mysqli_query($con,"DELETE FROM marking_scheme WHERE MSID=$msid ");


mysqli_close($con); //close database connection
header('Location: view_ms.php'); //redirect the page 

?>