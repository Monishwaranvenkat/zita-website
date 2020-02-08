<?php
$servername="localhost";
$user="client";
$pss="Zita@2020";
$conn=mysqli_connect($servername,$user,$pss,"zitautsaha");

if(!$conn){
    die("connection failed".mysqli_connect_error());
    
}
?>