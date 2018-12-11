<?php
    session_start();
    
    // If the admin has already logged in, just take them to the admin page.
    if ($_SESSION['username'] == 'admin') {
        header('Location: ../admin.php');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <div class='container'>
        <div class='text-center'>
            
             Bootstrap Navagation Bar 
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='../index.php'>Heroes 4 Hire</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='login.php'>Login</a></li>
                        <li><a href='../shoppingCart.php'>
                        <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                        </span> Cart</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
        </div>
        </div>
        
        
        
        <div id='login'>
            <h1>Login</h1>
            <h2>Please enter credentials</h2> 
        </div>
        
        
        <!--Form to enter credentials-->
        <form method="post" action="verifyUser.php">
            <input type="text" name="username" placeholder="Username"/><br />
            <input type="password" name="password" placeholder="Password" /><br />
            <input type="submit" name="submit" value="Login"/>
        </form>
    </body>
</html>