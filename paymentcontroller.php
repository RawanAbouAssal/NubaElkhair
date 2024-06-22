<?php
require_once 'PaymentModel.php';
require_once 'Donator.php';

session_start();
$model = new PaymentModel();

if (isset($_SESSION['userid'])) {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'chooseMethod':
                // Display available payment methods
                $_SESSION['donationTypeID']=$_GET['donationTypeID'];
                $_SESSION['quantity']=$_GET['quantity'];
                $methods = $model->getPaymentMethods();
                $amount = $model->calculateTotalAmount($_SESSION['donationTypeID'], $_SESSION['quantity']);
                $_SESSION['amount']=$amount;
                loadView('payment_form', ['methods' => $methods, 'amount'=>$_SESSION['amount']]);
                break;
            case 'viewOptions':
                // Display payment options for a selected method
                if (isset($_GET['method'])) {
                    $_SESSION['method']=$_GET['method'];
                    $methods = $model->getPaymentMethods();                   
                    loadView('payment_form', ['methods' => $methods, 'amount'=>$_SESSION['amount']]);
                    $methodID = intval($_SESSION['method']);
                    $options = $model->getPaymentMethodOptions($methodID);
                    loadView('payment_details', ['options' => $options, 'methodID' => $methodID]);
                } else {
                    echo "Invalid method.";
                }
                break;
            case 'submitPayment':
                // Handle payment submission
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $methodID = intval($_SESSION['method']);
                    try {
                        $paymentStrategy = $model->getPaymentStrategy($methodID);           
                        if ($paymentStrategy->validate($_POST['options'],$_SESSION['amount'])) {
                            $donationID = $model->createDonation($_SESSION['donationTypeID'],$_SESSION['quantity'],$_SESSION['amount']);
                            $_SESSION['DonationID'] = $donationID;
                            $model->savePaymentDetails($_POST);
                            // header("Location: home.php");
                            $paymentStrategy->pay($_SESSION['amount'],$methodID);
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }                    
                } else {
                    echo "Invalid payment details.";
                }
                break;
            default:
                echo "Invalid action.";
                break;
        }
    } else {
        loadView('login');
    }
} else {
    loadView('login');
}

function loadView($view, $data = []) {
    extract($data);
    include "{$view}.php";
}
?>
