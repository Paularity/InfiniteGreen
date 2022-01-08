<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBname = "Useraccounts01";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBname);

if (!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}