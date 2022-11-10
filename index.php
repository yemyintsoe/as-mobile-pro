<?php
    $servername = "localhost";
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
            <?php
            if (mysqli_num_rows($posts) > 0) {
                while($row = mysqli_fetch_assoc($posts)) {
            ?>

            <div class="col-md-12">
            <div class="card-title h6"><?= $row['message'] ?></div>
            </div>

            <?php
                }
              } else {
                echo "<p class='px-3'>No message found!</p>";
              }              
              mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
