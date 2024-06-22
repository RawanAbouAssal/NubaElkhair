<?php
include_once 'datab.php';
include_once 'assistmodel.php';
include_once "result.php";
class CRUD {

  public $table;
  public $id;
  public $db;
  public $assist;

  public function __construct() {
    global $connection;
    $this->db = $connection;
    $this->assist = new assist();
}


  
function getTables($table, $primaryKey) {

  $assist = new assist();
  $rows = $assist->read($table);
  
  
  
  echo "<table>";
  echo "<tr>";
  
  if ($rows == null) {
      echo "<th colspan='3'>no data yet</th>";
  } else {
      foreach ($rows[0] as $column => $value) {
          echo "<th>$column</th>";
      }
      echo "<th>Update</th>";
      echo "<th>Delete</th>";
  }
  echo "</tr>";
  
  foreach ($rows as $row) {
      echo "<tr>";
      foreach ($row as $value) {
          echo "<td>$value</td>";
      }
      echo "<td>
              <form action='H_update.php' method='post' class='deleteform'>
                <input type='hidden' name='pk' value='" . $primaryKey . "'>
                  <input type='hidden' name='id' value='" . $row["$primaryKey"] . "'>
                  <input type='hidden' name='table' value='" . $table . "'>
                  <input type='submit' class='update-button' value='Update'>
              </form>
          </td>";
  
      echo "<td>
              <form action='delete.php' method='post' class='deleteform'>
              <input type='hidden' name='pk' value='" . $primaryKey . "'>
                  <input type='hidden' name='id' value='" . $row["$primaryKey"] . "'>
                  <input type='hidden' name='table' value='" . $table . "'>
                  <input type='submit' class='delete-button' value='Delete'>
              </form>
          </td>";
      echo "</tr>";
  }
  
  echo "</table>";
  echo '<div class="centered-button">
          <form action="create.php" method="post">
          <input type="hidden" name="pk" value="' . $primaryKey . '">
                  <input type="hidden" name="table" value="' . $table . '">
            <input type="submit" value="Create '. $table .'"/>
          </form>
        </div>';
  }
  



  function viewuserdonations(){   


    $type = new assist();
    $res = new result();
    $donations_result = $res->readDonations();

    echo "<div class='container mt-5'>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>Donation ID</th>";
    echo "<th>Donation Type</th>";
    echo "<th>Date Time</th>";
    echo "<th>Quantity</th>";
    echo "<th>Total Amount</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Check if there are donations
    if ($donations_result->num_rows > 0) {
        // Output data of each row
        while ($row = $donations_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["DonationID"] . "</td>";
            echo "<td>" . $type->getDonationTypeName($row["DonationTypeID"]) . "</td>";
            echo "<td>" . $row["DateTime"] . "</td>";
            echo "<td>" . $row["QTY"] . "</td>";
            echo "<td>" . $row["totalAmount"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>No donations found for this user.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}








function create($table, $primaryKey) {

  if ($table) {
    ?>
    <main>
        <div class="form-container">
            <h2>Create <?php echo ucfirst($table); ?></h2>
            <form action="Save.php" method="post">
              <?php

    $columns = $this->assist->getColumnNamesAndTypes($table);

    foreach ($columns as $column => $type) {
      if ($column == $primaryKey) {
        continue;
      }
      if (substr($column, -2) == 'ID') {
      $referencename = substr($column, 0, -2);
      echo "<label for='$column'>$referencename:</label><br>";
      }
      else{
        echo "<label for='$column'>$column:</label><br>";
      }
      if (substr($column, -2) == 'ID') {
        $referenceTable = substr($column, 0, -2);
        $referenceData = $this->assist->read($referenceTable);
        echo "<select id='$column' name='$column'>";
        foreach ($referenceData as $row) {
          if($table == "paymentmethodoptionsvalue"){
            echo "<option value='" . $row["$column"] . "'>" . $row["$referenceTable" . 'ID'] . "</option>";
          }
          else{
          echo "<option value='" . $row["$column"] . "'>" . $row["$referenceTable" . 'Name'] . "</option>";
        }
        }
        echo "</select><br>";
      } else {
        switch ($type) {
        case 'int(11)':
          echo "<input min=0 type='number' id='$column' name='$column'><br>";
          break;
        case 'varchar(222)':
        case 'varchar(255)':
        case 'text':
          echo "<input type='text' id='$column' name='$column'><br>";
          break;
        case 'date':
        case 'datetime':
          $currentDateTime = date("Y-m-d\TH:i");
          echo "<input type='datetime-local' id='$column' name='$column' max='$currentDateTime'><br>";
          break;
        default:
          echo "Unsupported data type for column '$column'.<br>";
          break;
      }
      }
    }
    ?>
    <input type="hidden" name="table" value="<?php echo $table; ?>">
    <button type="submit" name="submit">Create</button>
</form>
</div>
</main>
<?php
} else {
echo "Table name not provided.";
}
  }





function update($table, $primaryKey, $id) {
    // Retrieve the record to update
    $query = "SELECT * FROM $table WHERE $primaryKey = $id";
    $result = $this->db->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="update.php" method="POST">
            <input type="hidden" name="pk" value="<?php echo $primaryKey; ?>">
            <input type="hidden" name="id" value="<?php echo $row[$primaryKey]; ?>">
            <input type="hidden" name="table" value="<?php echo $table; ?>">
            <?php

            // Get column names and data types from the table
            $columns = $this->assist->getColumnNamesAndTypes($table);

            // Dynamically generate form fields
            foreach ($columns as $column => $type) {
                // Skip primary key columns
                if ($column == $primaryKey) {
                    continue;
                }

                if (substr($column, -2) == 'ID') {
                  $referencename = substr($column, 0, -2);
                  echo "<label for='$column'>$referencename:</label><br>";
                  }
                  else{
                    echo "<label for='$column'>$column:</label><br>";
                  }
                
                // If the column is a foreign key, generate a dropdown list
                if (substr($column, -2) == 'ID') {
                    $referenceTable = substr($column, 0, -2);
                    $referenceData = $this->assist->read($referenceTable);
                    echo "<select id='$column' name='$column'>";
                    foreach ($referenceData as $refRow) {
                      $selected = ($refRow["$column"] == $row["$column"]) ? "selected" : "";
                      if($table == "paymentmethodoptionsvalue"){
                        echo "<option value='" . $refRow["$column"] . "' $selected>" . $refRow["$referenceTable" . 'ID'] . "</option>";
                      }
                      else{
                        echo "<option value='" . $refRow["$column"] . "' $selected>" . $refRow["$referenceTable" . 'Name'] . "</option>";
                    }

                    }
                    echo "</select><br>";
                } else {

                    switch ($type) {
                        case 'int(11)':

                            echo "<input type='number' min=0 id='$column' name='$column' value='" . $row["$column"] . "'><br>";
                            break;
                        case 'varchar(222)':
                        case 'varchar(255)':
                        case 'text':
                            echo "<input type='text' id='$column' name='$column' value='" . $row["$column"] . "'><br>";
                            break;
                        case 'datetime':
                          $currentDateTime = date("Y-m-d\TH:i");
                            echo "<input type='datetime-local' id='$column' name='$column' value='" . $row["$column"] . "' max='$currentDateTime'><br>";
                            break;
                        // Add cases for other data types as needed
                        default:
                            // Handle unsupported data types
                            echo "Unsupported data type for column '$column'.<br>";
                            break;
                    }
                }
            }
            ?>
            <button type="submit" name="submit">Update</button>
        </form>
        <?php
    } else {
        echo "Record not found.";
    }

    $this->db->close();
}




  function delete($table, $primaryKey, $id) {


    if(isset($id)) {
        $sql = "DELETE FROM $table WHERE $primaryKey = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
          echo "<script>alert('Record deleted successfully');</script>";
          echo "<meta http-equiv='refresh' content='0.1;url=accesscontroller.php'>";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        echo "ID parameter not set";
    }
    
    $this->db->close();
}




function displaySortedTable($rows, $table) {
  echo "<table>";
  echo "<tr>";

  if (empty($rows)) {
      echo "<th colspan='3'>No data yet</th>";
  } else {
      foreach ($rows[0] as $column => $value) {
          echo "<th>$column</th>";
      }
      echo "<th>Update</th>";
      echo "<th>Delete</th>";
  }
  echo "</tr>";

  foreach ($rows as $row) {
      echo "<tr>";
      foreach ($row as $value) {
          echo "<td>$value</td>";
      }
      echo "<td>
              <form action='H_update.php' method='post' class='deleteform'>
                <input type='hidden' name='pk' value='DonationID'>
                <input type='hidden' name='id' value= '" . $row["DonationID"] . "'>
                <input type='hidden' name='table' value='$table'>
                <input type='submit' class='update-button' value='Update'>
              </form>
          </td>";
      echo "<td>
              <form action='delete.php' method='post' class='deleteform'>
                <input type='hidden' name='pk' value='DonationID'>
                <input type='hidden' name='id' value='" . $row["DonationID"] . "'>
                <input type='hidden' name='table' value='$table'>
                <input type='submit' class='delete-button' value='Delete'>
              </form>
          </td>";
      echo "</tr>";
  }
  echo "</table>";
  echo '<div class="centered-button">
          <form action="create.php" method="post">
          <input type="hidden" name="pk" value="DonationID">
          <input type="hidden" name="table" value="' . $table . '">
            <input type="submit" value="Create ' . $table . '"/>
          </form>
        </div>';
}


public function viewSortControls(){
  $rows = $this->assist->read("donation");     
  echo "<form method='post' action='admincontroller.php?action=sortDonations'>
  <label for='sortColumn'>Sort by: </label>
  <select name='sortColumn' id='sortColumn'>";

  if ($rows != null) {
      // Display only DonationID and DateTime columns
      $columns = ['DonationID', 'DateTime','totalAmount'];
      foreach ($rows[0] as $column => $value) {
          if (in_array($column, $columns)) {
              echo "<option value='$column'>$column</option>";
          }
      }
  }
  echo "</select>
  <label for='sortDirection'>Direction: </label>
  <select name='sortDirection' id='sortDirection'>
      <option value='ASC'>Ascending</option>
      <option value='DESC'>Descending</option>
  </select>
  <input type='submit' name='sort' value='Sort'>
  </form>";
}

}




















$crud = new CRUD();
?>




