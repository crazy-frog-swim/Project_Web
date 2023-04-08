<?php
	if(isset($_POST["update"])){
		include("connection.php");

		$sql = "UPDATE marking_scheme SET  
                MSdescription='$_POST[msdescription]'

                WHERE MSID=$_POST[msid];";
        //echo $sql;
		if (mysqli_query($con, $sql)) {
		mysqli_close($con);
		echo "<script>
                alert('Record updated!'); 
                window.location.href='view_ms.php';
            </script>";
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Marking Scheme</title>
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
    <h1>Update Marking Scheme</h1>  

	<?php
		include("connection.php");
        $msid= $_GET['MSID'];
        $result = mysqli_query($con, 
                "SELECT * FROM marking_scheme 
                JOIN category ON category.CAID = marking_scheme.CAID 
                WHERE MSID='$msid' ");
        while($row = mysqli_fetch_array($result))
		{
	?>

    <form method="POST">
        <div class="form-bg">
            <input type="hidden" name="msid" value="<?php echo $row['MSID']; ?>">
            
            <div class="label">
                <label>Marking Scheme ID:</label>
                <p><?php echo $row["MSID"] ?></p>
            </div>
            
            <div class="info">
                <label>Marking Scheme Description:</label>
                <input type="text" value="<?php echo $row["MSdescription"] ?>" name="msdescription" required>
            </div>
            
            <div class="label">
                <label>Category:</label>
                <p><?php echo $row["Cname"] ?></p>
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