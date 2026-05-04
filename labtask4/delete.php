<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>