<?php
include_once "footer.php";
include_once "datab.php";
include_once "functions.php";
include_once "Classes.php";
include_once "admin.php";
include_once "Editor.php";
include_once "Donator.php";

$admin = new Admin();
$editor = new Editor();
$donator = new Donator();

$table = $_POST['table'];
$primaryKey = $_POST['pk'];
if($table == "usertype"){
    include_once "adminheader.php";
    include_once "admin.php";
    $admin->createUserType();
}
elseif($table == "donation"){
    include_once "adminheader.php";
    include_once "Donator.php";
    $donator->makeDonation();
}
elseif($table == "mediacontent"){
    include_once "editorheader.php";
    include_once "Editor.php";
    $editor->addMediaContent();
}

else {
    include_once "adminheader.php";
    $crud = new CRUD();
    $crud->create($table,$primaryKey);
}
?>