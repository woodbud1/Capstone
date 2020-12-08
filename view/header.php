<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Inventory Manager 1.0</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./css/foundation.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/png" href="./images/favicon.png">
</head>
<!-- the body section -->
<body>
    <header>
        <form action="." method="post" id="landing" class="header_style">
        <span><img src="./images/favicon.png" alt="Company Logo" height="40" width="40">
        <span>Inventory Manager<span>
            <input type="submit" name="action" class="button" value="Edit Profile" >
            <?php if (($_SESSION['type']) > 0) 
            { ?><input type="submit" name="action" class="button" value="Store Manager" >
            <input type="submit" name="action" class="button" value="Inventory Manager" >
            <input type="submit" name="action" class="button" value="User Manager" ><?php } ?>
            <input type="submit" name="action" class="button" value="Order Manager" >
            <input class="button" type="submit" name="action" value="Logout" >
        </form>
        <br>
        <br>
    </header>
