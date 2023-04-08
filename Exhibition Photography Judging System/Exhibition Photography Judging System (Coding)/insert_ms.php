<?php
  include("connection.php");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Insert Marking Scheme</title>
    <link href="css/style-insert.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b370d88e4.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="nav">
        <i class="fa-solid fa-bars fa-2x"></i>
        <button type="button"><a href="view_ms.php">View/edit/delete Marking Scheme</button>
        <button type="button"><a href="insert_ms.php">Create Marking Scheme</button>
        <button type="button"><a href="view_com.php">View/edit/delete Competition</button>
        <button type="button"><a href="insert_com.php" >Create Competition</button>
        <button type="button"><a href="user_signup.php">Register Judge</button>
        <button type="button"><a href="view_par.php">Manage Participant</button>
        <a href="index.php"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
    </div>
    <br>
    <h1>Insert Marking Scheme</h1>    

    <form method="POST">
        <div class="form-bg">
            <div class="info">
                <label>Marking Scheme Description:</label>
                <input type="text" name="msdescription" required>
            </div>
            
            <div class="option">
                <label>Category:</label><br>
                <select name="caid" required>
                    <?php
                        $sql = "SELECT * FROM category";

                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="'.$row['CAID'].'">'.$row['Cname'].'</option>';
                        }
                    ?>
                </select>
                <br><br>
            </div>
            <!--button-->
            <div class="button">
                <input type="submit" value="Submit" name="upload">
            </div>
        </div>
        <br><br>
    </form>


    <?php
    include("connection.php");
    if(isset($_POST['upload'])){
        $sql="INSERT INTO marking_scheme (MSdescription, CAID)
                VALUES
                ('$_POST[msdescription]',$_POST[caid])";
        
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
        }
        else {
            echo '<script>alert("1 record added!");
            window.location.href = "view_ms.php";
            </script>';
            }
        
        mysqli_close($con);
        
    }
    ?>
    
    </body>
</html>