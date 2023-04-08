<?php
  include("connection.php");
?>


<?php
	if(isset($_POST["update"])){
		include("connection.php");

		$sql = "UPDATE competition SET  
                COname='$_POST[coname]',
                COdate='$_POST[codate]'

                WHERE COID=$_POST[coid];";
        //echo $sql;
		if (mysqli_query($con, $sql)) {
		mysqli_close($con);
		echo "<script>
                alert('Record updated!'); 
                window.location.href='view_com.php';
            </script>";
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Competition</title>
    <link href="css/style-edit.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b370d88e4.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="nav">
        <i class="fa-solid fa-bars fa-2x"></i>
        <button type="button"><a href="view_ms.php">View/Edit/Delete Marking Scheme</button>
        <button type="button"><a href="insert_ms.php">Create Marking Scheme</button>
        <button type="button"><a href="view_com.php">View/Edit/Delete Competition</button>
        <button type="button"><a href="insert_com.php" >Create Competition</button>
        <button type="button"><a href="user_signup.php">Register Judge</button>
        <button type="button"><a href="view_par.php">Manage Participant</button>
        <a href="index.php"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
    </div>
    <br>
    <h1>Update Competition</h1>  

	<?php
		include("connection.php");
        $coid= $_GET['COID'];
        $result = mysqli_query($con, 
                "SELECT * FROM competition 
                JOIN user ON user.UID = competition.UID 
                JOIN category ON category.CAID = competition.CAID 
                WHERE COID='$coid' ");
        while($row = mysqli_fetch_array($result))
		{
	?>

    <form method="POST">
        <div class="form-bg">
            <input type="hidden" name="coid" value="<?php echo $row['COID']; ?>">

            <div class="label">
                <label>Competition ID:</label>
                <p><?php echo $row["COID"] ?></p>
            </div>
            
            <div class="info">
                <label>Competition Name:</label>
                <input type="text" value="<?php echo $row["COname"] ?>" name="coname" required>
            </div>
            
            <div class="date">
                <label>Date (DD-MMM-YYYY):</label>
                <input type="date" value="<?php echo $row["COdate"] ?>" name="codate" required>
            </div>
            
            <div class="label">
                <label>Category:</label>
                <p><?php echo $row["Cname"] ?></p>
            </div>
            
            <div class="label">
                <label>Judger:</label>
                <p><?php echo $row["Uname"] ?></p>
            </div>
            <br>
            <div class="button">
                <button type="submit" name="update">Update</button>
            </div>
        </div>
        <br><br>
    </form>

	<?php
	}
	mysqli_close($con);
	?>
</body>
</html>