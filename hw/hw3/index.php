<?php

function checkAnswers() {
    
    if (isset($_POST['Q2'])) {
        if (in_array('Argentina', $_POST['Q2']) && ('Costa Rica', $_POST['Q2']) && ('Greenland', $_POST['Q2'])) {
            echo "<h2>You are correct</h2>";
        } else {
            echo "<h2>Try again</h2>";
        }
    }

}
    
?>


<!DOCTYPE html>
<HTML lang="en">
    
    <head>
        <meta charset="UTF-8">
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML' async></script>
        
        <title>World Map Quiz</title>
    </head>
    
    <body>
        <header>
            
            <h1>World Map Quiz</h1>
            <br><br>
        
        </header>
        
        <main>
            <form id="quiz" method="post">
                
    			<label for="numContinents"><h2>1. How many continents are in planet earth?</h2></label>
    			<br/>
    			<select id="numContinents" name="Q1">
        			<option value="4" >4</option>
        			<option value="5" >5</option>
        			<option value="7" >7</option>
        			<option value="8" >8</option>
    			</select>
    			
    			<input type="text" bane="name" value="<?php echo $_GET['name']; ?>">
    			
    		    <hr>
    		    
    			<legend><h2>2. What countries are in this continent?</h2></legend>
    			<label for='pictured'><img id="america" src="img/america.jpg" alt="continent" /></label>
    			<br/>
    			<input id="India" type="checkbox" name="Q2[]" value="India" <?= (in_array('India', $_POST['Q2'])) ? "checked" : ""; ?>>
    			<label for="India">India</label><br>
    			<input id="Argentina" type="checkbox" name="Q2[]" value="Argentina" <?= (in_array('Argentina', $_POST['Q2'])) ? "checked" : ""; ?>>
    			<label for="Argentina">Argentina</label><br>
    			<input id="Costa Rica" type="checkbox" name="Q2[]" value="Costa Rica" <?= (in_array('Costa Rica', $_POST['Q2'])) ? "checked" : ""; ?>> 
    			<label for="Costa Rica">Costa Rica</label><br>
    			<input id="Greenland" type="checkbox" name="Q2[]" value="Greenland" <?= (in_array('Greenland', $_POST['Q2'])) ? "checked" : ""; ?>> 
    			<label for="Greenland">Greenland</label><br>
    			
    			<hr>
    			
    			<legend><h2>3. What is the name of this country?</h2></legend>
    			<label for='pictured'><img id="china" src="img/china.jpg" alt="country3" /></label>
    			<br/>
    			<input id="Russia" type="radio" name="Q3" value="Russia" <?= (in_array('Russia', $_POST['Q3'])) ? "checked" : ""; ?>>
    			<label for="Russia">Russia</label><br>
    			<input id="South Korea" type="radio" name="Q3" value="South Korea" <?= (in_array('South Korea', $_POST['Q3'])) ? "checked" : ""; ?>>
    			<label for="South Korea">South Korea</label><br>
    			<input id="Brazil" type="radio" name="Q3" value="Brazil" <?= (in_array('Brazil', $_POST['Q3'])) ? "checked" : ""; ?>>
    			<label for="Brazil">Brazil</label><br>
    			<input id="China" type="radio" name="Q3" value="China" <?= (in_array('China', $_POST['Q3'])) ? "checked" : ""; ?>>
    			<label for="China">China</label><br>
    			
    		    <hr>
    		
    			<legend><h2>4. What is the name of this country?</h2></legend>
    			<label for='pictured'><img id="brazil" src="img/brazil.jpg" alt="country4" /></label>
    			<br/>
    			<input id="Peru" type="radio" name="Q4" value="Peru" <?= (in_array('Peru', $_POST['Q4'])) ? "checked" : ""; ?>>
    			<label for="Peru">Peru</label><br>
    			<input id="Brazil" type="radio" name="Q4" value="Brazil" <?= (in_array('Brazil', $_POST['Q4'])) ? "checked" : ""; ?>>
    			<label for="Brazil">Brazil</label><br>
    			<input id="France" type="radio" name="Q4" value="France" <?= (in_array('France', $_POST['Q4'])) ? "checked" : ""; ?>>
    			<label for="France">France</label><br>
    			<input id="New Zeland" type="radio" name="Q4" value="New Zeland" <?= (in_array('New Zeland', $_POST['Q4'])) ? "checked" : ""; ?>>
    			<label for="New Zeland">New Zeland</label><br>
    			
    			<hr>
    			
    			<legend><h2>5. What is the name of this country?</h2></legend>
    			<label for='pictured'><img id="canada" src="img/canada.jpg" alt="country5" /></label>
    			<br/>
    			<input id="Germany" type="radio" name="Q4" value="Germany" <?= (in_array('Germany', $_POST['Q5'])) ? "checked" : ""; ?>>
    			<label for="Germany">Germany</label><br>
    			<input id="Portugal" type="radio" name="Q4" value="Portugal" <?= (in_array('Portugal', $_POST['Q5'])) ? "checked" : ""; ?>>
    			<label for="Portugal">Portugal</label><br>
    			<input id="Canada" type="radio" name="Q4" value="Canada" <?= (in_array('Canada', $_POST['Q5'])) ? "checked" : ""; ?>>
    			<label for="Canada">Canada</label><br>
    			<input id="Denmark" type="radio" name="Q4" value="Denmark" <?= (in_array('Denmark', $_POST['Q5'])) ? "checked" : ""; ?>>
    			<label for="Denmark">Denmark</label><br>
    			
    			<hr>

    			<legend><h2>6. What is the name of this country?</h2></legend>
    		    <label for='pictured'><img id="usa" src="img/usa.jpg" alt="country6" /></label>
    		    <br/>
    			<input id='pictured' type='text' name='Q6' value="" / <?= (in_array('', $_POST['Q6'])) ? "checked" : ""; ?>>
    
    			<hr>
    			
    			<div id="buttons">
    				<br>
    				<input type="submit" name="submit" value="Submit">
    				<input type="restart" name="restart" value="Restart">
    			</div>
		    </form>
        </main>
        
        <!-- Display Search Results -->
        <?php checkAnswers(); ?>
        
    </body>
    
</HTML>