<?php include 'header.php'; 

        if(!isset($name)) { $name=''; }
        if(!isset($username)) { $username=''; }
        if(!isset($email)) { $email=''; }
        if(!isset($password)) { $password=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        if(!isset($errorStreet)) { $errorStreet=''; }
        if(!isset($errorCity)) { $errorCity=''; }
        if(!isset($errorState)) { $errorState=''; }
        if(!isset($errorPostal)) { $errorPostal=''; }
        ?>
    <body>


        <div class="row">
                <div class="large-12 columns">
                    <center><h1>Registration</h1></center>
            <!-- <center><form action="." method="post">
                        <input class="button" type="submit" value="Return To Login">
                        <input type="hidden" name="action" value="Login" />
            </form></center>
                </div> -->
        </div>    
        <form action="." method="post" id="registration">
        <input type="hidden" name="action" value="Add" />
        <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">                
                       <label>Full Name<font color="red">*</font>: </label>
                       <input type="text" name="name" placeholder="please enter your first name" value='<?php echo $name; ?>'><span><font color="red"><?php if(isset($errorName)) { echo $errorName; }?></font></span>
                    </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">             
                        <label>Email Address<font color="red">*</font>: </label>
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
                        <label>City<font color="red">*</font>: </label>
                        <input type="text" name="city" placeholder="please enter your city of residence"><span><font color="red"> <?php if(isset($errorCity)) { echo $errorCity; }?></font></span><br>
                </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>State<font color="red">*</font>: </label>
                        <input type="text" name="state" placeholder="please enter your state of residence"><span><font color="red"> <?php if(isset($errorState)) { echo $errorState; }?></font></span><br>
                    </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">   
                        <label>Zip Code<font color="red">*</font>: </label>
                        <input type="text" name="postal" placeholder="please enter your zip code"><span><font color="red"> <?php if(isset($errorPostal)) { echo $errorPostal; }?></font></span><br>
                 </div></div></div>
        <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">            
                        <label>Username<font color="red">*</font>: </label>
                        <input type="text" name="username" placeholder="please enter a username"><span><font color="red"> <?php if(isset($errorUsername)) { echo $errorUsername; }?></font></span><br>
                    </div></div></div>
       <div class="grid-container" class="fieldset">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">                
                        <label>Password<font color="red">*</font>: </label>
                        <input type="text" name="password" placeholder="please enter a password"><span><font color="red"> <?php if(isset($errorPassword)) { echo $errorPassword; }?></font></span><br>          
                </div></div>
        <div class="grid-x grid-padding-x">
                <div class="medium-12 cell">
                        <label>&nbsp;</label>
                        <input class="button" type="submit" value="Sign Up">
            <!-- <center><form action="." method="post">
                        
                        <input type="hidden" name="action" value="Add" /> -->
            </form></center>
                </div>
        </div></div></div>
        </form>
    </body>
<?php include 'footer.php'; ?>
