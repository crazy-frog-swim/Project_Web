<?php
    function check_login($con){
        if(isset($_SESSION['username'])){
             $id = $_SESSION['username'];
             $query = "SELECT * FROM user WHERE username = '$id' limit 1";
             $result = mysqli_query($con,$query);
             if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
             }
        }
        header("Location: index.php");
        die;
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>