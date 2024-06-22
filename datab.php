<?php
$connection = new mysqli("localhost", "root", '', "noba_charity");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>