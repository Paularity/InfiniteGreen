<?php


$connect = mysqli_connect("localhost","root","","infinitegreendb");
if(mysqli_connect_errno()){
    echo "failed to connect". mysqli_connect_errno();
}
