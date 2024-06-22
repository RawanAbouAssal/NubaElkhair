<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noba Charity</title>
    <style>
        .members-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1150px;
            margin: 0 auto;
        }
        .member {
            flex: 0 0 calc(33.33% - 40px);
            margin: 20px;
            text-align: center;
        }
        .member img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php         
include_once "donatorheader.php";
?>
    <div class="members-container">
        <?php

            include "datab.php";
            include_once "functions.php";
            include_once "result.php";

            // Query to retrieve members data
            $res = new result();
            $result = $res->readTable('aboutus');


            // Display members
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $image = $row["image"];
                    $name = $row["name"];
                    $hierarchy = $row["hierarchy"];
        ?>
                    <div class="member">
                        <img src="<?php echo 'images/'.$image; ?>" alt="<?php echo $name; ?>">
                        <h2><?php echo $name; ?></h2>
                        <p><?php echo $hierarchy; ?></p>
                    </div>
        <?php
                }
            } else {
                echo "0 results found";
            }
            $connection->close();
        ?>
    </div>
</body>
</html>
