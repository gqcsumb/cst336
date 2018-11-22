<?php

if (isset ($_POST['DESC'])) {
    $desc_query = "SELECT * FROM q_quotes WHERE author = 'Albert Einstein' ORDER BY quote DESC";
    $records = executeQuery($desc_query);
} 

else if (isset ($_POST['LIFE'])) {
    $desc_query = "SELECT * FROM q_quotes WHERE quote LIKE '% life %'";
    $records = executeQuery($desc_query);
} 

else if (isset ($_POST['ALPHA'])) {
    $desc_query = "SELECT * FROM q_quotes ORDER BY quote ASC";
    $records = executeQuery($desc_query);
} 

else if (isset ($_POST['LIKED'])) {
    $desc_query = "SELECT * FROM q_quotes WHERE num_likes=(SELECT max(num_likes) FROM q_quotes)";
    $records = executeQuery($desc_query);
} 

else if (isset ($_POST['RANDOM'])) {
    $desc_query = "SELECT * FROM q_quotes ORDER BY RAND() LIMIT 1";
    $records = executeQuery($desc_query);
} 


function executeQuery($query){
    $connect = mysqli_connect("localhost", "root", "", "midterm");
    $records = mysqli_query($connect, $query);
    return $records;
}

?>

<html>
    
    <head>
        
        <body>
            
            <form action="test.php" method="post">
            
            <input type="submit" name="DESC" value="Albert Einstein in Descending"><br><br>
            <input type="submit" name="LIFE" value="Word life in it"><br><br>
            <input type="submit" name="ALPHA" value="Quotes by Alphabetical"><br><br>
            <input type="submit" name="LIKED" value="Most Liked Quote"><br><br>
            <input type="submit" name="RANDOM" value="Random Quote"><br><br>
          
            
            <table width="1000">
                <tr>
                    <th><h2>ID</h2></th>
                    <th></th>
                    <th></th>
                    <th><h2>Quote</h2></th>
                    <th></th>
                    <th></th>
                    <th><h2>Author</h2></th>
                    <th></th>
                    <th></th>
                    <th><h2>Num_Likes</h2></th>
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
                    <td><?php echo $row[2];?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $row[3];?></td>
                   
                </tr>
                <?php endwhile;?>
             
            </table>
        </body>
    </head>
</html>