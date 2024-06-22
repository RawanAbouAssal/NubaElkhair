<?php
include_once "functions.php";
include_once "Classes.php";
include_once "viewdonator.php";
require_once 'datab.php';

class Donator extends User {
    public $quantity;
    public $amount;
    public $personalItem;
    public $donation;
    public $crud;
    private $db;

    public function __construct() {
        global $connection;
        $this->db = $connection;
        $this->crud = new CRUD();
    }

    function setDonation(Donation $donation){
        $this->donation = $donation;
    }
        
    public function makeDonation(){
        $this->crud->create("donation","DonationID");
    }

    public function displayDonationTypes(){
        $stmt = $this->db->prepare("SELECT * FROM donationtype WHERE Parent != 0");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function viewAboutUs(){
        include('aboutus.php');
    }

    public function viewContactUs(){
        include('contact.php');
    }

    public function viewHome(){
        include('home.php');
    }

    public function viewMedia(){
        include('mediacontent.php');
    }

    public function viewDonations(){
        $this->crud->viewuserdonations();
    }

}  
?>