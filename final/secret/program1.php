<?php
   
    $login_query = "SELECT * FROM fe_login ORDER BY studentId ASC";
    $records = executeQuery($login_query);
    
    $locked_query = "SELECT * FROM fe_lock ORDER BY studentId ASC";
    $records2 = executeQuery($locked_query);

    function executeQuery($query){
        $connect = mysqli_connect("localhost", "root", "", "final");
        $records = mysqli_query($connect, $query);
        $records2 = mysqli_query($connect, $query);
        return $records;
        return $records2;
    }
    

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        
        
        <title>Login</title>
        <!--<link href="css/styles.css" rel="stylesheet" type="text/css" />-->
    </head>
    
    <body>
        <div class= "container">
            <br>
            <div class="header">
                <h1>Login</h1>
            </div>
            
            <div id="error-msg" class="alert alert-danger" style="display:none" role="alert"></div>
            
            <!--Form to enter credentials-->
            <form method="post" action="verifyUser.php">
                <input type="text" name="username" placeholder="Username"/><br /><br />
                <input type="password" name="password" placeholder="Password"/><br /><br />
                <input type="submit" id="submit" name="submit" value="Login"/>
            </form>
            <br><br>
            
            <div class= "table">
                <h4>"fe_login" Table Data</h4>
                <br>
                <table width="800">
                    <tr>
                        <th><h5>studentId</h5></th>
                        <th></th>
                        <th></th>
                        <th><h5>username</h5></th>
                        <th></th>
                        <th></th>
                        <th><h5>failedAttempts</h5></th>
                        <th></th>
                        <th></th>
                        <th><h5>daysLeftPwdChange</h5></th>
                    </tr>
                    
                    <?php
                    while ($row = mysqli_fetch_array($records)):?>
                    <tr>
                        <td><?php echo $row[0];?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row[1];?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row[3];?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row[4];?></td>
                    </tr>
                    <?php endwhile;?>
                 
                </table>
            </div>
            
            <div class= "lockedstudents">
                <?php
                        echo "Locked Students Ids: ";
                        while ($row = mysqli_fetch_array($records2)):?>
                            <tr>
                                <td><?php echo $row[0];?></td>
                            </tr>
                <?php endwhile;?>
            </div>
        </div>
        <br><br>
        
        
        
           
          <table border="1" width="600">
            <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
             <tr style="background-color:white">
              <td>1</td>
              <td>The data from the fe_login table is displayed below the Login form  </td>
              <td width="20" align="center">5</td>
            </tr>
             <tr style="background-color:white">
              <td>2</td>
              <td>The locked Student ids (from the fe_lock table) are displayed  </td>
              <td width="20" align="center">5</td>
            </tr>   
             <tr style="background-color:white">
              <td>3</td>
              <td>The welcome.php file is shown when the user enters the right credentials AND the account is NOT locked.</td>
              <td width="20" align="center">5</td>
            </tr>    
             <tr style="background-color:white">
              <td>4</td>
              <td>After typing the username, the number of days left to change the password is shown in red if the value of daysLeftPwdChange is between 1 and 15</td>
              <td width="20" align="center">10</td>
            </tr>     
             <tr style="background-color:white">
              <td>5</td>
              <td>After typing the username, "You must change your Password NOW" is displayed in red if the value of daysLeftPwdChange is 0</td>
              <td width="20" align="center">10</td>
            </tr>      
             <tr style="background-color:white">
              <td>6</td>
              <td>If the account is NOT locked, the "failedAttempts" field is reset to 0 when the user enters the right credentials.</td>
              <td width="20" align="center">15</td>
            </tr>      
            <tr style="background-color:white">
              <td>7</td>
              <td>The "failedAttempts" field is increased by 1 when entering the wrong password</td>
              <td width="20" align="center">15</td>
            </tr> 
            <tr style="background-color:white">
              <td>8</td>
              <td>A new record is inserted in the "fe_lock" table when the "failedAttempts" field has a value of 3.</td>
              <td width="20" align="center">15</td>
            </tr>  
             <tr style="background-color:white">
              <td>9</td>
              <td>The message "This account is locked" is displayed when the account is locked and entering the right username/password</td>
              <td width="20" align="center">10</td>
            </tr> 
             <tr style="background-color:white">
              <td>10</td>
              <td>This rubric is properly included AND UPDATED</td>
              <td width="20" align="center">2</td>
            </tr>     
             <tr>
              <td></td>
              <td>T O T A L </td>
              <td width="20" align="center">&nbsp;</td>
            </tr> 
          </tbody></table>
        
   
    </body>
</html>