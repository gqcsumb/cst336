<?php
    include 'inc/functions.php';
    session_start();
    
    // DB Connect
    include "database_api.php";
    // Variable for api
    $conn = getDBConnection();
    
    
    //Setup Cart
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    echo "<script type=text/javascript>
                function ajaxCallHero(id) {
                
                    $.ajax({
    		                type:'POST',
                            url:'addHeroToCart.php',
                            data:{'add':id},
                            success:function(data,status){
                                console.log(id);
                                console.log(status);
                                
                            },
                            error:function(status){
                                console.log(status);
                            }
                        });
                window.location = 'index.php';
                }
                function ajaxCallItem(id) {
                
                    $.ajax({
    		                type:'POST',
                            url:'addItemToCart.php',
                            data:{'add':id},
                            success:function(data,status){
                                console.log(id);
                                console.log(status);
                                
                            },
                            error:function(status){
                                console.log(status);
                            }
                        });
                window.location = 'index.php';
                }
         </script>";
         
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['Price'];
            if($id == '' & $name =='' & $price == '')
            {
                header('Location:index.php');
            }
            $np = array();
            $sql = 'SELECT * from heroes WHERE 1';
            $sql2 = 'SELECT * from tools_and_weapons WHERE 1';
            $sql3 = 'SELECT * from heroes WHERE 1';
            if ($id != ''){
                $sql .= " AND id = :id";
                $sql2 .= " AND id = :id";
                $sql3 .= " AND id = :id";
                $np[':id'] = $id;
            }
            if ($name != ''){
                $sql .= " AND name LIKE :name";
                $sql2 .= " AND name LIKE :name";
                $sql3 .= " AND name LIKE :name";
                $np[':name'] = $name;
            }
            if ($price != ''){
                $sql .= " AND price <= :price";
                $sql2 .= " AND price <= :price";
                $sql3 .= " AND price <= :price";
                $np[':price'] = $price;
            }
            
            
            $statement = $conn->prepare($sql);
		    $statement->execute($np);
		    $heroResults = $statement->fetchAll(PDO::FETCH_ASSOC);
		    
		    $statement = $conn->prepare($sql2);
		    $statement->execute($np);
		    $toolResults = $statement->fetchAll(PDO::FETCH_ASSOC);
		    
		    $statement = $conn->prepare($sql3);
		    $statement->execute($np);
		    $unknownResults = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html>
    <header>
        
        <title>Heroes 4 Hire</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </header>
    <body>
       <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='index.php'>Heroes 4 Hire</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='userlogin/login.php'>Login</a></li>
                        <li><a href='shoppingCart.php'>
                        <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                        </span> Cart [ <?-displayCartCount()?> ]</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
        </div>
        </div>
        
        
        
        
        <div id="mart">
            <h3>Results</h3>
            <form id='searchBar' method="POST" action='searchResults.php'>
                Please enter your item's exact details for a quick search!<br>
                Full Name <input name='name' type='text' value=''>
                Max Price <input name='Price' type='text' value=''>
                ID <input name='id' type='text'size='3' value=''>
                <button type='submit'>Search</button>
            </form>
            <br />
            <?php
            
            ?>
            <table id='results'>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Description</td>
                    <td>Price</td>
                    </tr><tr>
                    <?php 

                 		foreach ($heroResults as $h) {
                 			echo "<td width='50'>".$h['id']."</td>";
                 			echo "<td>".$h['name']."</td>";
                 			echo "<td width='150'><img src='".$h['imageLink']."'width='75'height='75'></td>";
                 			echo "<td width='1000'>".$h['description']."</td>";
                			echo "<td>".$h['price']."</td>";
                 			echo "<td>";
                			echo "<button id='AddHero' type='submit' onclick='ajaxCallHero(".$h['id'].")'>Add to Cart</button>";
                 			echo "</td>";
                    		echo "</tr><tr>";
               			    // id, name, imageLink, description, price
                 		}
                    ?>
                </tr>
            </table>
            <?php
                if(isset($toolResults[0]['stock'])) {
                    echo "<table id='resultsTools'>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Description</td>
                    <td width='50'>Price</td>
                    <td>Stock</td>
                    </tr><tr>";
                foreach ($toolResults as $h) {
                 			echo "<td width='50'>".$h['id']."</td>";
                 			echo "<td>".$h['name']."</td>";
                 			echo "<td width='150'><img src='".$h['imageLink']."'width='75'height='75'></td>";
                 			echo "<td width='1000'>".$h['description']."</td>";
                			echo "<td>".$h['price']."</td>";
                			echo "<td>".$h['stock']."</td>";
                			echo "<td>";
                			echo "<button id='AddHero' type='submit' onclick='ajaxCallHero(".$h['id'].")'>Add to Cart</button>";
                 			echo "</td>";
                    		echo "</tr><tr>";
               			    // id, name, imageLink, description, price
                 		}
                 echo "</tr>
            </table>";
                    
                }
            ?>
            <!--<table id='resultsTools'>-->
            <!--    <tr>-->
            <!--        <td>ID</td>-->
            <!--        <td>Name</td>-->
            <!--        <td>Image</td>-->
            <!--        <td>Description</td>-->
            <!--        <td width='50'>Price</td>-->
            <!--        <td>Stock</td>-->
            <!--        </tr><tr>-->
                    <?php 

                //  		foreach ($toolResults as $h) {
                //  			echo "<td width='50'>".$h['id']."</td>";
                //  			echo "<td>".$h['name']."</td>";
                //  			echo "<td width='150'><img src='".$h['imageLink']."'width='75'height='75'></td>";
                //  			echo "<td width='1000'>".$h['description']."</td>";
                // 			echo "<td>".$h['price']."</td>";
                // 			echo "<td>".$h['stock']."</td>";
                // 			echo "<td>";
                // 			echo "<button id='AddHero' type='submit' onclick='ajaxCallHero(".$h['id'].")'>Add to Cart</button>";
                //  			echo "</td>";
                //     		echo "</tr><tr>";
               	// 		    // id, name, imageLink, description, price
                //  		}
                    ?>
            <!--    </tr>-->
            <!--</table>-->
            <!--<table id='resultsExtra'>-->
            <!--    <tr>-->
            <!--        <td>ID</td>-->
            <!--        <td>Name</td>-->
            <!--        <td>Image</td>-->
            <!--        <td>Description</td>-->
            <!--        <td>Price</td>-->
            <!--        </tr><tr>-->
                    <?php 

                //  		foreach ($heroResults as $h) {
                //  			echo "<td width='50'>".$h['id']."</td>";
                //  			echo "<td>".$h['name']."</td>";
                //  			echo "<td width='150'><img src='".$h['imageLink']."'width='75'height='75'></td>";
                //  			echo "<td width='1000'>".$h['description']."</td>";
                // 			echo "<td>".$h['price']."</td>";
                //  			echo "<td>";
                // 			echo "<button id='AddHero' type='submit' onclick='ajaxCallHero(".$h['id'].")'>Add to Cart</button>";
                //  			echo "</td>";
                //     		echo "</tr><tr>";
               	// 		    // id, name, imageLink, description, price
                // 		}
                    ?>
            <!--    </tr>-->
            <!--</table>-->
        </div>
        <!-- Javascript links-->
       
		 
		
		
    </body>
</html>

