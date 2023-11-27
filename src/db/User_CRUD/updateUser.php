<?php
require_once(__DIR__ . "/../../db/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $bio = $_POST["bio"];
    $imgNewName = null;

    if (isset($_FILES["user_avatar"]) && $_FILES["user_avatar"]["error"] === 0) {
        $imgName = $_FILES["user_avatar"]["name"];
        $imgTmpName = $_FILES["user_avatar"]["tmp_name"];
        $imgSize = $_FILES["user_avatar"]["size"];

        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
        $imgActualExt = strtolower($imgExt);
        $allowed = array("jpg", "jpeg", "png");

        if (in_array($imgActualExt, $allowed)) {
            if ($imgSize < 225000) {
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

    $query = "UPDATE `users` SET first_name='$first_name', last_name='$last_name', email='$email', bio='$bio', img_path='$imgNewName' WHERE id=$user_id";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssi", $first_name, $last_name, $email, $bio, $imgNewName, $user_id);
    if (mysqli_stmt_execute($stmt)) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);


    header("Location: ./admin/users.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $userData = array(
        'user_id' => $user['id'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'bio' => $user['bio']
    );
}
?>