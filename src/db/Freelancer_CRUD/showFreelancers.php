<?php

require_once("../db/conn.php");

$query = "SELECT * FROM `freelancers`";
$result = mysqli_query($conn, $query);

$freelancers = array();
while ($row = mysqli_fetch_assoc($result)) {
    $freelancers[$row['id']] = $row;
}

mysqli_close($conn);
?>