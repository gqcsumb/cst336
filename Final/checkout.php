<?php 
    session_start();
    include 'inc/functions.php';
    include 'database_api.php';
    $conn = getDBConnection();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Checkout </title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
            
                <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='index.php'>Heroes 4 Hire</a>
                        </div>
                        <ul class='nav navbar-nav'>
                            <li><a href='userlogin/login.php'>Login</a></li>
                            <li><a href='shoppingCart.php'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                            </span> Cart [ <?-displayCartCount()?> ] </a></li>
                            <li><a href='checkout.php'>Checkout</a></li>
                        </ul>
                    </div>
                </nav>
                <br /> <br /> <br />
                <div class='container' id='checkout'>
                    <h2>Checkout</h2>
                    <!-- Cart Items -->
                    <?php displayInvoice(); ?>
                </div>

            </div>
        </div>
    </body>
</html>