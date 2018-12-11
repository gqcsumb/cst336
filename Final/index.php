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
         </script>"
?>

<!DOCTYPE html>

<html>
    <header>
        
        <title>Heroes 4 Hire</title>
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        
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
                        <li><a href='checkout.php'>Checkout</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
        </div>
        </div>
        
        
        
        
        <div id="mart">
            <!-- Added this at 6:53 PM because we think it was removed by mistake - AJ -->
            <form id='searchBar' method="POST" action='searchResults.php'>
                Please enter your item's exact details for a quick search!<br>
                Full Name <input name='name' type='text' value=''>
                Max Price <input name='Price' type='text' value=''>
                ID <input name='id' type='text'size='3' value=''>
                <button type='submit'>Search</button>
            </form>
           
            <!---------------HEROES--------------->
            <div class="container-fluid" id="heroesMart">
                <br>
                <div class="heroesTitle">
                    Heroes
                </div>
                <br><br>
                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
                <?php $heroes = getAllHeroes();
                      foreach ($heroes as $h) { 
                ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="heroesthumbnail">
                        <br>
                        
                        <div class="heroesImage">
                            <?php echo "<td width='150'><img src='".$h['imageLink']."'width='200'height='200'></td>"; ?>
                        </div>
                        
                        <div class="heroesName">
                            <?php echo "<td>".$h['name']."</td>";?>
                        </div>
                        
                        <div class="heroesDescription">
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#heroesModal" data-name="<?php echo "".$h['name']."";?>" data-description="<?php echo "".$h['description'].""; ?>">Open Description</button>
                            
                            <div class="modal fade" id="heroesModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header" id="heroesModalHeader">
                                            <h0 class="modal-title">New Message</h0>
                                            
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <h3 class="modal-description">New Message</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $('#heroesModal').on('show.bs.modal', function (event) {
                                  var button = $(event.relatedTarget) // Button that triggered the modal
                                  var name = button.data('name') 
                                  var description = button.data('description')
                                  var modal = $(this)
                                  modal.find('.modal-title').text(name)
                                  modal.find('.modal-description').text(description)
                                })
                            </script>
                            
                        </div>
                        
                        <div class="heroesPrice">
                            <p><?php echo "Price: ", "<td>".$h['price']."</td>"; ?></p>
                        </div>
                        
                        <div class="heroesBtn">    
                            <p><?php echo "<button id='AddHero' class='btn btn-warning' type='submit' onclick='ajaxCallHero(".$h['id'].")'>Add Hero to Cart</button>"; ?></p>
                        </div>
                        
                        <br>
                    </div>
                    <br><br>
                </div>
                <?php } ?>
            </div>
            



            <!---------------TOOLS--------------->
            <div class="container-fluid" id="toolsMart">
                <br><br><br>
                <div class="toolsTitle">
                    Tools and Weapons
                </div>
                <br><br>
                <div class="clearfix visible-lg visible-md"></div>
                <?php $tools = getToolsAndWeapons();
                      foreach ($tools as $tool) { 
                ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="toolsthumbnail">
                        <br>
                        
                        <div class="toolsimage">
                            <?php echo "<td width='150'><img src='".$tool['imageLink']."'width='200'height='200'></td>"; ?>
                        </div>
                        
                        <div class="toolsName">
                            <?php echo "<td>".$tool['name']."</td>";?>
                        </div>
                        
                        <div class="toolsDescription">
                            <p><button type="button" class="btn btn-light" data-toggle="modal" data-target="#toolsModal" data-name="<?php echo "".$tool['name']."";?>" data-description="<?php echo "".$tool['description'].""; ?>">Open Description</button></p>
                            
                            <div class="modal fade" id="toolsModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" id="toolsModalHeader">
                                            <h0 class="modal-title">New Message</h0>
                                            
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="modal-description">New Message</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $('#toolsModal').on('show.bs.modal', function (event) {
                                  var button = $(event.relatedTarget) // Button that triggered the modal
                                  var name = button.data('name') 
                                  var description = button.data('description')
                                  var modal = $(this)
                                  modal.find('.modal-title').text(name)
                                  modal.find('.modal-description').text(description)
                                })
                            </script>
                            
                        </div>
                        
                        <div class="toolsPrice">
                            <p><?php echo "Price: ", "<td>".$tool['price']."</td>"; ?></p>
                        </div>
                        
                        <div class="toolsBtn">    
                            <p><?php echo "<button id='AddHero' class='btn btn-danger' type='submit' onclick='ajaxCallItem(".$tool['id'].")'>Add Item to Cart</button>"; ?></p>
                        </div>
                        <br>
                    </div>
                    <br><br>
                </div>
                <?php } ?>
            </div>
            
        </div>
        
        
        <!-- Javascript links-->
       
		 
		
		
    </body>
</html>

