<!DOCTYPE html>
<html>
 <head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="./style.css" >
</head>
<body>
	<div class="login-form">
        <div class="login-bg">
            <div class="login-back">
                <form action="user_login.php" method="post">
                <div class="title">
                    <h1>Login<h1>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                    <input type="text" name="u_name" placeholder="User name">
                    <input type="password" name="u_password" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

        
       