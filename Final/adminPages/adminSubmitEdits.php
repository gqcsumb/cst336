<?php
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ../index.php');
    }
    
    include '../database_api.php';
    $conn = getDBConnection();
    
    // Get information from $_POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $imageLink = $_POST['imageLink'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    // To Account for a weapon or tool
    if (isset($_POST['stock'])) {
        $stock = $_POST['stock'];
    }
    
    // echo "<h1>ID: ". $_POST['id'] ."</h1>";
    // echo "<h1>Name: ". $_POST['name'] ."</h1>";
    // echo "<h1>ImageLink: ". $_POST['imageLink'] ."</h1>";
    // echo "<h1>Description: ". $_POST['description'] ."</h1>";
    // echo "<h1>Price: ". $_POST['price'] ."</h1>";
    // echo "<h1>Stock: ". $_POST['stock'] ."</h1>";
    
    // echo "<h1>ID: ". $id ."</h1>";
    // echo "<h1>Name: ". $name ."</h1>";
    // echo "<h1>ImageLink: ". $imageLink ."</h1>";
    // echo "<h1>Description: ". $description ."</h1>";
    // echo "<h1>Price: ". $price ."</h1>";
    // echo "<h1>Stock: ". $stock ."</h1>";
    
    
    // To Account for a weapon or tool
    if (isset($_POST['stock'])) {
        updateToolAndWeaponName($id, $name);
        updateToolAndWeaponImageLink($name, $imageLink);
        updateToolAndWeaponDescription($name, $description);
        updateToolAndWeaponPrice($name, $price);
        updateToolAndWeaponStock($name, $stock);
    } else {
        // Update Hero information
        updateHeroName($id, $name);
        updateHeroImageLink($name, $imageLink);
        updateHeroDescription($name, $description);
        updateHeroPrice($name, $price);
    }
    
    // Set a session variable to confirm update
    $_SESSION['dbUpdate'] = true;
    
    // Forward the user back to the previous page
    header("Location:adminEdit.php");
?>