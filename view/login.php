<?php include 'header.php'; ?>
    <main>
        <div class="row">
                <div class="large-12 columns">
                    <center><h1>Login</h1></center>
                    <center><h3>Imperial Inventory Management Systems</h3></center>
                </div>
        </div>   
        <form action = "index.php" method = "post">       
            <div id="form-wrapper" style="max-width:500px;margin:auto;">
                <input type="hidden" name="action" value="Verify Login" />
                <label>Username: </label>
                <input type="text" name="username" value=""><br><br>
                 <label>Password: </label>
                <input type="password" name="password" value="">
                <span><font color="red"><b><?php if(isset($errorLogin)) { echo $errorLogin; }?></b></font> </span><br>
                <input class="button" type="submit" value="Login" >  
        </form>
            </div>
            <!-- <div style="text-align:center;">
            <form action = "index.php" method = "post"> 
            <input type="hidden" name="action" value="Register a New User" />
            <p>Not a member? Sign up here!
            <input class="button" type="submit" value="Register" >  
            </div> -->
    </main>
<?php include 'footer.php'; ?>
