
<!DOCTYPE html>
<HTML lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Wolrd Map Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML' async></script>
        <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet"> 
    </head>
    
    <body>
        <header>
            
            <h1><em>World Map Quiz</em></h1>
            
            <p><em>Try to see how many you get right!</em></p>
            
        </header>
        
        <main>
            <form id="quiz" method="post">
                
    			<label for="numContinents">1. How many continents are in planet earth?</label>
    			<select id="numContinents" name="Q1">
    			<option value="4" >4</option>
    			<option value="5" >5</option>
    			<option value="8" >8</option>
    			<option value="10" >10</option>
    			</select>
    		    
    		    <hr>
    		    
    			<legend>2. What countries are in this continent?</legend>
    			<label for='pictured'><img id="america" src="img/america.jpg" alt="continent" /></label>
    			<br/>
    			<input id="India" type="checkbox" name="Q2[]" value="India" >
    			<label for="India">India</label><br>
    			<input id="Argentina" type="checkbox" name="Q2[]" value="Argentina" >
    			<label for="Argentina">Argentina</label><br>
    			<input id="Costa Rica" type="checkbox" name="Q2[]" value="Costa Rica" >
    			<label for="Costa Rica">Costa Rica</label><br>
    			<input id="France" type="checkbox" name="Q2[]" value="France" >
    			<label for="France">France</label><br>
    			<input id="Greenland" type="checkbox" name="Q2[]" value="Greenland" >
    			<label for="Greenland">Greenland</label><br>
    			
    			<hr>
    			
    			<legend>3. What is the name of this country?</legend>
    			<label for='pictured'><img id="china" src="img/china.jpg" alt="country4" /></label>
    			<br/>
    			<input id="Russia" type="radio" name="Q3" value="Russia" >
    			<label for="Russia">Russia</label><br>
    			<input id="South Korea" type="radio" name="Q3" value="South Korea" >
    			<label for="South Korea">South Korea</label><br>
    			<input id="Brazil" type="radio" name="Q3" value="Brazil" >
    			<label for="Brazil">Brazil</label><br>
    			<input id="China" type="radio" name="Q3" value="China" >
    			<label for="China">China</label><br>
    			
    						
    		    <hr>
    		
    			<legend>4. What is the name of this country?</legend>
    			<label for='pictured'><img id="china" src="img/china.jpg" alt="country4" /></label>
    			<br/>
    			<input id="Ariel" type="radio" name="Q4" value="ariel" >
    			<label for="Ariel">Ariel</label><br>
    			<input id="Umbriel" type="radio" name="Q4" value="umbriel" >
    			<label for="Umbriel">Umbriel</label><br>
    			<input id="Ganymede" type="radio" name="Q4" value="ganymede" >
    			<label for="Ganymede">Ganymede</label><br>
    			<input id="Oberon" type="radio" name="Q4" value="oberon" >
    			<label for="Oberon">Oberon</label><br>
    			
    			<hr>

    			<legend>5. What is the name of this country?</legend>
    		    <label for='pictured'><img id="usa" src="img/usa.jpg" alt="country5" /></label>
    			<input id='pictured' type='text' name='Q5' value="" />
    
    			<hr>
    			
    			<fieldset>
    			<legend>#6 Galaxies can be classified as Spiral, Elliptical, Triangular.</legend>
    			<input id="true" type="radio" name="Q6" value="true" >
    			<label for="true">True</label><br>
    			<input id="false" type="radio" name="Q6" value="false" >
    			<label for="false">False</label><br>
    			</fieldset>
    			
    			<hr>
    			
    			<fieldset>
    			<legend>#7 Andromeda is the closest galaxy to the Milky Way at a distance of:</legend>
    			<input id="3" type="radio" name="Q7" value="3" >
    			<label for="3">3 Million Light Years</label><br>
    			<input id="2.54" type="radio" name="Q7" value="2.54" >
    			<label for="2.54">2.54 Million Light Years</label><br>
    			<input id="29" type="radio" name="Q7" value="29" >
    			<label for="29">29 Million Light Years</label><br>
    			<input id="21" type="radio" name="Q7" value="21" >
    			<label for="21">21 Million Light Years</label><br>
    			</fieldset>
    			
    			<fieldset>
    			<legend>#8 Which planets have no known moons?</legend>
    			<input id="Venus" type="checkbox" name="Q8[]" value="Venus" >
    			<label for="Venus">Venus</label><br>
    			<input id="Neptune" type="checkbox" name="Q8[]" value="Neptune" >
    			<label for="Neptune">Neptune</label><br>
    			<input id="Mercury" type="checkbox" name="Q8[]" value="Mercury" >
    			<label for="Mercury">Mercury</label><br>
    			<input id="Mars" type="checkbox" name="Q8[]" value="Mars" >
    			<label for="Mars">Mars</label><br>
    			</fieldset>
    			
    			<fieldset>
    			<legend>#9 Dobsonian telescope is a type of:</legend>
    			<input id="Gallilean" type="radio" name="Q9" value="Gallilean" >
    			<label for="Gallilean">Gallilean telescope</label><br>
    			<input id="Keplerian" type="radio" name="Q9" value="Keplerian" >
    			<label for="Keplerian">Keplerian telescope</label><br>
    			<input id="Newtonian" type="radio" name="Q9" value="Newtonian" >
    			<label for="Newtonian">Newtonian telescope</label><br>
    			</fieldset>
    			
    			<fieldset>
    			<legend>#10 Optical telescopes are classified as:</legend>
    		    Refractor, 
    			<input id='telescope' type='text' name='Q10' value=""/>
    			, Catadioptric.
    			</fieldset>
    			
    			<div id="buttons">
    				<br><br>
    				<input type="submit" name="submit" value="Submit Quiz">
    				<input type="reset" name="reset" value="Clear">
    			</div>
		    </form>
        </main>
        
        <footer>

        </footer>
        
    </body>
    
</HTML>