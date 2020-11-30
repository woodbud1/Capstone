
<main>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-10 mx-auto"> 
<section>
    <table>
        <tr>
            <th>Invoice ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Payment Type</th>
            <th>Address</th>
            <th>Delivered</th>
            <th> </th>
            <th>Paid</th>
        </tr>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
            <td><?php echo htmlspecialchars($invoice->getInvoiceID()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getBuyerID()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getName()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getPaymentAmount()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getPaymentType()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getAddress()); ?></td>
                <td><?php echo htmlspecialchars($invoice->getDelivered()); ?></td>
                <td><form action="." method="post">
                <input type="hidden" name="action" value="update_delivered">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($invoice->getInvoiceID()); ?>">
                <input type="checkbox" name="isDelivered" value="yes">
                <input class="button" type="submit" value="Delivered" >
                </form></td>
                <td><?php echo htmlspecialchars($invoice->getPaid()); ?></td>
                <td><form action="." method="post">
                <input type="hidden" name="action" value="update_paid">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($invoice->getInvoiceID()); ?>">
                <input type="checkbox" name="isPaid" value="yes">
                <input class="button" type="submit" value="Update Paid" >
                </form></td>
                <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_invoice">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($invoice->getInvoiceID()); ?>">
                <input class="button" type="submit" value="Delete!" >
                </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
</div>
</div>
</div>

