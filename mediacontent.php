<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noba Charity</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .members-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px; /* Adds some spacing inside the container */
}

.member {
    flex: 0 0 calc(70% - 40px); /* Example for three in a row, adjust margin accordingly */
    margin: 20px;
    text-align: center;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
        }

        .member img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .member h2 {
            margin: 15px 0;
            color: #333;
            font-size: 18px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <?php
            include_once "donatorheader.php";
            include "datab.php";
            include_once "functions.php";


            $res = new result();
            $result = $res->readTable('mediacontent');

            // Display members
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $image = $row["contentName"];
                    $name = $row["contentDescription"];
        ?>
        <div class="members-container">
            <div class="member">
                <img src="<?php echo 'content/'.$image; ?>" alt="<?php echo $name; ?>">
                <h2><?php echo $name; ?></h2>
            </div>
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
