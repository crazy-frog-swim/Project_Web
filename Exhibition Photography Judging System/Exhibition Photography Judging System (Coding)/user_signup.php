<?php
include("connection.php");
if(isset($_POST["submit"])){
    $name=$_POST["user"];
    $pass=$_POST["password"];
    $role=$_POST["role"];
    
    $sql = "SELECT * FROM user WHERE Uname='$name'";
    $result = mysqli_query($con, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO user (Uname, Upassword, Urole)
                VALUES ('$name', '$pass', '$role')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('User Registration Completed.')</script>";
        }
    }
    else{
    echo "<script>alert('Name Already Exists. Please choose other name.')</script>"; 
        }
    
}     
?>

<!DOCTYPE html>
<html>
 <head>
    <title>Sign up</title>
    <link href="css/style-insert.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b370d88e4.js" crossorigin="anonymous"></script>
</head>
<body >
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
    <h1>Sign Up</h1>  
    <form method="post">
        <div class="form-bg">
            <div class="info">
                <label>Register Judge:</label>
                <input type="text" name="user" placeholder="User name" required>
            </div>
            <div class="info">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="info">
                <input type="hidden" name="role" value="judger">
            </div>
            <div class="button">
                <button type="submit" name="submit">Sign up</button>
            </div>  
        </div>
    </form>
</body>
</html>