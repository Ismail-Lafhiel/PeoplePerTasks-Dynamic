<?php
require_once("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $bio = $_POST["bio"];

    $query = "UPDATE `users` SET first_name='$first_name', last_name='$last_name', email='$email', bio='$bio' WHERE id=$user_id";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        // mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $bio, $user_id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "User updated successfully";
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
