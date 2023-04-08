<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mark</title>
    <link href="css/style_m.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b370d88e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav">
        <i class="fa-solid fa-bars fa-2x"></i>
        <button type="button"><a href="update_mark.php">Update Mark</button>
        <!-- <button type="button"><a href="judger_par.php">Manage Participant</button> -->
        <a href="index.php"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
    </div>
	<div class="option">
        <form method="POST">
            <label>Competition Name:</label>
            <select name="coid">
                <?php
                    $sql = "SELECT * FROM competition";

                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['COID'].'">'.$row['COname'].'</option>';
                    }
                ?>
            </select>

            <!--button-->
            <button type="submit" name="search">SEARCH</button>
        </form>
        
        <br>
        
        <form class="category">
        <b><label>Competition Name:</label>
        <?php
            if(isset($_POST['search']))
            {
                $coid = $_POST['coid'];
                $sql = "SELECT * FROM competition WHERE COID=$coid";

                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo $row['COname'];
                }
            }
        ?></b>
        </form>
    </div>
    
	<div class="container">
		<?php 
            include("connection.php");
            if(isset($_POST['search']))
            {
                $caid = $_POST['coid'];
                $sql = "SELECT * FROM participant 
                        WHERE COID=$coid";

                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result))
                {
        ?>  

		<form method="post">
            <input type="hidden" name="coid" value="<?php echo $row['COID']; ?>">
            <div class="find">
            <label>Participant Name:</label>
            <select name="pid">
                <?php
                    $coid = $_POST['coid'];
                    $sql = "SELECT * FROM participant WHERE COID=$coid";

                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['PID'].'">'.$row['Pname'].'</option>';
                    }
                ?>
            </select>
            <button type="submit" class="btn btn-primary" name="find">FIND</button>
        </div>  
            <br>
            <?php
                    }
                }
                        mysqli_close($con)
            ?>
	    </form>

        <?php
                include("connection.php");
                if(isset($_POST['find']))
                {
                    $coid = $_POST['coid'];
                    $pid = $_POST['pid'];
                    $sql = "SELECT * FROM participant WHERE COID=$coid AND PID=$pid";
                    $sql_2 = "SELECT * FROM competition WHERE COID=$coid";
                    $sql_3 = "SELECT * FROM mark WHERE PID=$pid";

                    $result = mysqli_query($con, $sql);
                    $result_2 = mysqli_query($con, $sql_2);
                    $result_3 = mysqli_query($con, $sql_3);
                    $row = mysqli_fetch_array($result_3);

                    if($row>0){
                        echo "<h2>Mark had given for this participant</h2>";
                    }
                    else{
                        while ($row = mysqli_fetch_array($result))
                        {
            ?>

        <form method="post">
            <div class="form-bg">
                <input type="hidden" name="pid" value="<?php echo $row['PID']; ?>">
                
                <div class="label">
                    <label>Participant ID:</label>
                    <p><?php echo $row["PID"] ?></p>
                </div>

                <div class="label">
                    <label>Participant Name:</label>
                    <p><?php echo $row["Pname"] ?></p>
                </div>

                <div class="label">
                    <label>Photo Description:</label>
                    <p><?php echo $row["Pdescription"] ?></p>
                </div>
                
                <div class="label">
                    <label>Competition Name:</label>
                <p><?php
                            }
                            while ($row = mysqli_fetch_array($result_2))
                            {
                                echo $row['COname'];
                            }
                        
                ?></p>
                </div>

                <div class="info">
                    <label>Mark:</label>
                    <input type="text" name="mark" required>
                </div>
                <br>
                <div class="button">
                    <button type="submit" name="submit">SUBMIT</button>
                </div>
            </div>
            <br><br>
	    </form>

		<?php
                    }
                }
            mysqli_close($con);
        ?>
	</div>


    <?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $sql="INSERT INTO mark (mark, PID)
                VALUES
                ('$_POST[mark]','$_POST[pid]')";
        
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
        }
        else {
            echo '<script>alert("Record added!");
            window.location.href = "update_mark.php";
            </script>';
            }
        
        mysqli_close($con);
        
    }
    ?>
	
    
</body>
</html>

