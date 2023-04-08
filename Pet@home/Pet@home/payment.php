<?php
  session_start();
  include("connection.php");
  include("function.php");

  $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Pets@home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="logo">
            <h1>Pets@home</h1>
            <div class="paw">
            <i class="fas fa-paw"></i>
            </div>
        </div>

        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li class="shop"><a href="#shop">Shop</a>
                <ul>
                    <li><a href="#accessory">Accessory</a></li>
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
    <div class="container">
        <h1>Checkout</h1>
        <form action="" method="post">
        <div class="info">
            <div class="cards">
                <img src="./images/mc.png" alt="">
                <img src="./images/vi.png" alt="">
                <img src="./images/pp.png" alt="">
            </div>
            <div class="cardholder">
                <input type="integer" class="field" placeholder="Cardholder's name"required>
            </div>
            <div class="cardnum">
                <input type="text" class="field" placeholder="Card Number" maxlength="19" required>
            </div>
            <div class="row">
                <div class="cvv">
                    <input type="integer" class="field" placeholder="CVV" maxlength="3" required>
                    <a href="./images/cvv.jpg">what is cvv?</a>
                </div>
                <div class="row">
                <select name="months" id="months">
                    <option value="Jan">Jan</option>
                    <option value="Feb">Feb</option>
                    <option value="Mar">Mar</option>
                    <option value="Apr">Apr</option>
                    <option value="May">May</option>
                    <option value="Jun">Jun</option>
                    <option value="Jul">Jul</option>
                    <option value="Aug">Aug</option>
                    <option value="Sep">Sep</option>
                    <option value="Oct">Oct</option>
                    <option value="Nov">Nov</option>
                    <option value="Dec">Dec</option>
                </select>
                <select name="years" id="years">
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
                </div>
            </div>
        </div>
        <div class="pay">
            <input type="submit" class="button" name="confirm" value=confirm>
        </div>
            <?php
                if(isset($_POST["confirm"])){
                    $id = $user_data['UID'];
                    $query = "UPDATE shoppingcart SET status = 'delivered' WHERE UID = '$id' AND status = 'on-going'";
                    $result = mysqli_query($con, $query);
                    if($result){
                        echo "<script>
                            alert('Payment Success!'); 
                            window.location.href='shoppingcart.php';
                        </script>";
                    }
                }
            ?>
        </form>
    </div>
    </body>
</html>