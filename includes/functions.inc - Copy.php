<?php

function emptyInputSignup($fname, $lname, $uname, $email, $pnumber, $pass, $repeatpass){
    $result;
    if (empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($pnumber) || empty($pass) || empty($repeatpass)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invaliduname($uname){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidemail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pass, $repeatpass){
    $result;
    if ($pass !== $repeatpass){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameExist($conn, $uname){
   $sql = "SELECT * FROM  users WHERE usersUid = ?;";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../register.php?error=stmtfailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "s", $uname);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)){
        return $row;
   }
   else {
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);

}

function createUser($conn, $fname, $lname, $uname, $email, $pnumber, $pass) {
    $sql = "INSERT INTO users (usersName, usersLastname, usersEmail, usersPhonenum, usersUid, userspwd) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){  
     header("location: ../register.php?error=stmtfailed");
     exit();
    }

    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $pnumber, $uname, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
 }
function emptyInputLogin($uname, $pwd){
    $result;
    if (empty($uname) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $uname, $pwd){
    $uidExists = usernameExist($conn, $uname);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["userspwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
      
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["usersuid"] = $uidExists["usersUid"];
        $_SESSION["usersname"] = $uidExists["usersName"];
        $_SESSION["userslastname"] = $uidExists["usersLastname"];
        $_SESSION["userphonenumber"] = $uidExists["usersPhonenum"];
        $_SESSION["usersemail"] = $uidExists["usersEmail"];
        header("location: ../index1.php");
        exit();
    }   
}