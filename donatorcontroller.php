<?php
include_once "donatorheader.php";
include_once "datab.php";
include_once "functions.php";
include_once "Donator.php";
include_once "Classes.php";
include_once "iOperations.php";
include_once "viewdonator.php";


$donator = new Donator();

if (isset($_SESSION['userid'])) {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    switch ($action) {
        case 'My Donations':
            $donator->viewDonations();
            break;
        case 'Donate':
            $donator->makeDonation();
            break;
        case 'About Us':
            $donator->viewAboutUs();
            break;
        case 'Home':
            $donator->viewHome();
            break;
        case 'Contact Us':
            $donator->viewContactUs();
            break;
        case 'Media Content':
            $donator->viewMedia();
            break;
        default:
            echo "Invalid action";
            break;
    }
} else {
    $donator->viewHome();
}
}
include_once "footer.php";
?>
