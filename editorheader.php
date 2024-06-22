

<?php
include "datab.php";
include_once "result.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="mainstyle.css">
<title>Noba Charity</title>
</head>
<body>
    <header>
    <a href="login.html">
            <h1>Noba Charity</h1>
            </a>
    </header>
    
    <nav>
        <?php
    $res = new result();
    $result = $res->pageAccess('2');

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="editcontroller.php?action=' . $row['Friendlyname'] . '">' . $row['Friendlyname'] . '</a>';
    }
} else {
    echo "0 results";
}
        ?>
    </nav>
</body>
