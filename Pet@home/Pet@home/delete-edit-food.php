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
    <link href="css/style-delete.css" rel="stylesheet">
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


    <!--WET FOOD - DOG TABLE-->
    <br><br><br><br>
    <h1>Wet Food</h1>
    <br><br>
    <h3>Dog</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C001' AND FTID='FT001' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    <!--WET FOOD - CAT TABLE-->
    <br><br>
    <h3>Cat</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C002' AND FTID='FT001' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>


    <!--DENTAL CHEW - DOG TABLE-->
    <br><br><br><br>
    <h1>Dental Chew</h1>
    <br><br>
    <h3>Dog</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C001' AND FTID='FT002' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    <!--DENTAL CHEW - CAT TABLE-->
    <br><br>
    <h3>Cat</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C002' AND FTID='FT002' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>


    <!--DEHYRRATED FOOD - DOG TABLE-->
    <br><br><br><br>
    <h1>Dehydrated Food</h1>
    <br><br>
    <h3>Dog</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C001' AND FTID='FT003' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    <!--DEHYRRATED FOOD - CAT TABLE-->
    <br><br>
    <h3>Cat</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C002' AND FTID='FT003' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>


    <!--VITAMIN - DOG TABLE-->
    <br><br><br><br>
    <h1>Vitamin</h1>
    <br><br>
    <h3>Dog</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C001' AND FTID='FT004' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    <!--VITAMIN - CAT TABLE-->
    <br><br>
    <h3>Cat</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C002' AND FTID='FT004' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>


    <!--TREATS - DOG TABLE-->
    <br><br><br><br>
    <h1>Treats</h1>
    <br><br>
    <h3>Dog</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C001' AND FTID='FT005' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    <!--TREATS - CAT TABLE-->
    <br><br>
    <h3>Cat</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C002' AND FTID='FT005' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>    

    <!--TREATS - AQUATIC ANIMAL TABLE-->
    <br><br><br><br>
    <h1>Aquatic Animal</h1>
    <br><br>
    <h3>Dog</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C003' AND FTID='FT005' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    <!--TREATS - SMALL TABLE-->
    <br><br>
    <h3>Small Animal</h3>
    <table class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:15%"><b>Image</b></td>
            <td style="width:8%"><b>Edit</b></td>
            <td style="width:8%"><b>Delete</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C004' AND FTID='FT005' " ;
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <tr>
            <td><?php echo $row['FID']; ?></td>
            <td><?php echo $row['Fbrand']; ?></td>
            <td><?php echo $row['Fname']; ?></td>
            <td><?php echo $row['Fprice']; ?></td>
            <td><?php echo $row['Fdesciption']; ?></td>
            <?php
            echo "<td>";
            echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
            height="30%" width="30%" />';
            echo "</td>";
            ?>
            
            <?php
            echo "<td><a href=\"edit-food.php?FID="; //hyperlink to edit.php page with FID parameter
            echo $row['FID'];
            echo "\">Edit</a></td>";
            echo "<td><a href=\"delete-food.php?FID="; //hyperlink to delete.php page with FID parameter
            echo $row['FID'];
            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
            echo $row['FID'];
            echo " details?');\">Delete</a></td>";
            ?>
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table> 
</body>
</html>