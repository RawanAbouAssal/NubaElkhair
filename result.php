<?php

include_once 'datab.php';

class result{

    public $result;
    public $db;
    public function __construct() {
        global $connection;
        $this->db = $connection;
    }


    public function readTable($table){
        $sql = "SELECT * FROM $table";
        $this->result = $this->db->query($sql);
        return $this->result;

    }

    public function pageAccess($userTypeID){
        $sql = "SELECT pages.Friendlyname, pages.physicalname
        FROM pages
        INNER JOIN usertypepages ON pages.ID = usertypepages.pageID
        WHERE usertypepages.usertypeID = $userTypeID";

        $this->result = $this->db->query($sql);
        return $this->result;
    }

    public function readDonations(){
        if (isset($_SESSION['userid'])) {
            $userID = $_SESSION['userid'];
        
            // Fetch user's donations
            $donations_sql = "SELECT * FROM donation WHERE UserID='$userID'";
            $donations_result = $this->db->query($donations_sql);
            return $donations_result;
            
        } else {
            echo "<div class='container mt-5'><div class='alert alert-danger'>UserID not provided.</div></div>";
        }
    }


public function getUserType($userid) {
    $sql = "SELECT UserTypeID FROM user WHERE UserID='$userid'";
    $result = $this->db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return intval($row['UserTypeID']);
    }
}

}

?>