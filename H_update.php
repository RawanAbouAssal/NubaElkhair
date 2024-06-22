<?php

include_once "datab.php";
include_once "functions.php";
include_once "admin.php";
include_once "Editor.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
</head>
<body>
    
    <?php

    $admin = new Admin();
    $editor = new Editor();
    $id = $_POST['id'];
    $table = $_POST['table'];
    $primaryKey = $_POST["pk"];
    if ($table == "usertype") {
        include_once "adminheader.php";
        echo '<h1>Update User Type</h1>';
    $admin->updateUserType($id);

    }
    elseif($table == "donationtype"){
        include_once "adminheader.php";
        echo '<h1>Update Donation Type</h1>';
        $editor->editDonationType($id);
    }
    elseif($table == "mediacontent"){
        include_once "editorheader.php";
        echo '<h1>Update Media content</h1>';
        $editor->editMediaContent($id);
    }
    else {
        include_once "adminheader.php";
        echo '<h1>Update '.$table.'</h1>';
        $crud->update($table,$primaryKey,$id);
    }
    ?>
</body>
</html>

<?php
include "footer.php";
?>
