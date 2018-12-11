<?php

session_start();
include 'database_api.php';
include 'inc/functions.php';
$conn = getDBConnection();
$id =$_POST['add'];
$add = array();
$add = getHero($id);

// id, name, imageLink, description, price
    if(isset($add)) {
        
        $newItem = array();
        $newItem['id'] = $add['0'];
        $newItem['name'] = $add['1'];
        $newItem['imageLink'] = $add['2'];
        $newItem['description'] = $add['3'];
        $newItem['price'] = $add['4'];
    
        print($newItem['imageLink']);
        foreach ($_SESSION['cart'] as &$item) {
            if($newItem['id'] == $item['id']) {
                $item['quantity'] += 1;
                $found = true;
            }
        }
        
        if($found != true) {
            $newItem['quantity'] = 1;
            array_push($_SESSION['cart'], $newItem);

        }
    }

?>
