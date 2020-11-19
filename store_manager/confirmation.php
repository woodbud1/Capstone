<?php include './view/header.php'; ?>
<p>Wow you placed an order</p>
<p>Name: <?php echo $name; ?></p>
<p>Email: <?php echo $email; ?></p>
<p>Address: <?php echo $address; ?></p>
<p>Payment Type: <?php echo $payment_type; ?></p>
<p>Credit Card Number: <?php echo $creditcard_num; ?></p>
<p>Change Address?</p>
<form action="." method="post" >
    <input type="hidden" name="action" value="change_address" />
                <label>Address: </label>
                <input type="text" name="address" value="<?php echo $address; ?>"><br>
    <p><input class="button" type="submit" name="submit" value="Change Address" ></p>
</form>
<?php require_once './view/footer.php'; ?> 