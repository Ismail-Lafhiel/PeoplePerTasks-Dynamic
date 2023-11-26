<?php
require_once("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST["project_id"];
    
    $query = "DELETE FROM `projects` WHERE id = $project_id";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        // mysqli_stmt_bind_param($stmt, "i", $project_id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "User deleted successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
    header("Location: ../../admin/projects.php");
    mysqli_close($conn);
}
?>
