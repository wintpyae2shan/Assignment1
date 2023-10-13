<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "subscribers";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Cannot connect: " . mysqli_connect_error());
}
?>