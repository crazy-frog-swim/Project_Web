<?php
  session_start();
  include("connection.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con,$sql);
    if ($result && mysqli_num_rows($result) > 0){
      $user_data = mysqli_fetch_assoc($result);
      if ($user_data['role'] == "customer"){
        $_SESSION['username'] = $user_data['username'];
        header("Location: home.php");
        die;
      }
      elseif ($user_data['role'] == "admin"){
        $_SESSION['username'] = $user_data['username'];
        header("Location: admin.php");
        die;
      }
    }
    else{
      header("Location: login.php?error=invalidinformation");
      exit();
    }
  }
?>


<!DOCTYPE html>
<html lang= "en" dir="ltr">
  <head>
  <meta charset="utf-8">
    <title>Login</title>
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
            <div class="txt-input">
              <label>Password</label>
              <input type="password" name="password" required>
            </div>
            <div class="error">
              <?php
                if (isset($_GET["error"])){
                  if ($_GET["error"] == "invalidinformation"){
                    echo "<p>Wrong username or password!</p>";
                  }
                }
                ?>
            </div>
            <div class="error">
                <?php
                  if (isset($_GET["error"])){
                    if ($_GET["error"] == "unverifiedsession"){
                      echo "<p>You have to login first!</p>";
                    }
                  }
                  ?>
            </div>
            <div class="success">
                <?php
                  if (isset($_GET["success"])){
                    if ($_GET["success"] == "verified"){
                      echo "<p>Your account has been created successfully!</p>";
                    }
                  }
                  ?>
            </div>
            <div class="box">
              <input type="submit" class="login-btn" value="Login">
              <div class="signup-link">
                Not a member? <a href="register.php">SIGNUP</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </body>
</html>