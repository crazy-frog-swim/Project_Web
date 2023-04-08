<?php
  session_start();
  include("connection.php");
  include("function.php");

  $user_data = check_login($con);
?>


<?php
	if(isset($_POST["update"])){
		include("connection.php");

		$sql = "UPDATE food SET  
                Fbrand='$_POST[fbrand]',
                Fname='$_POST[fname]',
                Fdesciption='$_POST[fdesciption]',
                Fprice=$_POST[fprice]

                WHERE FID='$_POST[fid]';";
        //echo $sql;
		if (mysqli_query($con, $sql)) {
		mysqli_close($con);
		echo "<script>
                alert('Record updated!'); 
                window.location.href='delete-edit-food.php';
            </script>";
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Pets@home</title>
    <link href="css/style-edit.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav>
        <div class="logo">
            <h2>Pets@home</h2>
            <div class="paw">
            <i class="fas fa-paw"></i>
            </div>
        </div>

        <ul class="nav-links">
            <li><a href="admin.php">Home</a></li>
            <li class="view"><a href="#view">View</a>
                <ul>
                    <li><a href="view_wet.php">Food</a></li>
                </ul>
            </li>

            <li class="insert"><a href="#insert">Insert</a>
                <ul>
                    <li><a href="insert.php">Food</a></li>
                </ul>
            </li>

            <li class="delete"><a href="#delete">Delete</a>
                <ul>
                    <li><a href="delete-edit-food.php">Food</a></li>
                </ul>
            </li>

            <li class="update"><a href="#update">Update</a>
                <ul>
                    <li><a href="delete-edit-food.php">Food</a></li>
                </ul>
            </li>

            <li><a href="logout.php">Logout</a></li>
            
        </ul>
    </nav>

    <div class="topic">
        <br><br><br>
        <h1>UPDATE DATA</h1>
    </div>
	<?php
		include("connection.php");
        $fid= $_GET['FID'];
        $result = mysqli_query($con, "SELECT * FROM food WHERE FID='$fid' ");
        while($row = mysqli_fetch_array($result))
		{
	?>

	<div class="form">
    <form method="POST">
        <input type="hidden" name="fid" value="<?php echo $row['FID']; ?>">
        <div class="img">
        <?php
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="10%" width="10%" />';
        ?>
        </div>
        <br>
        
        <div class="label">
        <label>Food ID:</label>
        <ul><?php echo $row["FID"] ?></ul>
        <br><br>
        </div>

        <div class="label">
        <label>Food Brand:</label>
        <ul><input type="integer" value="<?php echo $row["Fbrand"] ?>" name="fbrand" required></ul>
        <br><br>
        </div>

        <div class="label">
        <label>Food Name:</label>
        <ul><input type="integer" value="<?php echo $row["Fname"] ?>" name="fname" required></ul>
        <br><br>
        </div>

        <div class="label">
        <label>Food Description:</label>
        <ul><input type="integer" value="<?php echo $row["Fdesciption"] ?>" name="fdesciption" required></ul>
        <br><br>
        </div>

        <div class="label">
        <label>Price:</label>
        <ul><input type="integer" value="<?php echo $row["Fprice"] ?>" name="fprice" required></ul>
        <br><br>
        </div>
        
        <!--button-->
        <button type="submit" name="update"><b>Update</b></button>
    </form>
    </div>

	<?php
	}
	mysqli_close($con);
	?>
</body>
</html>