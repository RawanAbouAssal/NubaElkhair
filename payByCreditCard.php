<?php
require_once ("iPayment.php");
include_once "functions.php";
class payByCreditCard implements iPayment {
    public function pay($amount) {
        echo "<script>
        alert('Successful Payment of EGP $amount using Credit Card!');
        window.location.href = 'home.php';
        </script>";
        exit;
    }
    public function validate(array $options,$amount): bool {

        if (!preg_match('/^[A-Za-z\s]+$/', $options[1])) {
            echo "<script>alert('Invalid Card Name format.')</script>";
            return false;
        }
        if (!preg_match('/^\d{16}$/', $options[2])) {
            echo "<script>alert('Invalid Card Number format. It must be 16 digits.')</script>";
            return false;
        }
        if (!preg_match('/^\d{3,4}$/', $options[3])) {
            echo "<script>alert('Invalid Security Code format. It must be 3 or 4 digits.')</script>";
            return false;
        }
        if ($options[11] != $amount) {
            echo "<script>alert('Paid amount is not equal to the required total amount.')</script>";
            return false;
        }

        return true;
    }
}
?>