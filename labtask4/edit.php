<?php
include 'db_connect.php';

$id = $_GET['id']; // Get ID from URL
$fetch_sql = "SELECT * FROM students WHERE id=$id";
$res = mysqli_query($conn, $fetch_sql);
$row = mysqli_fetch_assoc($res);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['department'];

    $update_sql = "UPDATE students SET name='$name', email='$email', department='$dept' WHERE id=$id";
    
    if (mysqli_query($conn, $update_sql)) {
        header("Location: view.php"); // Redirect back to list
    }
}
?>

<h2>Update Student Information</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Dept: <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>
    <input type="submit" name="update" value="Update Record">
</form>