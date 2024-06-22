<?php
require_once "iPayment.php";
class payByAmazonPay implements iPayment {
    public function pay($amount) {
        echo "<script>
        alert('Successful Payment of EGP $amount using AmazonPay!');
        window.location.href = 'home.php';
        </script>";
        exit;
    }
    public function validate(array $options,$amount): bool {

        if (!preg_match('/^\d{10,12}$/', $options[5])) {
            echo "<script>alert('Invalid Account Number. It must be between 10 to 12 digits.')</script>";
            return false;
        }
        if (!preg_match('/^\d{10,15}$/', $options[6])) {
            echo "<script>alert('Invalid Telephone Number. It must be between 10 to 15 digits.')</script>";
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