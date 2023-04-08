<?php
  include("connection.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Participant View Competition</title>
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
    <div class="navigation">
        <a href="index.php">Home</a>
        <a href="participant_register.php">Register Competition</a>
        <a href="participant_view_com.php">Competition Detail</a>
        <div class="navigation-right">
        <a href="user_login.php">Login</a>
        </div>
    </div>
    <div class="bg">
        <div class="option">
            <form method="POST">
                <label>Competition Category:</label>
                <select name="caid">
                    <?php
                        $sql = "SELECT * FROM category";

                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="'.$row['CAID'].'">'.$row['Cname'].'</option>';
                        }
                    ?>
                </select>

                <!--button-->
                <button type="submit" name="search"><b>SEARCH</b></button>
            </form>
            
            <br>
            
            <form class="category">
            <b><label>Category:</label>
            <?php
                if(isset($_POST['search']))
                {
                    $caid = $_POST['caid'];
                    $sql = "SELECT * FROM category WHERE CAID=$caid";

                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo $row['Cname'];
                    }
                }
            ?></b>
            </form>
        </div>
        
        <br>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <td style="width:12%"><b>Competition ID</b></td>
                        <td style="width:43%"><b>Competition Name</b></td>
                        <td style="width:15%"><b>Date (YYYY-MM-DD)</b></td>
                        <td style="width:10%"><b>Judger</b></td>
                    </tr>
                </thead>
                
                <?php 
                    include("connection.php");
                    if(isset($_POST['search']))
                    {
                        $caid = $_POST['caid'];
                        $today = date('Y-m-d');
                        $sql = "SELECT * FROM competition 
                                JOIN user ON user.UID = competition.UID
                                WHERE CAID=$caid";
                        
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result) AND $row['COdate']>$today)
                        {
                ?>  

                <tbody>
                    <tr>
                        <td><?php echo $row['COID']; ?></td>
                        <td><?php echo $row['COname']; ?></td>
                        <td><?php echo $row['COdate']; ?></td>
                        <td><?php echo $row['Uname']; ?></td>
                    </tr>
                </tbody>

                <?php
                        }
                    }
                    mysqli_close($con);
                ?>
            </table>
        </div>
    </div>

    </body>
</html>

