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
    <link href="css/style-food.css" rel="stylesheet">
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
            <li><a href="home.php">Home</a></li>
            <li class="shop"><a href="#shop">Shop</a>
                <ul>
                    <li><a href="wet_dog.php">Food</a></li>
                </ul>
            </li>

            <li class="shop"><a href="#"><?php echo $user_data['username']; ?></a>
            <ul>
                <li><a href="shoppingcart.php">Shopping Cart</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </li>
        </ul>
    </nav>

    <div class="topic">
        <br><br><br><br>
        <h1>DEHYDRATED FOOD - CAT</h1>
        <br>
    </div>

    <div class="main">
    <div class="dropdown">
        <span class="dropbtn"><b>Wet Food</b></span>
        <div class="dropdown-content">
        <a href="wet_dog.php">Dog</a>
        <a href="wet_cat.php">Cat</a>
        </div>
        <br><br><br><br><br><br><br>
        <span class="dropbtn"><b>Dental Chew</b></span>
        <div class="dropdown-content">
        <a href="denchew_dog.php">Dog</a>
        <a href="denchew_cat.php">Cat</a>
        </div>
        <br><br><br><br><br><br><br>
        <span class="dropbtn"><b>Dehydrated Food</b></span>
        <div class="dropdown-content">
        <a href="dehy_dog.php">Dog</a>
        <a href="dehy_cat.php">Cat</a>
        </div>
        <br><br><br><br><br><br><br>
        <span class="dropbtn"><b>Vitamin</b></span>
        <div class="dropdown-content">
        <a href="vit_dog.php">Dog</a>
        <a href="vit_cat.php">Cat</a>
        </div>
        <br><br><br><br><br><br><br>
        <span class="dropbtn"><b>Treats</b></span>
        <div class="dropdown-content">
        <a href="treats_dog.php">Dog</a>
        <a href="treats_cat.php">Cat</a>
        <a href="treats_aa.php">Aquatic Animal</a>
        <a href="treats_sm.php">Small Animal</a>
        </div>
    </div>

    <div class="body">
    <?php
    include "connection.php";
    $sql = "SELECT FID, Fbrand, Fname, Fprice, Fdesciption, Fimage FROM food WHERE CID='C002' AND FTID='FT003' " ;
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result))
    {
    ?>

    <div class="product">
        <?php
        echo '<img class="enlarge" src="data:image/jpeg;base64,'.base64_encode($row['Fimage']).'" 
        height="200px" width="125px"/>'
        ?>

        <form method="POST">
            <input type="hidden" name="fid" 
            value="<?php echo $row['FID'];?>" >
            <div class="desc">
                <h3><b>Brand Name</b></h3>
                <h4>
                    <?php echo $row['Fbrand']; 
                    echo "&nbsp;- "; 
                    echo $row['Fname']; 
                    echo "<br>";
                    echo "<br>"; ?>
                </h4>

                <h3><b>Price</b></h3>
                <h4>
                    <?php echo "RM "; echo $row['Fprice']; 
                    echo "<br>";
                    echo "<br>"; ?>
                </h4>
                <input type="hidden" name="price" 
                value="<?php echo $row['Fprice'];?>" >
                
                <h3><b>Description</b></h3>
                <h4>
                    <?php echo $row['Fdesciption']; ?>
                </h4>
            </div>
            <div class="row">
            <h3>Quantity</h3>
            <?php
                if(isset($_POST["fquantity"])){
                    $_SESSION['clicks'] += 1 ;
                }else{
                    $_SESSION['clicks'] = 1;
                }
            ?>
                <input type="number" class="quantity" name="fquantity" value=<?php echo $_SESSION['clicks'];?> >
                <!--<input type="submit" value="Add to Shopping Cart" >-->
                <button type="submit" name="add-to-cart">Add to Shopping Cart</button>
            </div>
        </form>
        <br>
    </div>

    <?php
        if(isset($_POST["add-to-cart"])){
            include("connection.php");
            $uid= $user_data['UID'];
            $new = $_POST['fquantity'];
            $status = 'on-going';
            echo $new;
            $sql="INSERT INTO shoppingcart (UID, FID, Fquantity, Fprice, status)
                VALUES
                ('$uid','$_POST[fid]','$new','$_POST[price]','$status')";
            $result = mysqli_query($con, $sql);
            if($result){
                mysqli_close($con);
                echo "<script>
                        alert('Item add to shopping cart successful!!!'); 
                        window.location.href='dehy_cat.php';
                    </script>";
            }
        }
    ?>

    <?php
    }
    mysqli_close($con);
    ?>

    </div>
    </div>
</body>
</html>