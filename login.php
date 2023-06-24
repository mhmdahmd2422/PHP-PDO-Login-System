<?php
include "Dbh.php";
include "LoginClass.php";
include "LoginContr.php";

if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $login = new LoginContr($uid, $pwd);
    $login->loginUser();
}