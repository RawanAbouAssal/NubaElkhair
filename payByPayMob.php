<?php
require_once ("iPayment.php");
class payByPayMob implements iPayment {
    public function pay($amount) {
        echo "<script>
        alert('Successful Payment of EGP $amount using PayMob!');
        window.location.href = 'home.php';
        </script>";
        exit;
    }
    public function validate(array $options,$amount): bool {

        if (!preg_match('/^\d{6}$/', $options[9])) {
            echo "<script>alert('OTP must be 6 digits.')</script>";
            return false;
        }
        if (!preg_match('/^\+?[0-9]{10,15}$/', $options[10])) {
            echo "<script>alert('Invalid Mobile Number format.')</script>";
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