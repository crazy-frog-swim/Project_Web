<?php
  session_start();
  include("connection.php");
  include("function.php");

  $user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pets@home</title>
    <link href="css/style-admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous">
    </script>
    <style>
        .bg{
            background: rgba(0,0,0,0.7) url('images/catbg.jpg');
            height: 100vh;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: darken;
        }
    </style>
</head>

<body>
    <div class="bg">
        <h1>WELCOME BACK, <br> <?php echo $user_data['username']; ?></h1>
    </div>

    <nav>
        <div class="logo">
            <h2>Pets@home</h2>
            <div class="paw">
            <i class="fas fa-paw"></i>
            </div>
        </div>

        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
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
</body>
</html>

