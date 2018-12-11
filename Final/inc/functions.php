<?php
    function displayCart() {
        // If there are items in the Session, display them
        
        if (isset($_SESSION['cart'])) {
            echo "<table class='table'>";
            foreach ($_SESSION['cart'] as $item) {
                
                $itemId = $item['id'];
                $itemName = $item['name'];
                $itemImage = $item['imageLink'];
                $itemDesc = $item['description'];
                $itemPrice = $item['price'];
                $itemQuant = $item['quantity'];
                
                // Display item as table row
                echo '<tr>';
                echo "<td><img src='$itemImage' width='150' height='150'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemDesc</h4></td>";
                echo "<td><h4>$itemPrice</h4></td>";
                
                // Update form for this item
                echo '<form method="post">';
                echo "<input type='hidden' name='itemName' value='$itemName'>";
                echo "<td><input type='text' name='update' class='form-control' value='$itemQuant'></td>";
                echo '<td><button class="btn btn-danger">Update</button></td>';
                echo'</form>';
                
                // Hidden input element containing the item name
                echo "<form method='post'>";
                echo "<input type='hidden' name='removeId' value='$itemName'>";
                echo "<td><button class='btn btn-danger'>Remove</button></td>";
                echo "</form>";
                
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    
    function displayCartCount() {
        echo count($_SESSION['cart']);
    }
    
    function displayInvoice() {
        // If there are items in the Session, display them
        $subtotal = (array_sum(array_column($_SESSION['cart'], 'price'))* array_sum(array_column($_SESSION['cart'], 'quantity')));
        $tax = ($subtotal * .10);
        $ship = 10;
        $total = ($subtotal + $tax + $ship);
        
        if (isset($_SESSION['cart'])) {
            echo "<table class='table'>";
                echo "<td><h4>Item Name</h4></td>";
                echo "<td><h4>Price and Quantity</h4></td>";
                echo "<td><h4>Subtotal Price</h4></td>";
            foreach ($_SESSION['cart'] as $item) {
               
                $itemId = $item['id'];
                $itemName = $item['name'];
                //$itemImage = $item['imageLink'];
                $itemDesc = $item['description'];
                $itemPrice = $item['price'];
                $itemQuant = $item['quantity'];
                $itemSub = $itemPrice * $itemQuant;
                // Display item as table row
                echo '<tr>';
                //echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemPrice x $itemQuant</h4></td>";
                echo "<td><h4>$itemSub</h4></td>";
                
                echo "</tr>";
            }
            if ($subtotal != 0) {    
                echo "<tr>";
                echo "<td><h4><strong>Subtotal:</strong></h4></td>";
                echo "<td><h4></h4></td>";
                echo "<td><h4><strong>$$subtotal</strong></h4></td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><h4><strong>Tax:</strong></h4></td>";
                echo "<td><h4></h4></td>";
                echo "<td><h4><strong>$$tax</strong></h4></td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><h4><strong>Shipping:</strong></h4></td>";
                echo "<td><h4></h4></td>";
                echo "<td><h4><strong>$$ship</strong></h4></td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><h4><strong>Grand Total:</strong></h4></td>";
                echo "<td><h4></h4></td>";
                echo "<td><h4><strong>$$total</strong></h4></td>";
                echo "</tr>";
                
                echo "</table>";
            }
            else {
                echo "Your shopping cart is empty!";
            }
        }
    }
?>