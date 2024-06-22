<!DOCTYPE html>
<html>
<head>
    <title>Enter Payment Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Enter Payment Details</h2>
    <form action="paymentcontroller.php?action=submitPayment" method="post">
        <input type="hidden" name="DonationID" value="<?php echo htmlspecialchars($_GET['donation_id'] ?? ''); ?>">
        <?php foreach ($options as $option): ?>
            <div class="form-group">
                <label for="option_<?php echo htmlspecialchars($option['OptionsID']); ?>">
                    <?php echo htmlspecialchars($option['Name']); ?>
                </label>
                <?php if ($option['Type'] == 'Text'): ?>
                    <input type="text" class="form-control" id="option_<?php echo htmlspecialchars($option['OptionsID']); ?>" name="options[<?php echo htmlspecialchars($option['OptionsID']); ?>]" required>
                <?php elseif ($option['Type'] == 'Int'): ?>
                    <input type="number" class="form-control" id="option_<?php echo htmlspecialchars($option['OptionsID']); ?>" name="options[<?php echo htmlspecialchars($option['OptionsID']); ?>]" required>
                <?php elseif ($option['Type'] == 'Date'): ?>
                    <input type="date" class="form-control" id="option_<?php echo htmlspecialchars($option['OptionsID']); ?>" name="options[<?php echo htmlspecialchars($option['OptionsID']); ?>]" required>
                <?php elseif ($option['Type'] == 'tel'): ?>
                    <input type="tel" class="form-control" id="option_<?php echo htmlspecialchars($option['OptionsID']); ?>" name="options[<?php echo htmlspecialchars($option['OptionsID']); ?>]" required>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-success">Submit Payment</button>
    </form>
</div>
</body>
</html>
