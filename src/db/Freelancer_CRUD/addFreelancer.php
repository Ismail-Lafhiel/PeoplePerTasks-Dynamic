<?php
require_once("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $job = $_POST["competences"];

    $query = "INSERT INTO `freelancers` (first_name, last_name, competences) VALUES ('$first_name', '$last_name', '$job')";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        // mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $job);
        
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
