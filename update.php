<?php
include_once 'datab.php';

if(isset($_POST['id']) && isset($_POST['table'])) {
    $id = $_POST['id'];
    $table = $_POST['table'];
    $primaryKey = $_POST[ 'pk' ];
    unset($_POST['submit']);
    unset($_POST['pk']);

    $setClause = "";
    foreach ($_POST as $key => $value) {
        if ($key != 'id' && $key != 'table') {
            $setClause .= "$key='$value', ";
        }
    }
    $setClause = rtrim($setClause, ', ');

    $sql = "UPDATE $table SET $setClause WHERE $primaryKey = '$id'";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<meta http-equiv='refresh' content='0.5;url=accesscontroller.php'>";
        echo "<h1>Loading...<h1>";
    } else {
        echo "Error updating record: " . $connection->error;
    }
} else {
    echo "ID or table parameter not set";
}

$connection->close();
?>
