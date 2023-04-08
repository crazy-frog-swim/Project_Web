<!--KOO connection.php-->
<?php
  /*
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "pet_shop";

  $con = mysqli_connect($host,$user,$password,$db);
  if(!$con)
  {
    die("Connection Error");
  }
  */
?>

<!--LIM conn.php-->
<?php
    $con = mysqli_connect("localhost","root", "" ,"pet_shop", "3307");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
?>