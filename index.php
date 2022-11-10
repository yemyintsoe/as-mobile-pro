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
                <h5 class="text-success">As Mobile Pro</h5>
            </div>
            <div class="col-6">
                <a href="create.php" class="btn btn-primary btn-sm float-end"> + Add New Post</a>
            </div>
            <?php
            if (mysqli_num_rows($posts) > 0) {
                while($row = mysqli_fetch_assoc($posts)) {
            ?>

            <div class="col-md-4">
                <div class="card shadow my-1">
                    <div class="card-body">
                        <div class="card-title h6"><?= $row['title'] ?></div>
                        <p><?= $row['content'] ?></p>
                    </div>
                </div>
            </div>

            <?php
                }
              } else {
                echo "<p class='px-3'>No post found!</p>";
              }              
              mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>