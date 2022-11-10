<?php
    $servername = "127.0.0.1:3307";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "as_mobile_pro";

    // Create connection
    $conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    // Post create
    if(isset($_POST['create_btn'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "INSERT INTO posts (title, content)
        VALUES ('$title', '$content')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New record created successfully')</script>";
            header('location:create.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    // Select the posts
    $posts = mysqli_query($conn, "SELECT * FROM posts");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>as mobile pro</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-6">
                <h5 class="text-success">Create Post</h5>
            </div>
            <div class="col-6">
                <a href="index.php" class="btn btn-primary btn-sm float-end"> << Back </a>
            </div>
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="mb-1">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="mb-1">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
                    </div>
                    <button name="create_btn" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                <?php
                    if (mysqli_num_rows($posts) > 0) {
                    while($row = mysqli_fetch_assoc($posts)) {
                ?>
                    <tr>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['content'] ?></td>
                        <td>
                            <a href='delete.php?post_id=<?= $row['id'] ?>' class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</a>
                        </td>
                    </tr>
                <?php
                    }
                    } else {
                        echo "<p class='px-3'>No post found!</p>";
                    }              
                    mysqli_close($conn);
                ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>