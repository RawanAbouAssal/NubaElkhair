<?php 
require_once ("iPayment.php");
class payByPayPal implements iPayment {
    public function pay($amount) {
        echo "<script>
        alert('Successful Payment of EGP $amount using PayPal!');
        window.location.href = 'home.php';
        </script>";
        exit;
    }
    public function validate(array $options,$amount): bool {
        
        if (!filter_var($options[7], FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid Email format.')</script>";
            return false;
        }
        if (strlen($options[8]) < 8) {
            echo "<script>alert('Password must be at least 8 characters long.')</script>";
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