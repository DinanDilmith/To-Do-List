<?php
include 'dbconnection.php';
if (isset($_GET['deletedID'])) {
    $id = $_GET['deletedID'];

    $sql = "DELETE FROM `todo` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:index.php');
    } else {
        echo "deletion failed";
    }
}
