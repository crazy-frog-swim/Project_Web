<?php

include("connection.php");

//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$fid= $_GET['FID'];

$result = mysqli_query($con,"DELETE FROM food WHERE FID='$fid' ");


mysqli_close($con); //close database connection
header('Location: delete-edit-food.php'); //redirect the page to delete.php page

?>

