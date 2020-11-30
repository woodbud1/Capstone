<?php include './view/header.php'; ?>
<p>Wow you placed an order</p>
<p>Name: <?php echo $name; ?></p>
<p>Email: <?php echo $email; ?></p>
<p>Address: <?php echo $address; ?></p>
<p>Payment Type: <?php echo $payment_type; ?></p>
<p>Credit Card Number: <?php echo $creditcard_num; ?></p>

<?php require_once './view/footer.php'; ?> 