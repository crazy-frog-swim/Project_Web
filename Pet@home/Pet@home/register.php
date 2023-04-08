<?php
  session_start();
  include("connection.php");
  include("function.php");

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = "customer";
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
      header("Location: register.php?error=taken");
	    exit();
    }
    else{
      $query = "INSERT INTO user(username,password,role) VALUES('$username','$password','$role')";
      $result2 = mysqli_query($con,$query);
      if($result2){
        header("Location: login.php?success=verified");
        exit();
      }
      else{
        header("Location: register.php?error=unknown");
        exit();
      }
    }
  }
?>


<!DOCTYPE html>
<html lang= "en" dir="ltr">
  <head>
  <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "css/style2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav>
        <div class="logo">
          <h1><a href="home.php">Pets@home</a></h1>
          <i class="paw fas fa-paw"></i>
        </div>
        <ul class="nav-links">
          <div class="block"></div>
        </ul>
    </nav>
      <div class="container1-active">
        <div class="pop-up">
          <div class="login-title">
            <h1>Pets@home</h1>
            <!-- <label for="show" class="close-btn fas fa-times"></label> -->
          </div>
          <form method="post" action="#">
            <div class="txt-input">
              <label>Username</label>
              <input type="text" name="username" required>
            </div>
            <div class = "txt-input">
              <label>Password</label>
              <input type="password" name="password" required>
            </div>
            <div class="error">
                <?php
                  if (isset($_GET["error"])){
                    if ($_GET["error"] == "unknown"){
                      echo "<p>Unknown error occured!</p>";
                    }elseif ($_GET["error"] == "taken"){
                      echo "<p>Username is taken!</p>";
                    }
                  }
                  ?>
            </div>
            <div class="box">
              <input type="submit" class="login-btn" value="Register">
              <div class="signup-link">
                Already member? <a href="login.php">LOGIN</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </body>
</html>