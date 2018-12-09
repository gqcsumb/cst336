<?php
   
    $login_query = "SELECT * 
                    FROM fe_login 
                    WHERE failedAttempts>=3
                    ORDER BY studentId ASC";
    $records = executeQuery($login_query);
    
    if (isset ($_POST['unlock'])) {
        echo "Hi";
    }


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <title>Unlocking Accounts</title>
        <!--<link href="css/styles.css" rel="stylesheet" type="text/css" />-->
    </head>
    
    <body>
        <div class= "container">
            <br>
            <div class="header">
                <h1>Unlocking Accounts</h1>
            </div>
            
            <div id="error-msg" class="alert alert-danger" style="display:none" role="alert"></div>
        
            <div class= "table">
                
                <br>
                <table width="500">
                    <thead>
                        <th>Username</th>
                        <th>Failed Attempts</th>
                        <th>Action</th
                    </thead>
                    
                    <?php
                    while ($row = mysqli_fetch_array($records)):?>
                    <tr>
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><a href="#" data-role="update" >Unlock</a><br><br></td>
                    </tr>
                    <?php endwhile;?>
                 
                </table>
                
            
            </div>
            
        </div>
        
        
        <script>
           $(document).ready(function(){
               
            $(document).on('click','a[data-role=update]',function(){
                var id = $(this).data('id');
                var failedAttempts = 0;
                
                $('#failedAttempts').val(failedAttempts);
            });
            
            $('#save').click(function(){
                var id  = $('#userId').val(); 
                var firstName =  $('#firstName').val();
            
                $.ajax({
                    type : "post",
                    url  : "submit.php",            
                    dataType : "json",
                    data : {"failedAttempts" : failedAttempts},            
                    success : function(response){
                        console.log(response);
                        
                    }
                });//AJAX
            });  
        </script>
        
        
        
        
        
        
        
        
        
         
      <table border="1" width="600" id="rubric">
			<tbody>
				<tr>
					<th>#</th><th>Task Description</th><th>Points</th>
				</tr>
				<tr style="background-color:white">
					<td>1</td>
					<td>The list of locked accounts is properly displayed, including the username and failed attempts.</td>
					<td width="20" align="center">15</td>
				</tr>
				<tr style="background-color:white">
					<td>2</td>
					<td>When clicking on any of the "unlock" buttons a JavaScript function is executed. </td>
					<td width="20" align="center">10</td>
				</tr>
				<tr style="background-color:white">
					<td>3</td>
					<td>When clicking on any of the "unlock" buttons, an AJAX function deletes properly the record from the fe_lock table.</td>
					<td width="20" align="center">15</td>
				</tr>
				<tr style="background-color:white">
					<td>3</td>
					<td>When clicking on the "unlock" button, the AJAX function updates the value of the failedAtttempts field back to 0</td>
					<td width="20" align="center">15</td>
				</tr>
				<tr style="background-color:white">
					<td>4</td>
					<td>When clicking on the "unlock" button, the AJAX function updates the display of the table row corresponding to the account unlocked.
					    <br> Hint: Use "context: this" as part of the ajax call, like:<br>
					 $.ajax({<br>
					 	context: this,<br>
	                     type: 'get',<br>
	                     
					</td>
					<td width="20" align="center">15</td>
				</tr>
				<tr style="background-color:white">
					<td>5</td>
					<td>This rubric is properly included AND UPDATED</td>
					<td width="20" align="center">2</td>
				</tr>
				<tr>
					<td></td>
					<td>T O T A L </td>
					<td width="20" align="center">&nbsp;</td>
				</tr>
			</tbody>
		</table>  
        
        
        
   
    </body>
    
    
</html>