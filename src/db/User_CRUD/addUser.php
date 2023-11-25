<?php
require_once("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $bio = $_POST["bio"];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO `users` (first_name, last_name, email, password, bio) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$bio')";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        // mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $hashed_password, $bio);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "New user created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
    header("Location: ../../admin/users.php");
    mysqli_close($conn);
}
?>
