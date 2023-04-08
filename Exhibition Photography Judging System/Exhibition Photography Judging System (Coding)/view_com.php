<?php
  include("connection.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>View Competition</title>
        <link href="css/style-view.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9b370d88e4.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="nav">
        <i class="fa-solid fa-bars fa-2x"></i>
        <button type="button"><a href="view_ms.php">View/Edit/Delete Marking Scheme</button>
        <button type="button"><a href="insert_ms.php">Create Marking Scheme</button>
        <button type="button"><a href="view_com.php">View/Edit/Delete Competition</button>
        <button type="button"><a href="insert_com.php" >Create Competition</button>
        <button type="button"><a href="user_signup.php">Register Judge</button>
        <button type="button"><a href="view_par.php">Manage Participant</button>
        <a href="index.php"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
    </div>
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
            <button type="submit" name="search">SEARCH</button>
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
                    <td style="width:5%"><b>Edit</b></td>
                    <td style="width:5%"><b>Delete</b></td>
                </tr>
            </thead>
            
            <?php 
                include("connection.php");
                if(isset($_POST['search']))
                {
                    $caid = $_POST['caid'];
                    $sql = "SELECT * FROM competition 
                            JOIN user ON user.UID = competition.UID
                            WHERE CAID=$caid";
                    $sql_1 = "SELECT * FROM competition 
                                JOIN user ON user.UID = competition.UID
                                WHERE CAID=$caid";

                    $result = mysqli_query($con, $sql);
                    $result_1 = mysqli_query($con, $sql_1);
                    $row = mysqli_fetch_array($result_1);

                    if($row>0){
                        while ($row = mysqli_fetch_array($result))
                        {
            ?>  

            <tr>
                <td><?php echo $row['COID']; ?></td>
                <td><?php echo $row['COname']; ?></td>
                <td><?php echo $row['COdate']; ?></td>
                <td><?php echo $row['Uname']; ?></td>

                <?php
                echo "<td><a href=\"edit_com.php?COID="; //hyperlink to edit.php page with FID parameter
                echo $row['COID'];
                echo "\">Edit</a></td>";
                echo "<td><a href=\"delete_com.php?COID="; //hyperlink to delete.php page with FID parameter
                echo $row['COID'];
                echo "\" onClick=\"return confirm('Delete Competition ID "; //JavaScript to confirm the deletion of the record
                echo $row['COID'];
                echo " details?');\">Delete</a></td>";
                ?>
            </tr>

            <?php
                        }
                    }
                    else{
                        echo "<h2>Competition have not been set.</h2>";
                    }
                }
                mysqli_close($con);
            ?>
        </table>
    </div>
    </body>
</html>

