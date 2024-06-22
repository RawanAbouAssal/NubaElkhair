<?php
include_once "adminheader.php";
include_once "footer.php";
include_once "datab.php";
include_once "functions.php";
include_once "admin.php";
include_once "Classes.php";
include_once "iOperations.php";
include_once "sortByDonationID.php";

$admin = new Admin();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'addDonationType':
            $admin->addDonationType();
            break;
        case 'deleteDonationType':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $admin->deleteDonationType($id);
            }
            break;
        case 'createUserType':
            $admin->createUserType();
            break;
        case 'updateUserType':
            $UserTypeid = $_GET['UserTypeid'] ?? null;
            if ($UserTypeid) {
                $admin->updateUserType($UserTypeid);
            }
            break;
        case 'deleteUserType':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $admin->deleteUserType($id);
            }
            break;
        case 'Users':
            $admin->viewUsers();
            break;
        case 'User Type':
            $admin->viewUserTypes();
            break;
        case 'Donations':
            $admin->sortControls();
            $admin->viewDonation();
            break;
        case 'sortDonations':
            $admin->sortControls();
            if (isset($_POST['sortColumn'])) {
                $sortStrategy = $admin->getSortStrategy($_POST['sortColumn']);
                $rows = $sortStrategy->sort($_POST['sortDirection']);
                // Display the sorted table
                $admin->sortDonations($rows);
            } else {
                // Display the table without sorting if no sort column is selected
                $admin->viewDonation();
            }
            break;
        case 'Donation Details':
            $admin->viewDonationDetails();
            break;
        case 'Donation Type':
            $admin->viewDonationTypes();
            break;
        case 'Pages':
            $admin->viewpages();
            break;
        default:
            echo "Invalid action";
            break;
    }
} else {
    $admin->viewUsers();
}
?>
