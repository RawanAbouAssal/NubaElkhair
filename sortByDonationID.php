<?php
require_once ("iSort.php");
class sortByDonationID implements iSort {
    private $db;
    public function __construct() {
        global $connection;
        $this->db = $connection;
    }
    public function sort($direction) {
        $direction = strtoupper($direction);
        if ($direction !== 'ASC' && $direction !== 'DESC') {
            echo"<script>alert('Invalid sort direction. Use 'ASC' or 'DESC'.')</script>";
        }
        $result = $this->db->query("SELECT * FROM donation ORDER BY DonationID $direction");       
        if (!$result) {
            throw new Exception("Failed to retrieve data: " . $this->db->error);
        }
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
}

?>