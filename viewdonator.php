<?php

function viewuserdonations(){   
    include "datab.php";
    include_once "assistmodel.php";
    include_once "result.php";

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



?>