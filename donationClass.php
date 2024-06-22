<?php
include_once "functions.php";

class Donation{
    public $donationId;
    public $donatorId;
    public $donationTypeId;
    public $quantity;
    public $DateTime;
    public $totalAmount;
    public $payment;

    public function __construct($donationId,$donatorId,$donationTypeId,$quantity,$DateTime,$totalAmount){
        $this->donationId = $donationId;
        $this->donatorId = $donatorId;
        $this->donationTypeId = $donationTypeId;
        $this->quantity = $quantity;
        $this->DateTime = $DateTime;
        $this->totalAmount = $totalAmount;
    }

    public function calculateTotal($donationTypeId,$quantity){
        $this->donationTypeId = $donationTypeId;
        $this->quantity = $quantity;
    }
}

?>
