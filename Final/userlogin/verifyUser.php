<?php
session_start();

include '../database_api.php';
$connect = getDBConnection();

$sql = "SELECT * FROM users
        WHERE username = :username
        AND password = :password";
$stmt = $connect->prepare($sql);
$data = array(":username" => $_POST['username'], ":password" => sha1($_POST['password']));
$stmt->execute($data);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($user['username'])){
    $_SESSION['username'] = $user['username'];
    header('Location: ../admin.php');
} else {
    echo "The values you entered were incorrect.
    <a href='login.php' >Retry</a>";
}
?>