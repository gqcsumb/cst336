<?php

    $alpha_query = "SELECT MIN(id) AS id, firstName, lastName
                    FROM superhero
                    GROUP BY name
                    ORDER BY name ASC";
    $records = executeQuery($alpha_query);
    
    $image_query = "SELECT MIN(id) AS id, image
                    FROM superhero
                    ORDER BY RAND() LIMIT 1";
    $records = executeQuery($image_query);
    
    function executeQuery($query){
        $connect = mysqli_connect("localhost", "root", "", "final_exam_practice");
        $records = mysqli_query($connect, $query);
        return $records;
    }
    

        

?>

<!DOCTYPE html>
<html>

    <head>
        <title> Final Exam Practice </title>
        <meta charset="UTF-8">
        
        <!--<link href="css/styles.css" rel="stylesheet" type="text/css" />-->
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>

    <body>
        <div class="jumbotron">
            
            <h1> What is the real name of the following superhero? </h1>
            
            <!-- Hero Image -->
            <div class="heroImage">
                <?php
                    include 'functions.php';
            		echo '<div id="output">';
                    heroGenerator();
                ?>
            </div>
            
            <br /><br />
  
            
            <!-- Name Options -->
            <div class="realName"> 
                <?php
                    echo "<select name='1'>";
                    while ($row = mysqli_fetch_array($records)){
                        echo "<option name=realName value='" .$row[1]. "" .$row[2]. "'>" .$row[1]. " " .$row[2]. "</option>";
                    }
                    echo "</select>";
                ?>
            </div>    
  
            <br /><br />
            
            <div class="check_btn">
                <input type="submit" name="submit" value="Check Answer">
        	<br><br>
        	
        </div>
        
        <div id="question-feedback" class="answer">
            <?php
                if ("$bruceWayne" == "realName"){
                    echo "Hi";
                }
            ?>
        </div><br />
        
        <div id="scores"></div>
        
    </body>
   
</html>

