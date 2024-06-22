<!DOCTYPE html>
<html>
<head>
    <title>Select Payment Method</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Select Payment Method</h2>
    <h4 name="amount">Total Amount To Be Paid: <?php echo $amount; ?></h4>
    <hr>
    <form action="paymentcontroller.php" method="get">
    <input type="hidden" name="action" value="viewOptions">
    <div class="btn-group" role="group">
        <?php foreach ($methods as $method): ?>
            <button type="submit" name="method" value="<?php echo $method['ID']; ?>" class="btn btn-primary">
                <?php echo $method['Name']; ?>
            </button>
        <?php endforeach; ?>
        
    </div>
</form>



</div>
</body>
</html>
