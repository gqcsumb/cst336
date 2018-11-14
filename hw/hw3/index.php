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
            <br>
        
        </header>
        
        <main>
            
            <form id="quiz" method="post">
                
                <!-- Question 1 -->
    			<label for="numContinents"><h2>1. How many continents are in planet earth?</h2></label>
    			<br>
    			<select id="numContinents" name="Q1">
    			    <option value="Select" <?= ($_POST['Q1'] == "") ? "selected" : "" ?>>Select</option>
        			<option value="4" <?= ($_POST['Q1'] == "4") ? "selected" : "" ?>>4</option>
        			<option value="5" <?= ($_POST['Q1'] == "5") ? "selected" : "" ?>>5</option>
        			<option value="7" <?= ($_POST['Q1'] == "7") ? "selected" : "" ?>>7</option>
        			<option value="8" <?= ($_POST['Q1'] == "8") ? "selected" : "" ?>>8</option>
    			</select>
    			
    		    <hr>
    		    
    		    <!-- Question 2 -->
    			<legend><h2>2. What countries are in this continent?</h2></legend>
    			<label for='america'><img id="america" src="img/america.jpg" alt="continent" /></label>
    			<br>
    			<input id="India" type="checkbox" name="Q2" value="India" <?= ($_POST['Q2'] == "India") ? "checked" : "" ?>>
    			<label for="India">India</label>
    			<br>
    			<input id="Argentina" type="checkbox" name="Q2" value="Argentina" <?= ($_POST['Q2'] == "Argentina") ? "checked" : "" ?>>
    			<label for="Argentina">Argentina</label>
    			<br>
    			<input id="Costa Rica" type="checkbox" name="Q2" value="Costa Rica" <?= ($_POST['Q2'] == "Costa Rica") ? "checked" : "" ?>> 
    			<label for="Costa Rica">Costa Rica</label>
    			<br>
    			<input id="Greenland" type="checkbox" name="Q2" value="Greenland" <?= ($_POST['Q2'] == "Greenland") ? "checked" : "" ?>> 
    			<label for="Greenland">Greenland</label>
    			
    			<hr>
    			
    			<!-- Question 3-->
    			<legend><h2>3. What is the name of this country?</h2></legend>
    			<label for='china'><img id="china" src="img/china.jpg" alt="country3" /></label>
    			<br>
    			<input id="Russia" type="radio" name="Q3" value="Russia" <?= ($_POST['Q3'] == "Russia") ? "checked" : "" ?>>
    			<label for="Russia">Russia</label>
    			<br>
    			<input id="South Korea" type="radio" name="Q3" value="South Korea" <?= ($_POST['Q3'] == "South Korea") ? "checked" : "" ?>>
    			<label for="South Korea">South Korea</label>
    			<br>
    			<input id="England" type="radio" name="Q3" value="England" <?= ($_POST['Q3'] == "England") ? "checked" : "" ?>>
    			<label for="England">England</label>
    			<br>
    			<input id="China" type="radio" name="Q3" value="China" <?= ($_POST['Q3'] == "China") ? "checked" : "" ?>>
    			<label for="China">China</label>
    			
    		    <hr>
    		    
    		    <!-- Question 4 -->
    			<legend><h2>4. What is the name of this country?</h2></legend>
    			<label for='brazil'><img id="brazil" src="img/brazil.jpg" alt="country4" /></label>
    			<br>
    			<input id="Peru" type="radio" name="Q4" value="Peru" <?= ($_POST['Q4'] == "Peru") ? "checked" : "" ?>>
    			<label for="Peru">Peru</label>
    			<br>
    			<input id="Brazil" type="radio" name="Q4" value="Brazil" <?= ($_POST['Q4'] == "Brazil") ? "checked" : "" ?>>
    			<label for="Brazil">Brazil</label>
    			<br>
    			<input id="France" type="radio" name="Q4" value="France" <?= ($_POST['Q4'] == "France") ? "checked" : "" ?>>
    			<label for="France">France</label>
    			<br>
    			<input id="New Zeland" type="radio" name="Q4" value="New Zeland" <?= ($_POST['Q4'] == "New Zeland") ? "checked" : "" ?>>
    			<label for="New Zeland">New Zeland</label>
    			
    			<hr>
    			
    			<!-- Question 5 -->
    			<legend><h2>5. What is the name of this country?</h2></legend>
    			<label for='canada'><img id="canada" src="img/canada.jpg" alt="country5" /></label>
    			<br/>
    			<input id="Germany" type="radio" name="Q4" value="Germany" <?= ($_POST['Q5'] == "Germany") ? "checked" : "" ?>>
    			<label for="Germany">Germany</label>
    			<br>
    			<input id="Portugal" type="radio" name="Q4" value="Portugal" <?= ($_POST['Q5'] == "Portugal") ? "checked" : "" ?>>
    			<label for="Portugal">Portugal</label>
    			<br>
    			<input id="Canada" type="radio" name="Q4" value="Canada" <?= ($_POST['Q5'] == "Canada") ? "checked" : "" ?>>
    			<label for="Canada">Canada</label>
    			<br>
    			<input id="Denmark" type="radio" name="Q4" value="Denmark" <?= ($_POST['Q5'] == "Denmark") ? "checked" : "" ?>>
    			<label for="Denmark">Denmark</label>
    			
    			<hr>
                
                <!-- Question 6 -->
    			<legend><h2>6. What is the name of this country?</h2></legend>
    		    <label for='usa'><img id="usa" src="img/usa.jpg" alt="country6" /></label>
    		    <br/>
    			<input id='usa' type='text' name='Q6' value="<?php if (isset($_POST['Q6'])) echo $_POST['Q6']; ?>"/>
    
    			<hr>
    			
    			<div id="buttons">
    			    
    				<br>
    				<input type="submit" name="submit" value="Submit">
    				<input type="reset" name="reset" value="Restart">
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
     
        		
        		answers();
    		}
    	?>
        
    </body>
    
</HTML>