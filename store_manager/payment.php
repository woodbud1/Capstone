<?php include '../view/header.php'; ?>
    <body>


        <div class="row">
                <div class="large-12 columns">
                    <center><h1>Payment</h1></center>
        </div>    
        <form action="." method="post" id="payment">
        <input type="hidden" name="action" value="payment" />
        <div id="form-wrapper">
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">                
                       <label>Full Name<span id="error">*</span>: </label>
                       <input type="text" name="name" placeholder="please enter your first name" value='<?php echo $name; ?>'><span><font color="red"><?php if(isset($errorName)) { echo $errorName; }?></font></span>
                    </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">             
                        <label>Email Address<span id="error">*</span>: </label>
                        <input type="text" name="email" placeholder="please enter your email address" value="<?php echo $email; ?>"><span><font color="red"> <?php if(isset($errorEmail)) { echo $errorEmail; }?></font></span><br>
                </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">              
                        <label>Street Address: </label>
                        <input type="text" name="street" placeholder="please enter your street address"><span><font color="red"> <?php if(isset($errorStreet)) { echo $errorStreet; }?></font></span><br>
                </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">               
                        <label>City<span id="error">*</span>: </label>
                        <input type="text" name="city" placeholder="please enter your city of residence"><span><font color="red"> <?php if(isset($errorCity)) { echo $errorCity; }?></font></span><br>
                </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>State<span id="error">*</span>: </label>
                        <input type="text" name="state" placeholder="please enter your state of residence"><span><font color="red"> <?php if(isset($errorState)) { echo $errorState; }?></font></span><br>
                    </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>Zip Code<span id="error">*</span>: </label>
                        <input type="text" name="postal" placeholder="please enter your zip code"><span><font color="red"> <?php if(isset($errorPostal)) { echo $errorPostal; }?></font></span><br>
                 </div></div></div>
                 <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">     
                <p>Please select payment method:
                Note: Cash or Check payments must be received before shipping out products.</p>
                <input type="radio" id="cash" name="payment_type" value="cash">
                <label for="cash">Cash</label><br>
                <input type="radio" id="check" name="payment_type" value="check">
                <label for="check">Check</label><br>
                <input type="radio" id="card" name="payment_type" value="card">
                <label for="card">Card</label>
  </div></div></div>
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
    </body>
<?php include '../view/footer.php'; ?>