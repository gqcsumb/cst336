<?php
    session_start();
    
    include 'program2.php';
    $connect = getDBConnection();
    
    //Adding new failedAttempts to database
    $failedAttempts = $_POST['failedAttempts'];
    
    $sql = "INSERT INTO scores (username, failedAttempts)
            VALUES (:username, :failedAttempts)";
    $data = array(
        ":username" => $_SESSION['username'],
        ":failedAttempts" => $failedAttempts
    );
    $stmt = $connect->prepare($sql);
    $stmt->execute($data);
    
    
    //Encoding data using JSON
    echo json_encode($result);
?>