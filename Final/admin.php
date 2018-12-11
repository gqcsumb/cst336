<?php
    // Start the session
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ./index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Heroes 4 Hire Admin Page</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        
        <!-- **************************** Boostrap Navbar ********************************************************************************** -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="admin.php">Heroes 4 Hire <strong>Admin Page</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminPages/adminHeroes.php">Heroes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminPages/adminTaW.php">Tools And Weapons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminPages/adminAnalytics.php">Analytics</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-danger" href="./userlogin/logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- ****************************************************************************************************************************** -->
        
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-2">Welcome <?= $_SESSION['username']; ?></h1>
            <p class="display-4 lead">Please select an option from the navigation bar.</p>
        </div>
    </div>
        
    </body>
</html>