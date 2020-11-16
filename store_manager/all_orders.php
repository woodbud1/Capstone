<?php include '../view/header.php'; ?>
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
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo htmlspecialchars($order->getPlayer1_Name()); ?></td>
                <td><?php echo htmlspecialchars($order->getUserID2()); ?></td>
                <td><?php echo htmlspecialchars($order->getName()); ?></td>
                <td><?php echo htmlspecialchars($order->getPaymentAmount()); ?></td>
                <td><?php echo htmlspecialchars($order->getPaymentType()); ?></td>
                <td><?php echo htmlspecialchars($order->getAddress()); ?></td>
                <td><?php echo htmlspecialchars($order->getDelievered()); ?></td>
                <td><?php echo htmlspecialchars($order->getPaid()); ?></td>
                <td><form action="index.php" method="post" id="Order Manager">
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
<?php require_once '../view/footer.php'; ?> 
