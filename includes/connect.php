<?php
$mysqli = new Mysqli("localhost", "root", "", "file_manager");
if($mysqli->connect_errno){
    die("Connection failed: " . $mysqli->connect_error);
}
?>

