<?php
include "autoload.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section>
    <div>
        <?php
        if(isset($_SESSION["userid"])){
        echo "<h4>Already Logged in as " . $_SESSION["useruid"] . "</h4>" . "<a href='logout.php'>Logout</a>" . "<hr>" . "<h4>Login another account : </h4>";
        } else{
            echo "<h4>Login</h4>";
        }
        ?>
        <form action="login.php" method="post">
            <input style="display: block; margin-bottom: 10px" type="text" name="uid" placeholder="Username">
            <input style="display: block; margin-bottom: 10px" type="password" name="pwd" placeholder="Password">
            <br>
            <button type="submit" name="submit">Login Now</button>
        </form>
        <hr>
    </div>
    <div class="sign-up">
        <h4>Sign Up!</h4>
        <form action="signup.php" method="post">
            <input style="display: block; margin-bottom: 10px" type="text" name="uid" placeholder="Username">
            <input style="display: block; margin-bottom: 10px" type="password" name="pwd" placeholder="Password">
            <input style="display: block; margin-bottom: 10px" type="password" name="pwdrepeat" placeholder="Repeat Password">
            <input style="display: block; margin-bottom: 10px" type="text" name="email" placeholder="E-mail">
            <br>
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
</section>
</body>
</html>
