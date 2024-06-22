<?php
require_once 'datab.php';
require_once 'payByAmazonPay.php';
require_once 'payByPayPal.php';
require_once 'payByPayMob.php';
require_once 'payByCreditCard.php';

class PaymentModel {
    private $db;

    public function __construct() {
        global $connection;
        $this->db = $connection;
    }

    public function getPaymentMethods() {
        $result = $this->db->query("SELECT * FROM paymentmethod");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPaymentMethodOptions($methodID) {
        $stmt = $this->db->prepare("SELECT o.Name, o.Type, o.ID as OptionsID
                                    FROM paymentmethodoptions pmo
                                    JOIN options o ON pmo.OptionsID = o.ID
                                    WHERE pmo.PaymentMethodID = ?");
        $stmt->bind_param("i", $methodID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function calculateTotalAmount($donationTypeID, $quantity) {
        $query = "SELECT Price FROM donationtype WHERE DonationTypeID = '$donationTypeID'";
        $result = $this->db->query($query);   
        if ($result->num_rows == 0) {
            throw new Exception("Donation type not found for ID: " . $donationTypeID);
        }  
    
        $row = $result->fetch_assoc();
        $price = $row['Price'];  
        $totalAmount = $price * $quantity;
    
        return $totalAmount;
    }
    
    public function createDonation($donationTypeID, $quantity, $totalAmount) {
        if (!isset($_SESSION['userid'])) {
            throw new Exception("User is not logged in.");
        }
        $userID = $_SESSION['userid'];  
        $stmt = $this->db->prepare("INSERT INTO donation (DonationTypeID, UserID, DateTime, QTY, totalAmount) 
                                    VALUES (?, ?, NOW(), ?, ?)
                                    ON DUPLICATE KEY UPDATE QTY = VALUES(QTY), totalAmount = VALUES(totalAmount)");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->db->error);
        }  
        $stmt->bind_param("iiid", $donationTypeID, $userID, $quantity, $totalAmount);       
        if (!$stmt->execute()) {
            throw new Exception("Failed to execute statement: " . $stmt->error);
        }
        return  $stmt->insert_id;
    }

    public function savePaymentDetails($details) {
        $stmt = $this->db->prepare("INSERT INTO paymentmethodoptionsvalue (PaymentMethodOptionId, Value, DonationID) VALUES (?, ?, ?)");
        foreach ($details['options'] as $optionID => $value) {
            $donationID = $_SESSION['DonationID'];
            $stmt->bind_param("isi", $optionID, $value, $donationID);
            $stmt->execute();
        }
    }

    public function getPaymentStrategy($methodID) {
        switch ($methodID) {
            case 3:
                return new payByAmazonPay();
            case 4:
                return new payByPayPal();
            case 5: 
                return new payByPayMob(); 
            case 6: 
                return new payByCreditCard();           
            default:
                throw new Exception("Unsupported payment method");
        }
    }
}
?>
