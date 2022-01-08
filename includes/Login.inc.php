<?php

if (isset($_POST["submit"])){

    $uname = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($uname, $pwd) !== false){  
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $uname, $pwd);

}
else{
    header("location: ../login.php");
    exit();

}