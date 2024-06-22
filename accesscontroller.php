<?php

include_once 'result.php';
include_once 'datab.php';
session_start();

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $type = new result();
    $userTypeID = $type->getUserType($userid);

    if ($userTypeID === 1){
        header('Location: donatorcontroller.php');
    }
    elseif ($userTypeID === 2){
        header('Location: editcontroller.php');
    }
    elseif ($userTypeID === 3){
        header('Location: admincontroller.php');
    }
    else{
        echo 'none';
        echo $_SESSION['userid'];
        echo $userTypeID;
    }
}
else{
    header('Location: login.html');
}
?>
