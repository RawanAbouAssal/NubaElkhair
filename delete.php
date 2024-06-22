<?php
include_once 'datab.php';
include_once 'functions.php';
include_once "admin.php";
include_once "Editor.php";


$admin = new Admin();
$editor = new Editor();

$id = $_POST['id'];
$table = $_POST['table'];
$primaryKey = $_POST[ 'pk' ];
if($table == "donationtype"){
   $admin->deleteDonationType($id);
}

elseif($table == "usertype"){
    $admin->deleteUserType($id);
}

elseif($table == "mediacontent"){
    $editor->deleteMediaContent($id);
}
else{
    $crud->delete($table, $primaryKey, $id);
}


?>
