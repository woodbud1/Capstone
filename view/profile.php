<?php include 'header.php'; 
$name = User_db::get_name($username);
$email = User_db::get_email($username);
$user = User_db::get_user($username);
?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Edit Profile</h1></center>
        </div>
    </div>   
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <form action="index.php" method="post" id="edituserinfo">
            

            <p>Please update user information as needed.</p>
            
            <label>Name: </label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><font color="red"><b><?php if (isset($errorName)) {
                 echo $errorName;} ?></b></font><br>
            
            <label>Email Address: </label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><font color="red"><b><?php if (isset($errorEmail)) {
                 echo $errorEmail;} ?></b></font><br>

            <label>Password: </label>
            <input type="password" name="password"><span><font color="red"><b><?php if (isset($errorPassword)) {
                echo $errorPassword; } ?></b></font></span><br>

            <label>&nbsp;</label>
            <input type="hidden" name="username" value="<?php echo $username?>">
            <input type="hidden" name="action" value="SaveUser" />
            <input class="button" type="submit" value="Save">
            <input type="submit" name="action" class="button" value="Back To Users" >
        </form>
    </div>
</main>
<?php include 'footer.php'; ?> 
