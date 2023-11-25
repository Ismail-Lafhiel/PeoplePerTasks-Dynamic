<?php
require_once("../db/conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $bio = $conn->real_escape_string($_POST["bio"]);

    $query = "INSERT INTO `users` (first_name, last_name, email, password, bio) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$bio')";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    

    mysqli_close($conn);
}
?>
