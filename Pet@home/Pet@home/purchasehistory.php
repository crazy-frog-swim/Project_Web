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
    <link rel="stylesheet" href="css/style3.css">
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

    <div class="content">
      <h1>Your Purchase History</h1>
    </div>
    <div>
      <table class="table">
        <?php
          $id = $user_data['UID'];
          $query = "SELECT * FROM food INNER JOIN shoppingcart ON food.FID = shoppingcart.FID WHERE UID = '$id'";
          $result = mysqli_query($con, $query);
          if($result && mysqli_num_rows($result) > 0){
        ?>
        <tr>
          <th>Item Name</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
        <?php
            $itemFound = FALSE;
            while($cart = mysqli_fetch_assoc($result)){
              if($cart['status'] == "delivered"){
                $total = ($cart['Fprice'] * $cart['Fquantity']);
                $total = number_format($total, 2);
        ?>
        <!-- <tr>
          <th>Item Name</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr> -->
        <tr>
          <td class="product"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($cart['Fimage']).'" width="120">';
                    echo $cart['Fname']; 
              ?>
          </td>
          <td><?php echo "RM{$cart['Fprice']}"; ?></td>
          <td><?php echo $cart['Fquantity']; ?></td>
          <td><?php echo "RM$total"; ?></td>
        </tr>
        <?php
              }
            }
            ?>
                  <div class="history">
                    <a href="shoppingcart.php">Back to your cart</a>
                  </div>
                </table>
              </div>
            <?php
          }
          else{
        ?>
            <p class="msg"><?php echo "There are no items in this cart"; ?></p>
            <div class="btn">
                  <a href="home.php#shop">go shopping now</a>
            </div>
        <?php 
          }
        ?>
    </body>
</html> 