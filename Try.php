<?php
 include_once'header.php';
 include_once'includes/config.inc.php';
 include_once'includes/functions.inc.php';

$id = $_SESSION["userid"];
$name = $_SESSION["usersname"];
$last = $_SESSION["userslastname"];
$phonenum = $_SESSION["userphonenumber"];
$email = $_SESSION["usersemail"];

$sql = "SELECT * FROM users WHERE usersID = '$id'";
$result = mysqli_query($connect1,$sql);
$row = mysqli_fetch_assoc($result);

echo $row['usersName'];
?>