<?php include './view/header.php'; ?>
<main>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-10 mx-auto"> 
<section>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Payment Type</th>
            <th>Address</th>
            <th>Delivered</th>
            <th>Paid</th>
        </tr>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
                <td><?php echo htmlspecialchars($invoice->getPlayer1_Name()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getBuyerID()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getName()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getPaymentAmount()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getPaymentType()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getAddress()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getDelievered()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getPaid()); ?></td>
                <td><form action="index.php" method="post">
                <input type="hidden" name="action" value="update_paid">
                <input type="checkbox" name="isPaid" value="yes">
                <input class="button" type="submit" value="Update Paid" >
                </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
</div>
</div>
</div>
<?php require_once './view/footer.php'; ?> 
