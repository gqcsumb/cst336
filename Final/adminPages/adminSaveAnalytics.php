<?php
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ../index.php');
    }
    
    include '../database_api.php';
    $conn = getDBConnection();
    
    // Variable to hold the information
    $analytics = $_POST['savedAnalytics'];
    
    // Call the database_api function to update the record
    addAnalyticRecord($analytics);
    
    // print($_POST['savedAnalytics']);
    
    // Set a session variable to confirm update
    $_SESSION['saveAnalytics'] = true;
    
    // Forward the user back to the previous page
    header("Location:adminAnalytics.php");
?>