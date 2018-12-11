<?php

	/* ***********************************************************************************
	*	Essential Functions:
	*		dbConnect() - dbConnect is used to establish the connection to the database.
	* ************************************************************************************
	*/
	function dbConnectTest() {
		// Create the dsn
		$dsn = "mysql:host=localhost;dbname=heroes_4_hire";
		$username = "root";
		$password = "password";

		// Create the dbConnection and then handle the exception
		try {
			$db = new PDO($dsn, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "<p>You are connected to the database!</p>";
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>An error occurred while connecting to the database: $error_message </p>";
		}
		
		return $db;
	}
	
	/* *************************************
	 * Used for Cloud9 and Heroku
	 * *************************************
	 */
	
	function getDBConnection() {
    
	    //C9 db info
	    $host = "localhost";
	    $dbName = "heroes_4_hire";
	    $username = getenv("C9_USER");
	    $password = "";
	    
	    //when connecting from Heroku
	    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
	        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	        $host = $url["host"];
	        $dbName = substr($url["path"], 1);
	        $username = $url["user"];
	        $password = $url["pass"];
	    } 
	    
	    try {
	        //Creates a database connection
	        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
	    
	        // Setting Errorhandling to Exception
	        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	    }
	    catch (PDOException $e) {
	       echo "Problems connecting to database!";
	       exit();
	    }
	    
	    
	    return $dbConn;
	}

	/* *****************************************************************************************
	 * 
	 * Getters - Heroes
	 *
	 * *****************************************************************************************
	 */

	// Function to return all heroes
	function getAllHeroes() {
		global $conn;
		// TODO: Construct the array of heroes to return a good array of heroes.
		$query = "SELECT * FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$heroes = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $heroes;
	}

	function getHeroIDs() {
		global $conn;
		$ids = array();

		$query = "SELECT id FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$heroes = $statement->fetchAll();
		$statement->closeCursor();

		// Iterate through the array of arrays called $heroes
		foreach ($heroes as $h) {
			array_push($ids, $h['id']);
		}
		return $ids;
	}

	function getHeroNames() {
		global $conn;
		$names = array();

		$query = "SELECT name FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$heroes = $statement->fetchAll();
		$statement->closeCursor();

		// Iterate through the array of arrays called $heroes
		foreach ($heroes as $h) {
			array_push($names, $h['name']);
		}
		return $names;
	}

	function getHeroDescriptions() {
		global $conn;
		$descriptions = array();

		$query = "SELECT description FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$heroes = $statement->fetchAll();
		$statement->closeCursor();

		// Iterate through the array of arrays called $heroes
		foreach ($heroes as $h) {
			array_push($descriptions, $h['description']);
		}
		return $descriptions;
	}

	function getHeroImageLinks() {
		global $conn;
		$imageLinks = array();

		$query = "SELECT imageLink FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$heroes = $statement->fetchAll();
		$statement->closeCursor();

		// Iterate through the array of arrays called $heroes
		foreach ($heroes as $h) {
			array_push($imageLinks, $h['imageLink']);
		}
		return $imageLinks;
	}

	function getHeroPrices() {
		global $conn;
		$prices = array();

		$query = "SELECT price FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$heroes = $statement->fetchAll();
		$statement->closeCursor();

		// Iterate through the array of arrays called $heroes
		foreach ($heroes as $h) {
			array_push($prices, $h['price']);
		}
		return $prices;
	}

	// Function to return a specific hero, using named parameters
	function getHero($id) {
		global $conn;
		$heroReturned = array();
		$query = "SELECT * FROM heroes WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(":id", $id);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning array - I am doing this because if I just leave h, for whatever reason,
		// everything is duplicated. So this will ensure there is just one set of all the information.
		array_push($heroReturned, $h['id']);
		array_push($heroReturned, $h['name']);
		array_push($heroReturned, $h['imageLink']);
		array_push($heroReturned, $h['description']);
		array_push($heroReturned, $h['price']);

		return $heroReturned;
	}

	// TODO: Test all of the functions from here down.
	// Function to return a specific hero's name
	function getHeroName($id) {
		global $conn;
		$heroName = "";
		$query = "SELECT name FROM heroes WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(":id", $id);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning heroName variable
		// TODO: It may not be an array though I think it is.
		$heroName = $h['name'];

		return $heroName;
	}

	function getHeroImageLink($name) {
		global $conn;
		$heroImageLink = "";
		$query = "SELECT imageLink FROM heroes WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning heroName variable
		// TODO: It may not be an array though I think it is.
		$heroImageLink = $h['imageLink'];

		return $heroImageLink;
	}

	function getHeroDescription($name) {
		global $conn;
		$heroDescription = "";
		$query = "SELECT description FROM heroes WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning heroName variable
		// TODO: It may not be an array though I think it is.
		$heroDescription = $h['description'];

		return $heroDescription;
	}

	function getHeroPrice($name) {
		global $conn;
		$heroPrice = 0;
		$query = "SELECT price FROM heroes WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning heroName variable
		// TODO: It may not be an array though I think it is.
		$heroPrice = $h['price'];

		return $heroPrice;
	}

	function getHeroId($name) {
		global $conn;
		$heroId = 0;
		$query = "SELECT id FROM heroes WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning heroName variable
		// TODO: It may not be an array though I think it is.
		$heroId = $h['id'];

		return $heroId;
	}
// *****************************************************************************************************************************

	/*
	 * ******************************************************************************************
	 *
	 * Getters for tools_and_weapons_table
	 *
	 * ******************************************************************************************
	 */

	// Get all of the tools and weapons
	function getToolsAndWeapons() {
		global $conn;
		$query = "SELECT * FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$tools = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $tools;
	}

	// Get all of the ids
	function getToolsAndWeaponsIds() {
		global $conn;
		$query = "SELECT id FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$ids = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $ids;
	}

	// Get all of the names
	function getToolsAndWeaponsNames() {
		global $conn;
		$query = "SELECT name FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$names = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $names;
	}

	// Get all of the Image Links
	function getToolsAndWeaponsImageLinks() {
		global $conn;
		$query = "SELECT imageLink FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$imageLinks = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $imageLinks;
	}

	// Get all of the Descriptions
	function getToolsAndWeaponsDescriptions() {
		global $conn;
		$query = "SELECT description FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$descriptions = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $descriptions;
	}

	// Get all of the prices
	function getToolsAndWeaponsPrices() {
		global $conn;
		$query = "SELECT price FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$prices = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $prices;
	}

	// Get all of the Stocks
	function getToolsAndWeaponsStocks() {
		global $conn;
		$query = "SELECT stock FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$stocks = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $stocks;
	}

	// Get the record of a specific tool and weapon
	function getToolAndWeapon($id) {
		global $conn;
		$toolWeapon = array();
		$query = "SELECT * FROM tools_and_weapons WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(":id", $id);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		// Construct the returning array - I am doing this because if I just leave h, for whatever reason,
		// everything is duplicated. So this will ensure there is just one set of all the information.
		array_push($toolWeapon, $h['id']);
		array_push($toolWeapon, $h['name']);
		array_push($toolWeapon, $h['imageLink']);
		array_push($toolWeapon, $h['description']);
		array_push($toolWeapon, $h['price']);
		array_push($toolWeapon, $h['stock']);

		return $toolWeapon;
	}

	// Get the id of a specific tool and weapon
	function getToolAndWeaponId($name) {
		global $conn;
		$id = 0;
		$query = "SELECT id FROM tools_and_weapons WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		$id = $h['id'];

		return $id;
	}

	// Get the name of a specific tool and weapon using the id
	function getToolAndWeaponName($id) {
		global $conn;
		$name = "";
		$query = "SELECT name FROM tools_and_weapons WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(":id", $id);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();
		// Assign the variable to return.
		$name = $h['name'];
		return $name;
	}

	// Get the imageLink of a specific tool and weapon
	function getToolAndWeaponImageLink($name) {
		global $conn;
		$imageLink = "";
		$query = "SELECT imageLink FROM tools_and_weapons WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		$imageLink = $h['imageLink'];

		return $imageLink;
	}

	// Get the description of a specific tool and weapon
	function getToolAndWeaponDescription($name) {
		global $conn;
		$description = "";
		$query = "SELECT description FROM tools_and_weapons WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		$description = $h['description'];

		return $description;
	}

	// Get the price of a specific tool and weapon
	function getToolAndWeaponPrice($name) {
		global $conn;
		$price = 0;
		$query = "SELECT price FROM tools_and_weapons WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		$price = $h['price'];

		return $price;
	}

	// Get the stock of a specific item
	function getToolAndWeaponStock($name) {
		global $conn;
		$stock = 0;
		$query = "SELECT stock FROM tools_and_weapons WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		$statement->execute();
		// Get the results of the statement
		$h = $statement->fetch();
		$statement->closeCursor();

		$stock = $h['stock'];

		return $stock;
	}

/*
 * ******************************************************************************************
 *
 * Setters (Updates) - Heroes
 *
 * ******************************************************************************************
 */

	function updateHeroName($id, $newName) {
		global $conn;
		$query = "UPDATE heroes SET name = :name WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(':name', $newName);
		$statement->bindValue(':id', $id);
		try {
			$statement->execute();
			echo "Hero name updated successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

	function updateHeroImageLink($name, $newImageLink) {
		global $conn;
		$query = "UPDATE heroes SET imageLink = :imageLink WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':imageLink', $newImageLink);
		$statement->bindValue(':name', $name);
		try {
			$statement->execute();
			echo "Hero imageLink updated successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

	function updateHeroDescription($name, $newDescrip) {
		global $conn;
		$query = "UPDATE heroes SET description = :description WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':description', $newDescrip);
		$statement->bindValue(':name', $name);
		try {
			$statement->execute();
			echo "Hero description updated successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

	function updateHeroPrice($name, $newPrice) {
		global $conn;
		$query = "UPDATE heroes SET price = :price WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':price', $newPrice);
		$statement->bindValue(':name', $name);
		try {
			$statement->execute();
			echo "Hero price updated successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();

	}

/*
 * ******************************************************************************************
 *
 * Setters (Updates) - Tools And Weapons
 *
 * ******************************************************************************************
 */

	function updateToolAndWeaponName($id, $newName) {
		global $conn;
		$query = "UPDATE tools_and_weapons SET name = :name WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(':name', $newName);
		$statement->bindValue(':id', $id);
		$statement->execute();
		$statement->closeCursor();

		// TODO: Maybe add a try catch here? Need to see what happens when given a bad value.
		echo "Name update was successful!";
	}

	function updateToolAndWeaponImageLink($name, $newImageLink) {
		global $conn;
		$query = "UPDATE tools_and_weapons SET imageLink = :imageLink WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':imageLink', $newImageLink);
		$statement->bindValue(':name', $name);
		$statement->execute();
		$statement->closeCursor();

		// TODO: Maybe add a try catch here? Need to see what happens when given a bad value.
		echo "imageLink update was successful!";
	}

	function updateToolAndWeaponDescription($name, $newDescrip) {
		global $conn;
		$query = "UPDATE tools_and_weapons SET description = :description WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':description', $newDescrip);
		$statement->bindValue(':name', $name);
		$statement->execute();
		$statement->closeCursor();

		// TODO: Maybe add a try catch here? Need to see what happens when given a bad value.
		echo "Description update was successful!";
	}

	function updateToolAndWeaponPrice($name, $newPrice) {
		global $conn;
		$query = "UPDATE tools_and_weapons SET price = :price WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':price', $newPrice);
		$statement->bindValue(':name', $name);
		$statement->execute();
		$statement->closeCursor();

		// TODO: Maybe add a try catch here? Need to see what happens when given a bad value.
		echo "Price update was successful!";

	}

	function updateToolAndWeaponStock($name, $newStock) {
		global $conn;
		$query = "UPDATE tools_and_weapons SET stock = :stock WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(':stock', $newStock);
		$statement->bindValue(':name', $name);
		$statement->execute();
		$statement->closeCursor();

		// TODO: Maybe add a try catch here? Need to see what happens when given a bad value.
		echo "Stock update was successful!";
	}

/*
 * ******************************************************************************************
 *
 * CREATE (INSERT) Functions - Heroes and Tools And Weapons
 *
 * ******************************************************************************************
 */

	function insertNewHero($name, $imageLink, $description, $price) {
		global $conn;
		$query = "INSERT INTO heroes VALUES (DEFAULT, :name, :imageLink, :description, :price)";
		$statement = $conn->prepare($query);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':imageLink', $imageLink);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':price', $price);
		try {
			$statement->execute();
			echo "New hero created successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

	function insertNewToolAndWeapon($name, $imageLink, $description, $price, $stock) {
		global $conn;
		$query = "INSERT INTO tools_and_weapons VALUES (DEFAULT, :name, :imageLink, :description, :price, :stock)";
		$statement = $conn->prepare($query);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':imageLink', $imageLink);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':stock', $stock);
		try {
			$statement->execute();
			echo "New Tool and Weapon created successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

/*
 * ******************************************************************************************
 *
 * DELETE Functions - Heroes and Tools And Weapons - All are deleted by name.
 *
 * ******************************************************************************************
 */

	function deleteHero($name) {
		global $conn;
		$query = "DELETE FROM heroes WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		try {
			$statement->execute();
			echo "Hero deleted successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

	function deleteToolAndWeapon($name) {
		global $conn;
		$query = "DELETE FROM tools_and_weapons WHERE name = :name";
		$statement = $conn->prepare($query);
		$statement->bindValue(":name", $name);
		try {
			$statement->execute();
			echo "Tool and Weapon deleted successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}

/*
 * ******************************************************************************************
 *
 * Admin Functions for Heroes and Tools and Weapons
 *
 * ******************************************************************************************
 */

	function getLowStockItems() {
		global $conn;
		$names = array();
		$query = "SELECT name, stock FROM tools_and_weapons WHERE stock < 10";
		$statement = $conn->prepare($query);
		$statement->execute();
		$n = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		foreach ($n as $i) {
			array_push($names, $i['name']);
			array_push($names, $i['stock']);
		}
		return $names;
	}

	function getHeroCount() {
		global $conn;
		$query = "SELECT COUNT(*) FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$count = $statement->fetch();
		$statement->closeCursor();
		return $count[0];
	}

	function getToolAndWeaponCount() {
		global $conn;
		$query = "SELECT COUNT(*) FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$count = $statement->fetch();
		$statement->closeCursor();
		return $count[0];
	}
	
		function getAverageHeroPrice() {
		global $conn;
		$query = "SELECT AVG(price) FROM heroes";
		$statement = $conn->prepare($query);
		$statement->execute();
		$count = $statement->fetch();
		$statement->closeCursor();
		return $count[0];
	}

	function getAverageToolAndWeaponPrice() {
		global $conn;
		$query = "SELECT AVG(price) FROM tools_and_weapons";
		$statement = $conn->prepare($query);
		$statement->execute();
		$count = $statement->fetch();
		$statement->closeCursor();
		return $count[0];
	}

	function getMostExpensiveHero() {
		global $conn;
		$query = "SELECT name FROM heroes WHERE price = (SELECT MAX(price) FROM heroes)";
		$statement = $conn->prepare($query);
		$statement->execute();
		$count = $statement->fetch();
		$statement->closeCursor();
		return $count[0];
	}

	function getMostExpensiveToolAndWeapon() {
		global $conn;
		$query = "SELECT name FROM tools_and_weapons WHERE price = (SELECT MAX(price) FROM tools_and_weapons)";
		$statement = $conn->prepare($query);
		$statement->execute();
		$count = $statement->fetch();
		$statement->closeCursor();
		return $count[0];
	}
	
	function getAnalyticRecords() {
		global $conn;
		$query = "SELECT * FROM analytics";
		$statement = $conn->prepare($query);
		$statement->execute();
		$records = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $records;

	}
	
	function addAnalyticRecord($content) {
		global $conn;
		$query = "INSERT INTO analytics VALUES (NULL, (SELECT DATE_FORMAT(NOW(), \"%Y-%m-%d %T\")), :content)";
		$statement = $conn->prepare($query);
		$statement->bindValue(":content", $content);
		try {
			$statement->execute();
			echo "Analytics saved successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while creating new record: $e </p>";
		}
		$statement->closeCursor();
	}
	
	function deleteAnalyticRecord($id) {
		global $conn;
		$query = "DELETE FROM analytics WHERE id = :id";
		$statement = $conn->prepare($query);
		$statement->bindValue(":id", $id);
		try {
			$statement->execute();
			echo "Record deleted successfully!";
		} catch(PDOException $e) {
			echo "<p>An error occurred while deleting record: $e </p>";
		}
		$statement->closeCursor();

	}

?>
