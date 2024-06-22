<?php

session_start();

// Database connection

include "footer.php";
include "datab.php";
include "functions.php";

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve user input
$username = $_POST['UserName'];
$password = $_POST['Password'];

// SQL query to fetch user data
$sql = "SELECT * FROM user WHERE UserName='$username' AND password='$password'";
$result = $connection->query($sql);

if ($result->num_rows == 1) {
    // User found, fetch user data
    $user = $result->fetch_assoc();

    // Fetch user type
    $usertypeid = $user['UserTypeID'];
    $usertype_sql = "SELECT * FROM usertype WHERE UserTypeID='$usertypeid'";
    $usertype_result = $connection->query($usertype_sql);
    $usertype_row = $usertype_result->fetch_assoc();

    // Fetch pages allowed for this user type
    $usertypepages_sql = "SELECT * FROM usertypepages WHERE UserTypeID='$usertypeid'";
    $usertypepages_result = $connection->query($usertypepages_sql);
    $allowed_pages = array();
    while ($row = $usertypepages_result->fetch_assoc()) {
        $pageID = $row['pageID'];
        // Fetch the URL of the page using pageID
        $page_url_sql = "SELECT * FROM pages WHERE ID='$pageID'";
        $page_url_result = $connection->query($page_url_sql);
        $page_url_row = $page_url_result->fetch_assoc();
        // Store the URL in the array
        if ($page_url_row) {
            $allowed_pages[] = $page_url_row['physicalname'];
        }
    }

    // Redirect based on user type
    if (count($allowed_pages) > 0) {
        if ($usertype_row['UserTypeName'] == 'Donator') {
            
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $username;
            $_SESSION["userid"] = $user['UserID'];
            header("Location: donatorcontroller.php");
            exit(); 
        } else {
            // Redirect to the page associated with this user type
            $_SESSION["userid"] = $user['UserID'];
            header("Location: " . $allowed_pages[0]);
            exit(); 
        }
    } else {
        // User type not found, redirect to a default page or show an error
        header("Location: login.html");
        exit();
    }
} else {
    header("Location: login.html");
    exit();
}

$connection->close();
?>
