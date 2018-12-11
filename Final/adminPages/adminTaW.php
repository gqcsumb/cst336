<?php
    // Start the session
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ./index.php');
    }
    
    // Include the database api
    include "../database_api.php";
    // Get the conn
    $conn = getDBConnection();
    
    // Get all the heroes in an array
    $taw = getToolsAndWeapons();
    
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
              <li class="nav-item">
                <a class="nav-link" href="./adminHeroes.php">Heroes</a>
              </li>
              <li class="nav-item active">
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
                <div id="editingMessage" class="display-5">Please select an item!</div>
            </div>
        </div>
        
        <!-- Create new button -->
        <form method="POST" action="adminAddNew.php">
          <button id='newBtn' type='submit' class='btn btn-info btn-block' name='new' value='toolAndWeapon'>Add A New Item</button>
        </form>
        
        <!-- Deleted Message -->
        <?php
          if (isset($_SESSION['deleted'])) {
            echo "<h4 id='deleteMessage'>Deletion successful!</h4>";
            unset($_SESSION['deleted']);
          }
        ?>
        
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image Link</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
              <?php
                
                foreach ($taw as $t) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $t['id'] . "</th>";
                        echo "<td>" . $t['name'] ."</td>";
                        echo "<td><img id='heroImages' src='" . $t['imageLink'] ."'/></td>";
                        echo "<td>" . $t['description'] ."</td>";
                        echo "<td>$" . $t['price'] .".00</td>";
                        echo "<td>" . $t['stock'] ."</td>";
                        echo "<td>";
                        echo "<form method='POST' action='./adminEdit.php'>
                                <div class='form-group'>
                                <button class='btn btn-success' type='submit' name='editBtn' value=\"" . $t['name'] . "\">Edit</button>";
                        echo "</form>";
                        echo "<form method='POST' action='./adminDelete.php'>
                                <div class='form-group'>
                                <button id='deleteBtn' class='btn btn-danger' type='submit' name='deleteBtn' value=\"" . $t['name'] . "\">Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                      }
                
              ?>
            </tbody>
      </table>
      <!-- Scripts -->
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Custom JavaScript -->
      <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>