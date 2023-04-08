<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Exhibition Judging System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style-view.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9b370d88e4.js" crossorigin="anonymous"></script>
        <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    </head>
    <body>
      <div class="nav">
          <i class="fa-solid fa-bars fa-2x"></i>
          <button type="button"><a href="view_result.php">View Result</button>
          <button type="button"><a href="view_participant.php">View Participant</button>
          <button type="button"><a href="view_judger.php">View Judger</button>
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
            <button type="submit" name="search"><b>SEARCH</b></button>
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
      <div class="table">
        <table>
          <thead>
            <tr>
                <td style="width:50%"><b>Participant Name</b></td>
                <td style="width:50%"><b>Mark</b></td>
            </tr>
          </thead>

            <?php
              include("connection.php");
              if(isset($_POST['search']))
              {
                  $coid = $_POST['coid'];
                  $sql = "SELECT * FROM mark 
                          INNER JOIN participant ON mark.PID = participant.PID 
                          INNER JOIN competition ON participant.COID = competition.COID 
                          WHERE competition.COID=$coid
                          ORDER BY Mark DESC LIMIT 5 " ;
                  $result = mysqli_query($con, $sql);
                  if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>

            <tr>
                <td><?php echo $row['Pname']; ?></td>
                <td><?php echo $row['Mark']; ?></td>
            </tr>

            <?php
                }
              }
            }
            mysqli_close($con);
            ?>
        </table>
      </div>
    </body>
  </html>