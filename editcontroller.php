<?php
include_once "editorheader.php";
include_once "footer.php";
include_once "datab.php";
include_once "functions.php";
include_once "Editor.php";
include_once "Classes.php";
include_once "iOperations.php";

$editor = new Editor();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {

        case 'Edit About':
            $editor->viewEditAbout();
            break;
        case 'Edit Media Content':
            $editor->viewMediaContent();
            break;
        default:
            echo "Invalid action";
            break;
    }
} else {
    $editor->viewMediaContent();
}
?>
