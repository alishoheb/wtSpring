<?php
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $reg_no = $_POST['registration_no'];
    $dept = $_POST['department'];

    $sql = "INSERT INTO students (name, email, registration_no, department) 
            VALUES ('$name', '$email', '$reg_no', '$dept')";

    if (mysqli_query($conn, $sql)) {
        echo "<b style='color:green;'>New student record created successfully!</b>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<h2>Add New Student</h2>
<form method="post" action="">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Reg No: <input type="text" name="registration_no" required><br><br>
    Dept: <input type="text" name="department" required><br><br>
    <input type="submit" name="submit" value="Register Student">
</form>
<a href="view.php">View All Records</a>