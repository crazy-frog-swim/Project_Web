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
    <link href="css/style-view.css" rel="stylesheet">
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

    <div class="main">
    <div class="sidenav">  
        <ul>
            <br><br><br>
            <li><a href="view_wet.php">Wet Food</a></li>
            <li><a href="view_denchew.php">Dental Chew</a></li>
            <li><a href="view_dehy.php">Dehydrated Food</a></li>
            <li><a href="view_vit.php">Vitamin</a></li>
            <li><a href="view_treats.php">Treats</a></li>
        </ul>
    </div>
    

    <div class="body">
    <!--DOG TABLE-->
    <div class="topic">
        <h1>Dehydrated Food - DOG</h1>
    </div>
    
    <table width="80%" class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:20%"><b>Image</b></td>
        </tr>

        <?php
        include "connection.php";
        $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage 
                FROM food WHERE CID='C001' AND FTID='FT003' " ;
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
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>
    
    <!--CAT TABLE-->
    <div class="topic">
        <h1>Dehydrated Food - CAT</h1>  
    </div>
    
    <table width="80%" class="center" >
        <tr>
            <td style="width:5%"><b>ID</b></td>
            <td style="width:10%"><b>Brand</b></td>
            <td style="width:10%"><b>Name</b></td>
            <td style="width:10%"><b>Price</b></td>
            <td style="width:30%"><b>Description</b></td>
            <td style="width:20%"><b>Image</b></td>
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
        </tr>

        <?php
        }
        mysqli_close($con);
        ?>
    </table>

    </div>
    </div>
</body>
</html>