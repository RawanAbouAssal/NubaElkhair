<?php

session_start();

include 'datab.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $UserName = $_POST['UserName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Sex = $_POST['Sex'];


    // Insert into database
    $sql = "INSERT INTO user (UserName,Email,Password, Sex, UserTypeID) VALUES ('$UserName','$Email','$Password', '$Sex', '1')";
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('registered successfully $UserName');</script>";
        echo "<meta http-equiv='refresh' content='0;url=login.html'>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();

?>