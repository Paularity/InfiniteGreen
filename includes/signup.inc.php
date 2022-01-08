<?php

if (isset($_POST["submit"])){
   
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $pnumber = $_POST["pnumber"];
    $pass = $_POST["pass"];
    $repeatpass = $_POST["repeatpass"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($fname, $lname, $uname, $email, $pnumber, $pass, $repeatpass) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invaliduname($uname) !== false){
        header("location: ../register.php?error=invaliduname");
        exit();
    }
    
    if (invalidemail($email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pass, $repeatpass) !== false){
        header("location: ../register.php?error=passworddontmatch");
        exit();
    }

    if (usernameExist($conn, $uname) !== false){
        header("location: ../register.php?error=usernameexist");
        exit();
    }

    createUser($conn, $fname, $lname, $uname, $email, $pnumber, $pass);
}
else{
    header("location: ../register.php");
}