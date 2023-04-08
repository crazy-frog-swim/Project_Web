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
      <h1>Your Shopping Cart</h1>
    </div>
    <div>
    <form action="" method="post">
      <table class="table">
        <?php
          $id = $user_data['UID'];
          $query = "SELECT * FROM food INNER JOIN shoppingcart ON food.FID = shoppingcart.FID WHERE UID = '$id'";
          $result = mysqli_query($con, $query);
          if($result && mysqli_num_rows($result) > 0){
        ?>
        <tr class="set">
          <th>Item Name</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <!-- <th></th> -->
        </tr>
        <?php
            $total_price = 0;
            while($cart = mysqli_fetch_assoc($result)){
              if($cart['status'] == "on-going"){
                $total = ($cart['Fprice'] * $cart['Fquantity']);
                $total = number_format($total, 2);
                $total_price = $total_price + $total;
                $total_price = number_format($total_price, 2);
        ?>
        <tr>
          <td class="product">
            <?php 
              echo '<img src="data:image/jpeg;base64,'.base64_encode($cart['Fimage']).'" width="120" height="150">';
              echo $cart['Fname']; 
            ?>
          </td>
          <td><?php echo "RM{$cart['Fprice']}"; ?></td>
          <td><?php echo $cart["Fquantity"]; ?></td>
          <td><?php echo "RM$total"; ?></td>
          <td><?php echo "<a class=remove href=shoppingcart.php?action={$cart['SCID']}>Remove</a>"; ?></td>
        </tr>
        <?php
          if(isset($_GET['action'])){
            if($_GET['action'] == "{$cart['SCID']}"){
              $idd = $cart['SCID'];
              $sql = "DELETE FROM shoppingcart WHERE UID = '$id' AND SCID = '$idd'";
              $res = mysqli_query($con,$sql);
              if($res){
                echo '<script>window.location="shoppingcart.php"</script>';
              }
              else{
                echo 'Error occured';
              }
            }
          }elseif(isset($_POST["checkout"])){
            $sql = "SELECT * FROM shoppingcart WHERE UID='$id'";
            $result = mysqli_query($con,$sql);
            if($result && mysqli_num_rows($result) > 0){
              mysqli_close($con);
              echo "<script>
                      alert('Checking out!'); 
                      window.location.href='payment.php';
                  </script>";
          }
          }
        ?>
            <?php
              }
            }
            // $sql = "SELECT SUM(Fprice), SUM(Fquantity) FROM shoppingcart WHERE UID = '$id'";
            // $result = mysqli_query($con,$sql);
            // if($result){
            //   foreach($result as $row){
            //     echo $row['SUM(Fprice)'] * $row['SUM(Fquantity)'] ;
            //   }
            // }
            ?>
        <div class="history">
          <a href="purchasehistory.php">View Purchase History</a>
        </div>
      </table>
        <div class="total">
          <?php echo "Total: RM$total_price"; ?>
        </div>
            <!-- </form> -->
        <div class="cont">
            <input type=submit class=checkout name=checkout value=Checkout>
        </div>
        <?php
          // if(isset($_POST["checkout"])){
          //   $idd = $cart['SCID'];
          //   $new = $_POST['fquantity'];
          //   $sql = "UPDATE shoppingcart SET Fquantity = '$new' WHERE SCID = '$idd'";
          //   $result = mysqli_query($con,$sql);
          //   if($result){
          //     mysqli_close($con);
          //     echo "<script>alert('Checking Out...'); window.location.href='shoppingcart.php';</script>";
          //     }
          // }
        ?>
    </form>
            <?php
          }
          else{
        ?>
          <div class="container">
            <p class="msg"><?php echo "It looks like you haven't make any purchases at all"; ?></p>
            <div class="btn">
                  <a href="home.php#shop">go shopping now</a>
            </div>
          </div>
        <?php 
          }
        ?>
    </body>
</html> 