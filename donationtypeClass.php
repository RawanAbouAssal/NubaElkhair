<?php
class DonationType{
    public $DonationTypeId;
    public $DonationTypeName;
    public $parentId;
    public $price;
    public $stock;
    
    public function __construct($DonationTypeId,$DonationTypeName,$parentId,$price,$stock) {
        $this->DonationTypeId = $DonationTypeId;
        $this->DonationTypeName = $DonationTypeName;
        $this->parentId = $parentId;
        $this->price = $price;
        $this->stock = $stock;
    }
}

?>
