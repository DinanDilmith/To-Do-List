<?php
include 'dbconnection.php';
$id = $_GET['updatedID'];
$sql = "SELECT * FROM `todo` WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title']; #should enter ['database column names']
$tag = $row['tag'];
$description = $row['description'];

if (isset($_POST['update'])) {
    $title = $_POST['updatetitle'];
    $tag = $_POST['updatetag'];
    $description = $_POST['updatedescription'];

    $sql = "UPDATE `todo` SET title='$title',tag='$tag',description='$description' WHERE id='$id'";
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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Tasks</title>
</head>

<body>

    <body class="bg-dark text-light">
        <div class="container">
            <form method="post" action="">
                <div class="row my-5">
                    <h1 class="text-center display-4">Edit Your Tasks</h1>
                </div>
                <div class="row">
                    <div class="col-7 col-lg-5">
                        <label for="updatetitle" class="form-label">Title</label>
                        <input type="text" class="form-control" name="updatetitle" placeholder="Enter your title here" value="<?php echo $title; ?>" required>
                    </div>
                    <div class="col-7 col-lg-3">
                        <label for="updatetag" class="form-label">Tag</label>
                        <select name="updatetag" class="form-select">
                            <option value="" disabled selected hidden><?php echo $tag; ?></option>
                            <option>Work</option>
                            <option>Entertainment</option>
                            <option>Educational</option>
                        </select>
                    </div>
                    <div class="col-12 my-4">
                        <label for="updatedescription" class="form-label">Description</label>
                        <textarea class="form-control" name="updatedescription" rows="5" placeholder="Add description here" required><?php echo $description ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <button type="submit" class="btn btn-outline-success w-100" name="update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>