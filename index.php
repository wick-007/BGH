
<?php 
require_once 'includes/config_session.php';
require_once 'includes/signup_view.php';
require_once 'includes/login_view.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BGH</title>
</head>

<body>
    <h1>Welcome to Bee's Glam Hub</h1>
    <h3>SIGNUP HERE</h3>
    <div>
        <form action="./includes/signup.inc.php" method="POST">
              <?php 
                Signup();
              ?>
            <button>signup</button><br>
        </form>
    </div><br>
    <h3>LOGIN HERE</h3>
     <div>
        <form action="./includes/loginhandler.php" method="POST">
            <input type="text" name="username" id="username" placeholder="Username"><br><br>
            <input type="password" name="password" id="password" placeholder="Password"><br><br>
            <button>LOGIN</button><br>
        </form>
    </div><br>
     <form action="./includes/search.php" method="POST" class="new">
            <input type="text" name="searchuser" id="searchuser" placeholder="search..." class="search"><br><br>
            <button>search</button><br>
        </form>

        <?php 
         check_signup_errors();
         check_login_errors();
        ?>
</body>

</html>