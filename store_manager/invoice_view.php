<?php include './view/header.php'; ?>

<main>
    <h3><?php echo htmlspecialchars($invoice->getInvoiceID()); ?></h3>
        <div id="left_column">
            <p><b>Buyer ID:</b><?php echo htmlspecialchars($invoice->getBuyerID()); ?></p>
            <p><b>Name:</b><?php echo htmlspecialchars($invoice->getName()); ?></p>
        </div>
        <div id="right_column">
            <p><b>Payment Amount:</b> <?php echo htmlspecialchars($invoice->getPaymentAmount()); ?></p>
            <p><b>Payment Type:</b> <?php echo htmlspecialchars($invoice->getPaymentType()); ?></p>
            <p><b>Address:</b> <?php echo htmlspecialchars($invoice->getAddress()); ?></p>
            <p><b>Is is Delievered?:</b><?php echo htmlspecialchars($invoice->getDelivered()); ?></p>
            <p><b>Is is Paid?:</b><?php echo htmlspecialchars($invoice->getPaid()); ?></p>
        </div>
        <!-- <form action="index.php" method="post" id="Inventory Manager">
            <input type="hidden" name="action" value="All Products" >
            <input class="button" type="submit" value="Back To Products" >
        </form> -->
</main>
<?php include './view/footer.php'; ?>
