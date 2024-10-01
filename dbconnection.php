<?php

$servername= "localhost";
$username="root";
$password="";
$dbname="todo";

$con=new mysqli('localhost', 'root', '', 'todo');

if(!$con){
    die(mysqli_error($con));
}
?>