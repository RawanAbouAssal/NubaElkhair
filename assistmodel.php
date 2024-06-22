<?php

include_once 'datab.php';

class assist{

    public $db; 
    public $table;
    

    public function __construct() {
        global $connection;
        $this->db = $connection;
    }

    

    function getColumnNames($table) {
        $sql = "SHOW COLUMNS FROM $table";
        $result = $this->db->query($sql);
        $columns = array();
        while ($row = $result->fetch_assoc()) {
          $columns[] = $row['Field'];
        }
        return $columns;
      }
    
    
      function getColumnNamesAndTypes($table) {
        $sql = "SHOW COLUMNS FROM $table";
        $result = $this->db->query($sql);
        $columns = array();
        while ($row = $result->fetch_assoc()) {
          $columns[$row['Field']] = $row['Type'];
        }
        return $columns;
      }

      function read($table) {

        $columns = $this->getColumnNames($table);
    
        $sql = "SELECT * FROM $table";
        $result = $this->db->query($sql);
        
        $data = array();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $rowData = array();
            foreach ($columns as $column) {
              $rowData[$column] = $row[$column];
            }
            $data[] = $rowData;
          }
        }
        return $data;
      }


      function saveFormData($table, $formData) {
        unset($formData['submit']);
    
        $columns = implode(", ", array_keys($formData));
        $values = "'" . implode("', '", $formData) . "'";
    
        // Construct the SQL query
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    
        if ($this->db->query($sql) === TRUE) {
            // Output JavaScript alert message
            echo "<script>alert('New record created successfully');</script>";
            echo "<meta http-equiv='refresh' content='0.5;url=accesscontroller.php'>";
            echo "<h1>Loading...<h1>";
        exit;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }
    



    
  
  // Function to fetch DonationTypeName
  function getDonationTypeName($donationTypeID) {

      if (isset($_SESSION['userid'])) {

        $donation_type_sql = "SELECT DonationTypeName FROM donationtype WHERE DonationTypeID='$donationTypeID'";
        $donation_type_result = $this->db->query($donation_type_sql);
        if ($donation_type_result->num_rows == 1) {
            $donation_type_row = $donation_type_result->fetch_assoc();
            return $donation_type_row["DonationTypeName"];
        } else {
            return "Unknown";
      }
    
        
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>UserID not provided.</div></div>";
    }
      
  }

}