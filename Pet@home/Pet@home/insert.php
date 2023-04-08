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
    <link href="css/style-insert.css" rel="stylesheet">
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
        <h3>Insert Food</h3>
    </div>
    

    <form method="POST" enctype="multipart/form-data">
        <div class="info">
            <label>Food ID:</label>
            <input type="text" name="fid" required>

            <label>Food Brand:</label>
            <input type="text" name="fbrand" required>

            <label>Food Name:</label>
            <input type="text" name="fname" required>

            <label>Food Price:</label>
            <input type="number" name="fprice" step="0.10" required>

            <label>Food Description:</label>
            <input type="text" name="fdesciption" required>
        </div>
        
        <div class="option">
            <label>Food Type:</label>
            <select name="ftid" required>
                    <option value="">Please select</option>
                    <option value="FT001">Wet Food</option>
                    <option value="FT002">Dental Chew</option>
                    <option value="FT003">Dehyfrated Food</option>
                    <option value="FT004">Vitamins</option>
                    <option value="FT005">Treats</option>
            </select>
            <br><br>

            <label>Food Category:</label>
            <select name="cid" required>
                    <option value="">Please select</option>
                    <option value="C001">Dog</option>
                    <option value="C002">Cat</option>
                    <option value="C003">Aquatic Animal</option>
                    <option value="C004">Small Animal</option>
            </select>
            <br><br>

            <label>Food Image:</label>
            <input class="file" type="file" name="fimage" required>
            <br><br>
        </div>

        <!--button-->
        <div class="button">
            <input type="submit" value="Submit" name="upload">
            <input type="reset" value="Reset">
        </div>
    </form>



    <?php
    include("connection.php");
    if(isset($_POST['upload'])){
        $fid = $_POST['fid'];
        $query = "SELECT * FROM food WHERE FID='$fid'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result)==0){
            $file = addslashes(file_get_contents($_FILES["fimage"]["tmp_name"]));
            $sql="INSERT INTO food (FID, Fbrand, Fname, Fprice, Fdesciption, Fimage, FTID, CID)
            VALUES
            ('$_POST[fid]','$_POST[fbrand]','$_POST[fname]','$_POST[fprice]', 
            '$_POST[fdesciption]', '$file', '$_POST[ftid]','$_POST[cid]')";
            if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
            }
            else {
                echo '<script>alert("1 record added!");
                window.location.href = "insert.php";
                </script>';
            }
        }
        else if (mysqli_num_rows($result)==1){
            echo '<script>alert("ID BEEN USE!!!!!\n\n CHOOSE OTHER ID!!!!");
                window.location.href = "insert.php";
                </script>';
        }
        mysqli_close($con);
        
    }
    ?>
    
    </body>
</html>