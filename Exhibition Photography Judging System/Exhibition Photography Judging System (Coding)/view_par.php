<?php
  include("connection.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>View Participant</title>
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
            <label>Competition Name:</label>
            <select name="coid">
                <?php
                    $sql = "SELECT * FROM competition";

                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['COID'].'">'.$row['COname'].'</option>';
                    }
                ?>
            </select>

            <!--button-->
            <button type="submit" name="search">SEARCH</button>
        </form>
        
        <br>
        
        <form class="category">
        <b><label>Competition Name:</label>
        <?php
            if(isset($_POST['search']))
            {
                $coid = $_POST['coid'];
                $sql = "SELECT * FROM competition WHERE COID=$coid";

                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo $row['COname'];
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
                    <td style="width:10%"><b>Participant ID</b></td>
                    <td style="width:10%"><b>Participant Name</b></td>
                    <td style="width:10%"><b>Photo description</b></td>
                    <td style="width:5%"><b>Delete</b></td>
                </tr>
            </thead>

            <?php 
                include("connection.php");
                if(isset($_POST['search']))
                {
                    $coid = $_POST['coid'];
                    $sql = "SELECT * FROM participant 
                            WHERE COID=$coid";

                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {
            ?>  

            <tr>
                <td><?php echo $row['PID']; ?></td>
                <td><?php echo $row['Pname']; ?></td>
                <td><?php echo $row['Pdescription']; ?></td>

                <?php
                echo "<td><a href=\"delete_par.php?PID="; //hyperlink to delete.php page with FID parameter
                echo $row['PID'];
                echo "\" onClick=\"return confirm('Delete Participnat ID "; //JavaScript to confirm the deletion of the record
                echo $row['PID'];
                echo " details?');\">Delete</a></td>";
                ?>
            </tr>

            <?php
                    }
                }
                mysqli_close($con);
            ?>
        </table>
    </div> 

    </body>
</html>

