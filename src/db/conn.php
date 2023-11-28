<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "PeoplePerTasks";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $time = 5000;
    echo "<div
    class='font-regular relative mb-4 block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100'>
    Connected successfully
    </div>";
}

?>