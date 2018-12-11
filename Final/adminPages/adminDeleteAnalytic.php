<?php
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ../index.php');
    }
    
    include '../database_api.php';
    $conn = getDBConnection();
    
    // Get information from $_POST
    $id = $_POST['deleteBtn'];
    
    // Delete the record
    deleteAnalyticRecord($id);
    header("Location:adminAnalytics.php");
    
?>