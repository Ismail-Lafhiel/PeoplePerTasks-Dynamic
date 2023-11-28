<?php
require_once("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $bio = $_POST["bio"];

    $imgNewName = null; // Initialize $imgNewName

    if (isset($_FILES["user_avatar"]) && $_FILES["user_avatar"]["error"] === 0) {
        $imgName = $_FILES["user_avatar"]["name"];
        $imgTmpName = $_FILES["user_avatar"]["tmp_name"];
        $imgSize = $_FILES["user_avatar"]["size"];

        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
        $imgActualExt = strtolower($imgExt);
        $allowed = array("jpg", "jpeg", "png");

        if (in_array($imgActualExt, $allowed)) {
            if ($imgSize < 125000) {
                $imgNewName = uniqid("", true) . "." . $imgActualExt;
                $imgDestination = '../../../images/uploads/' . $imgNewName;
                if (move_uploaded_file($imgTmpName, $imgDestination)) {
                    // Image uploaded successfully
                } else {
                    $err = "Error uploading the image";
                }
            } else {
                $err = "Image size is too large";
            }
        } else {
            $err = "Invalid file type. Allowed types: jpg, jpeg, png";
        }
    } else {
        $err = "Error uploading the image";
    }

    if (!isset($err)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // Assuming you have a database connection
        $query = "INSERT INTO `users` (first_name, last_name, email, password, bio, img_path) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$bio', '$imgNewName')";
        // Execute the query using your database connection
    } else {
        header("Location: ../../admin/users.php?error=$err");
        exit();
    }

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
