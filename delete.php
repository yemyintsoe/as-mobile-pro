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

    // sql to delete a record
    $post_id = $_GET['post_id'];
    $sql = "DELETE FROM posts WHERE id=$post_id";

    if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
        header('location:create.php');
    } else {
    echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);

?>