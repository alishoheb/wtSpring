<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="POST" action="">
    Full Name: <input type="text" name="fullname"><br><br>

    Email: <input type="text" name="email"><br><br>

    Username: <input type="text" name="username"><br><br>

    Password: <input type="password" name="password"><br><br>

    Confirm Password: <input type="password" name="confirm_password"><br><br>

    Age: <input type="number" name="age"><br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    Course:
    <select name="course">
        <option value="">Select Course</option>
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
        <option value="BBA">BBA</option>
    </select>
    <br><br>

    <input type="checkbox" name="terms"> I agree to Terms & Conditions
    <br><br>

    <input type="submit" name="register" value="Register">
</form>

</body>
</html>

<?php

if(isset($_POST['register'])){

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'] ?? "";
    $course = $_POST['course'];
    $terms = isset($_POST['terms']);

    $errors = [];

    // 1. Empty validation
    if(empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirm_password) || empty($age)){
        $errors[] = "All fields are required.";
    }

    // 2. Full name validation
    if(!preg_match("/^[a-zA-Z ]*$/", $fullname)){
        $errors[] = "Full name can contain only letters and spaces.";
    }

    // 3. Email validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email format.";
    }

    // 4. Username length
    if(strlen($username) < 5){
        $errors[] = "Username must be at least 5 characters.";
    }

    // 5. Password length
    if(strlen($password) < 6){
        $errors[] = "Password must be at least 6 characters.";
    }

    // 6. Password match
    if($password !== $confirm_password){
        $errors[] = "Passwords do not match.";
    }

    // 7. Age validation
    if($age < 18){
        $errors[] = "You must be at least 18 years old.";
    }

    // 8. Gender validation
    if(empty($gender)){
        $errors[] = "Please select gender.";
    }

    // 9. Course validation
    if(empty($course)){
        $errors[] = "Please select a course.";
    }

    // 10. Terms checkbox
    if(!$terms){
        $errors[] = "You must agree to Terms & Conditions.";
    }

    // Display result
    if(!empty($errors)){
        echo "<h3 style='color:red;'>Errors:</h3>";
        foreach($errors as $error){
            echo $error . "<br>";
        }
    } else {
        echo "<h3 style='color:green;'>Registration Successful!</h3>";
    }
}

?>