<?php
session_start();
include 'database_api.php';
include 'inc/functions.php';
$conn = getDBConnection();
$id =$_POST['add'];

$add = getToolAndWeapon($id);

// id, name, imageLink, description, price
    if(isset($add)) {
        
        $newItem = array();
        $newItem['id'] = $add[0];
        $newItem['name'] = $add[1];
        $newItem['imageLink'] = $add[2];
        $newItem['description'] = $add[3];
        $newItem['price'] = $add[4];

        $sql = "UPDATE tools_and_weapons
                SET stock = stock - 1
                WHERE id = :id";
        $np = array();
        $np[':id'] = $newItem['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
    
        
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
<html>
    <header>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script type=text/javascript> console.log('test');</script>
    </header>
</html>
test()