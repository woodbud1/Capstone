<?php include './view/header.php'; ?>
<main>
<h1>Update Payment</h1>
<p>Only Credit or Debit Cards are being accepted for online payment. Payments with cash or check must be done in store.</p>
<form action="." method="post" id="payment">
<input type="hidden" name="action" value="update_payment" />
<div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>Credit Card Number:<span id="error">*</span>: </label>
                        <input type="text" name="ccNum" placeholder="Credit Card Number"><span><font color="red"> <?php if(isset($errorCardNum)) { echo $errorCardNum; }?></font></span><br>
                    </div></div></div>
                    <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>Credit Card Expiration Date:<span id="error">*</span>: </label>
                        <input type="text" name="ccExp" placeholder="MM/YYYY"><span><font color="red"> <?php if(isset($errorCardExp)) { echo $errorCardExp; }?></font></span><br>
                    </div></div></div>
                    <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>Credit Card Security Code:<span id="error">*</span>: </label>
                        <input type="text" name="ccSec" placeholder="Card Code"><span><font color="red"> <?php if(isset($errorCardSec)) { echo $errorCardSec; }?></font></span><br>
                    </div></div></div>
        <div class="grid-x grid-padding-x">
                <div class="medium-12 cell">
                        <label>&nbsp;</label>
                        <input class="button" type="submit" value="Done!">
            </form>
                </div>
        </div></div></div>
        </form>
</main>
<?php require_once './view/footer.php'; ?> 
