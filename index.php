<?php include 'dbconnection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>To-Do List</title>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <form method="post" action="add.php">
            <div class="row my-5">
                <h1 class="text-center display-4">To-Do List</h1>
            </div>
            <div class="row">
                <div class="col-7 col-lg-5">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter your title here" required>
                </div>
                <div class="col-7 col-lg-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select name="tag" class="form-select" required>
                        <option value="" disabled selected hidden>Select a tag</option>
                        <option>Work</option>
                        <option>Entertainment</option>
                        <option>Educational</option>
                    </select>
                </div>
                <div class="col-12 my-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Add description here" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <button type="submit" class="btn btn-outline-success w-100" name="add">Add</button>
                </div>
            </div>
        </form>

        <hr class="my-5">

        <div class="row">
            <table class="table table-dark table-borderless width=100%">
                <thead>
                    <tr>
                        <th class="col-2">Title</th>
                        <th class="col-2">Date</th>
                        <th class="col-2">Tag</th>
                        <th class="col-3">Description</th>
                        <th class="col-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `todo`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result))  #etches each row from the result set as an associative array
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $date = $row['date'];
                            $tag = $row['tag'];
                            $description = $row['description'];
                            echo '<tr>
                            <td>' . $title . '</td>
                            <td>' . $date . '</td>
                            <td>' . $tag . '</td>
                            <td>' . $description . '</td>
                            <td>
                            <button class="btn btn-outline-secondary my-1"><a href="delete.php?deletedID=' . $id . '" class="text-white text-decoration-none">Done</a></button>
                            <button class="btn btn-outline-warning my-1"><a href="update.php?updatedID=' . $id . '" class="text-white text-decoration-none">Update</a></button>
                            <button class="btn btn-outline-danger my-1"><a href="delete.php?deletedID=' . $id . '" class="text-white text-decoration-none">Delete</a></button>
                            </td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>