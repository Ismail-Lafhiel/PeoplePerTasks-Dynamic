<?php
require_once("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $freelancer_id = $_POST["freelancer_id"];
    $user_id = $_POST["user_id"];
    $job = $_POST["competences"];

    $query = "UPDATE `freelancers` set user_id = '$user_id', competences= '$job' where id = $freelancer_id";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        // mysqli_stmt_bind_param($stmt, "si", $job, $user_id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "New user created successfully";
            header("Location: ../../admin/freelancers.php");
            exit;
        } else {
            echo "Error: Unable to execute the query";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Unable to prepare the statement";
    }
    
    mysqli_close($conn);
}
?>
