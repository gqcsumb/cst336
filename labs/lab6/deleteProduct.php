<?php
    include "dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "DELETE
            FROM om_product
            WHERE producId = " . $_GET['producId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location:admin.php");
?>