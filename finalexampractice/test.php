<?php

    $alpha_query = "SELECT MIN(id) AS id, name
                    FROM superhero
                    GROUP BY name
                    ORDER BY name ASC";
    $records = executeQuery($alpha_query);



function executeQuery($query){
    $connect = mysqli_connect("localhost", "root", "", "final_exam_practice");
    $records = mysqli_query($connect, $query);
    return $records;
}

?>

<html>
    
    
        
    <head>
        <title> TEST </title>
        <meta charset="utf-8" />
        <!--<link href="css/midtermStyles.css" rel="stylesheet" type="text/css" />-->
        
    </head>
        
        <body>
            
            <header>
                <h1> test </h1>
            </header>
            <br>


            <hr>

            <?php
                echo "<select name='1'>";
                while ($row = mysqli_fetch_array($records)){
                    echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                }
                echo "</select>";
            ?>
              
        </body>
    
</html>

