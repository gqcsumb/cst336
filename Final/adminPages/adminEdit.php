<?php
    // Start the session
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ../index.php');
    }
    
    // Include the database api
    include "../database_api.php";
    // Get the conn
    $conn = getDBConnection();
    
    // Check to see what was passed, either a hero or a tool and weapon.
    $heroes = getAllHeroes();
    $taws = getToolsAndWeapons();
    $isHero = false;
    $isToolAndWeapon = false;
    $posted = array();
    
    // Check to see if it is a hero
    foreach ($heroes as $h) {
      if ($h['name'] == $_POST['editBtn']) {
        $isHero = true;
        $posted['name'] = $h['name'];
        $posted['id'] = $h['id'];
        $posted['imageLink'] = $h['imageLink'];
        $posted['description'] = $h['description'];
        $posted['price'] = $h['price'];
      }
    }
    
    // Check to see if it is a tool and weapon
    foreach ($taws as $t) {
      if ($t['name'] == $_POST['editBtn']) {
        $isToolAndWeapon = true;
        $posted['name'] = $t['name'];
        $posted['id'] = $t['id'];
        $posted['imageLink'] = $t['imageLink'];
        $posted['description'] = $t['description'];
        $posted['price'] = $t['price'];
        $posted['stock'] = $t['stock'];
      }
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
                <div id="editingMessage" class="display-5">Editing: <?= $_POST['editBtn']; ?></div>
                <!--<h3 class="display-6">Is a Hero: <?= $isHero; ?></h3>-->
                <!--<h3 class="display-6">Is a Tool And Weapon: <?= $isToolAndWeapon; ?></h3>-->
            </div>
        </div>
        
        <!-- Form to hold all of the values -->
      <form method="POST" action="adminSubmitEdits.php" id="editForm">
        <div class="row align-items-start">
          <div class="col">
            ID
            <input type="text" class="form-control" name="id" value="<?= $posted['id']; ?>" readonly>
          </div>
          <div class="col">
            Name
            <input type="text" class="form-control" name="name" value="<?= $posted['name']; ?>">
          </div>
          <div class="col">
            Image Link
            <input type="text" class="form-control" name="imageLink" value="<?= $posted['imageLink']; ?>">
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col">
            Description
            <textarea rows="5" name="description" class="form-control"><?= $posted['description']; ?></textarea>
          </div>
        </div>
        <div class="row align-items-end">
          <div class="col">
            Price
            <input type=number class="form-control" name="price" value="<?= $posted['price']; ?>">
          </div>
            <?php
              if ($isToolAndWeapon == true) {
                echo "<div class='col'>
                        Stock
                        <input type=number class='form-control' name='stock' value=" . $posted['stock'] .">
                      </div>";
              }
            ?>
        </div>
        <button type="submit" class="btn center btn-lg btn-primary">Submit</button>
    </form>
    
    
    <?php
      if (isset($posted['stock'])) {
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
        
      <!-- Scripts -->
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Custom JavaScript -->
      <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>