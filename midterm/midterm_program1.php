<!DOCTYPE html>
<html>

    <head>
        <title> Team Generator </title>
        <meta charset="UTF-8">
        
        <link href="css/midtermStyles.css" rel="stylesheet" type="text/css" />
        <!--<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">-->
    </head>

    <body>
        <div class="jumbotron">
            <h1> Superhero Team Generator </h1>
        </div>
                
 
        <br /><br />
        
        <main>
            
            <form id="quiz" method="post">
                
                <!-- Team Size -->
    			<legend><h3>Team Size: </h3></legend>
    			<input id='teamSize' type='text' name='teamSize' value="<?php if (isset($_POST['teamSize'])) echo $_POST['teamSize']; ?>"/>
            
    			
    			<!--Team Gender -->
    			<legend><h3>Team Gender:</h3></legend>
    		
    			<input id="female" type="radio" name="teamGender" value="female" <?= ($_POST['teamGender'] == "female") ? "checked" : "" ?>>
    			<label for="female">Female</label>
    			
    			<input id="male" type="radio" name="teamGender" value="male" <?= ($_POST['teamGender'] == "male") ? "checked" : "" ?>>
    			<label for="male">Male</label>
    			
    			<input id="coed" type="radio" name="teamGender" value="coed" <?= ($_POST['teamGender'] == "coed") ? "checked" : "" ?>>
    			<label for="coed">Coed</label>
    			
    			
    			<!--Alpha Order -->
    			<legend><h3>Display team members in alphabetical order:</h3></legend>
    		
    			<input id="az" type="radio" name="alphaOrder" value="az" <?= ($_POST['alphaOrder'] == "az") ? "checked" : "" ?>>
    			<label for="az">A-Z</label>
    			
    			<input id="za" type="radio" name="alphaOrder" value="za" <?= ($_POST['alphaOrder'] == "za") ? "checked" : "" ?>>
    			<label for="za">Z-A</label>
    			
    			
    			<!-- Display Images -->
                <br>    		
    			<input id="displayImages" type="checkbox" name="displayImages" value="displayYes" <?= ($_POST['displayImages'] == "displayImages") ? "checked" : "" ?>>
    			<label for="displayImages">Display Images</label>
    	
 
                <div id="buttons">
    			    
    				<br>
    				<input type="submit" name="submit" value="Generate Team">
    				<br><br>
    			
    				
    			</div>
    			
    			<hr>
    			
		    </form>
		    
            
        </main>
        
        <!-- Display Results -->
        <?php
    		if (!empty($_POST['submit'])) {
    			
    			
        		include 'functions.php';
        		echo '<div id="output">';
     
        		
        		teamGenerator();
        		
        		
    		}
    	?>
        
    </body>
   
   

</html>