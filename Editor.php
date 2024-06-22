<?php
include_once "functions.php";
include_once "Classes.php";

class Editor extends User implements iOperation{
    public $MediaContent;
    public $crud;

    public function __construct() {
        $this->crud = new CRUD();
    }

    public function editDonationType($donationTypeId){        
        $this->crud->update("donationtype","DonationTypeID",$donationTypeId);
    }
    public function addMediaContent(){
        $this->crud->create("mediacontent","contentID");
    }
    public function editMediaContent($id){
        $this->crud->update("mediacontent","contentID",$id);
    }
    public function deleteMediaContent($id){
        $this->crud->delete("mediacontent","contentID",$id);
    }
    public function viewMediaContent(){
        $this->crud->getTables("mediacontent","contentID");
    }
    public function viewEditAbout(){
        $this->crud->getTables('aboutus', 'aboutusID');
    }
    public function filterMediaContent($MediaContent){
        $this->MediaContent = $MediaContent;
    }
    public function viewDonationDetails() {

    }
    public function viewDonationTypes() {

    }

}

?>
