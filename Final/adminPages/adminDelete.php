<?php
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ../index.php');
    }
    
    include '../database_api.php';
    $conn = getDBConnection();
    
    // Get information from $_POST
    $name = $_POST['deleteBtn'];
    
     // Check to see what was passed, either a hero or a tool and weapon.
    $heroes = getAllHeroes();
    $taws = getToolsAndWeapons();
    $isHero = false;
    $isToolAndWeapon = false;
    
    // Check to see if it is a hero
    foreach ($heroes as $h) {
      if ($h['name'] == $name) {
        $isHero = true;
      }
    }
    
    // Check to see if it is a tool and weapon
    foreach ($taws as $t) {
      if ($t['name'] == $name) {
        $isToolAndWeapon = true;
      }
    }


    // To Account for a weapon or tool
    if ($isToolAndWeapon) {
        deleteToolAndWeapon($name);
        // Set a session variable to confirm update
        $_SESSION['deleted'] = true;
        // Forward the user back to the previous page
        header("Location:adminTaW.php");
    } else {
        deleteHero($name);
        // Set a session variable to confirm update
        $_SESSION['deleted'] = true;
        // Forward the user back to the previous page
        header("Location:adminHeroes.php");
    }
    
?>