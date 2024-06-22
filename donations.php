<?php
session_start();
require_once 'functions.php';
require_once 'Donator.php';

$model = new Donator();
$donationTypes = $model->displayDonationTypes();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Select Donation Type</h2>
    <form action="paymentcontroller.php" method="get">
        <div class="form-group">
        <input type="hidden" name="action" value="chooseMethod">
            <label for="donationType">Donation Types</label>
            <select class="form-control" id="donationType" name="donationTypeID" required>
                <?php foreach ($donationTypes as $type) { ?>
                    <option value="<?php echo $type['DonationTypeID']; ?>"><?php echo $type['DonationTypeName'], " - EGP ", $type['Price']; }?></option>
            </select>
            <label for="donationType">Quantity</label>
            <input class="form-control" type="number" id="quantity" name="quantity" min="1" value="1" required>        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>

</div>
</body>
</html>
