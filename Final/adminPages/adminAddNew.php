<?php
    // Start the session
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ../index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Heroes 4 Hire Admin Page</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
    </head>
    <body>
        
        <!-- **************************** Boostrap Navbar ********************************************************************************** -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="../admin.php">Heroes 4 Hire <strong>Admin Page</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="./adminHeroes.php">Heroes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminTaW.php">Tools And Weapons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminAnalytics.php">Analytics</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-danger" href="../userlogin/logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- ****************************************************************************************************************************** -->
        
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-2">Welcome <?= $_SESSION['username']; ?>!</h1>
                <div id="editingMessage" class="display-5">Adding a new: <?= $_POST['new']; ?></div>
                <!--<h3 class="display-6">Is a Hero: <?= $isHero; ?></h3>-->
                <!--<h3 class="display-6">Is a Tool And Weapon: <?= $isToolAndWeapon; ?></h3>-->
            </div>
        </div>
        
        <!-- Form to hold all of the values -->
      <form method="POST" action="adminSubmitNew.php" id="editForm">
        <div class="row align-items-start">
          <div class="col">
            Name
            <input type="text" class="form-control" name="name" placeholder="Enter a Name" required>
          </div>
          <div class="col">
            Image Link
            <input type="text" class="form-control" name="imageLink" placeholder="Enter an image link" required>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col">
            Description
            <textarea rows="5" name="description" class="form-control" placeholder="Enter a description..." required></textarea>
          </div>
        </div>
        <div class="row align-items-end">
          <div class="col">
            Price
            <input type=number class="form-control" name="price" placeholder="Enter a price" required>
          </div>
            <?php
              if ($_POST['new'] == 'toolAndWeapon') {
                echo "<div class='col'>
                        Stock
                        <input type=number class='form-control' name='stock' placeholder='Enter Stock Number' required>
                      </div>";
              }
            ?>
        </div>
        <button type="submit" class="btn center btn-lg btn-primary">Submit</button>
    </form>
    
    
    <?php
      if ($_POST['new'] == 'toolAndWeapon') {
        // If it is a tool and weapon
        echo '<a id="backBtn" class="btn btn-success btn-block center" href="adminTaW.php">Back</a>';
      } else {
        // If it is a hero
        echo '<a id="backBtn" class="btn btn-success btn-block center" href="adminHeroes.php">Back</a>';
      }
    
      if (isset($_SESSION['dbUpdate'])) {
        echo "<h4 id='updateMessage'>Database has been updated!</h4>";
        unset($_SESSION['dbUpdate']);
      }
    ?>
        
    </body>
</html>