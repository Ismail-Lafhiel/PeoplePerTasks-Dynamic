<?php
require_once("../db/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $bio = $conn->real_escape_string($_POST["bio"]);

    $query = "UPDATE `users` SET first_name='$first_name', last_name='$last_name', email='$email', other='$bio' WHERE id=$user_id";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
