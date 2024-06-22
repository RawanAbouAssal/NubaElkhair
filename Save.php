<?php

include 'datab.php';
include 'assistmodel.php';

$crud = New assist();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'];
    unset($_POST['table']);
    $crud->saveFormData($table, $_POST);
}

$connection->close();
?>