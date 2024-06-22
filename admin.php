<?php
include_once "functions.php";
include_once "Classes.php";
include_once "iOperations.php";
include_once "sortByDonationID.php";
include_once "sortByDateTime.php";
include_once "sortByTotalAmount.php";

class Admin extends User implements iOperation {
    public $UserTypeid;
    public $crud;

    public function __construct() {
        $this->crud = new CRUD();
    }

    public function addDonationType(){
        $this->crud->create("donationtype", "DonationTypeID");
    }   

    public function deleteDonationType($id){
        $this->crud->delete("donationtype", "DonationTypeID", $id);
    }  

    public function createUserType(){
        $this->crud->create("usertype", "UserTypeID");
    }

    public function updateUserType($UserTypeid){
        $this->crud->update("usertype", "UserTypeID", $UserTypeid);
    }

    public function deleteUserType($id){
        $this->crud->delete("usertype", "UserTypeID", $id);
    }

    public function sortDonations($rows){
        $this->crud->displaySortedTable($rows, "donation");
    }

    public function sortControls(){
        $this->crud->viewSortControls();
    }

    public function viewUsers(){
        $this->crud->getTables("user", "UserID");
    }

    public function viewUserTypes(){
        $this->crud->getTables("usertype", "UserTypeID");
    }

    public function viewDonation() {
        $this->crud->getTables("donation", "DonationID");
    }

    public function viewDonationDetails() {
        $this->crud->getTables("paymentmethodoptionsvalue", "ID");
    }

    public function viewDonationTypes() {
        $this->crud->getTables("donationtype", "DonationTypeID");
    }

    public function viewpages() {
        $this->crud->getTables("pages", "ID");
    }

    public function getSortStrategy($sortColumn) {
        switch ($sortColumn) {
            case "DonationID":
                return new sortByDonationID();
            case "DateTime":
                return new sortByDateTime(); 
            case "totalAmount":
                return new sortByTotalAmount();         
            default:
                throw new Exception("Unsupported sort column");
        }
    }
}
?>