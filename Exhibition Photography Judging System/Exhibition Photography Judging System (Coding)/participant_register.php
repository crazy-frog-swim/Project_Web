<?php
include("connection.php");
if(isset($_POST["submit"])){
    $name=$_POST["user"];
    $coid=$_POST["coid"];
    $description=$_POST["participant_description"];
    
    $sql = "SELECT * FROM participant WHERE Pname='$name' AND COID=$coid";
    $result = mysqli_query($con, $sql);
    

    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO participant (Pname, COID, PDescription)
                VALUES ('$name', '$coid', '$description')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>
                    alert('Register successful!'); 
                    window.location.href='index.php';
                </script>";
        }
    }
    else{
    echo "<script>alert('Name Already Exists. Please choose other name to register.')</script>"; 
        }

}     
?>


<!DOCTYPE html>
<html>
 <head>
    <title>Participant Register</title>
    <link rel="stylesheet" type="text/css" href="./style.css" >
</head>
<body >
    <div class="navigation">
        <a href="index.php">Home</a>
        <a href="participant_register.php">Register Competition</a>
        <a href="participant_view_com.php">Competition Detail</a>
        <div class="navigation-right">
        <a href="user_login.php">Login</a>
        </div>
    </div>
    <div class="reg-form" style="background-image: url(./images/bg-img2.jpg);">
        <div class="login-bg">
            <div class="login-back">    
                <!-- <h1>Participant Register<h1> -->
                <form method="post">
                    <div class="title">
                        <h1>Registration<h1>
                    </div>
                    <input type="text" name="user" placeholder="Name" required>
                    <div class="title">
                        <h2>Competition Category:</h2>
                    </div>
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
                    <input type="text" name="participant_description" placeholder="Description" required>
                    <button type="submit" name="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>