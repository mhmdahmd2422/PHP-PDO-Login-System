<?php
include "Dbh.php";
include "SignupClass.php";
include "SignupContr.php";


if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);
    $signup->verifyUser();
    header("Location: index.php?error=none");
}
