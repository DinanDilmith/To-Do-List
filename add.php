<?php
include 'dbconnection.php';

if (isset($_POST['add'])) {
    $task = $_POST['title'];
    $tag = $_POST['tag'];
    $description = $_POST['description'];

    $sql = "insert into `todo` (title,tag,description) values ('$task', '$tag', '$description')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    } else {
        // Redirect to index.html after successful submission
        header('Location: index.php');
        exit(); // stop further execution
    }
}

?>
