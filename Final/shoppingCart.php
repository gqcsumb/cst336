<?php

    session_start();
    include 'inc/functions.php';
    include 'database_api.php';
    $conn = getDBConnection();
    
    // If 'removeId' has been set, search the cart for that itemId and unset it
    if (isset($_POST['removeId'])) {
        foreach ($_SESSION['cart'] as $itemKey => $item) {
            if ($item['name'] == $_POST['removeId']) {
                
                $sql ="UPDATE tools_and_weapons
                SET stock = stock + :quantity
                WHERE name = :name";
                $np = array();
                $np['name'] = $item['name'];
                $np['quantity'] = $item['quantity'];
                $stmt = $conn->prepare($sql);
                $stmt->execute($np);
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    // getToolAndWeaponStock(name)
    // 
    // If 'itemId' quantity has been set, search for the item with that ID and update quantity
    if (isset($_POST['itemName'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] == $_POST['itemName']) {
                
                $update = $_POST['update'];
                if ($item['quantity'] != $update){
                    
                    if ($item['quantity'] > $update){
                        $currentStock = getToolAndWeaponStock($item['name']);
                        $wantedStock = $item['quantity'] - $update;
                        $stock = $currentStock + $wantedStock;
                        
                        updateToolAndWeaponStock($item['name'],$stock);
                        $item['quantity'] = $update;

                    }
                    else if ($item['quantity'] < $update){
                        $currentStock = getToolAndWeaponStock($item['name']);
                        $returnedStock = $item['quantity'] - $update;
                        $stock = $currentStock + $returnedStock;
                        if($stock < 0){
                            echo "<script type=text/javascript>alert('Cannot Update: Lack of Stock');</script>";
                        }
                        else{
                            updateToolAndWeaponStock($item['name'],$stock);
                            $item['quantity'] = $update;
                        }
                       
                        
                    }
                    
                    
                     
                }
               
            }
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Temp Shopping Cart Title - "Products Page" </title>
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
                <h2>Shopping Cart</h2>
                <!-- Cart Items -->
                <?php displayCart(); ?>
            </div>
        </div>
    </body>
</html>